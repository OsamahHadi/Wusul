<?php

namespace App\Http\Controllers\userServiceProvider;

use App\Models\Work;
use App\Helpers\Helper;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class WorkController extends Controller
{
    use Helper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        try {
             $request->validate([
                'title' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'service_id'=>'required|numeric',
                'url'=>'url',
            ]);
            
            $service=Service::where('user_id', Auth::id())->findOrFail($request->service_id);
            
            if(!$service) return throw new Exception("ليس لديك صلاحيه", 1);
            

            $photo = "";


            if ($request->has('image')) {

                $photo = $this->uploadImage("works", $request->image);

            }

            // create Service
            $work =$service->works()->create([
                'title' => $request['title'],
                'url' => $request['url']??'',
                'image' => $photo,
            ]);



            // event(new notfiy($pharmacy));

            return redirect()->back()->with(['success' => 'تمت الاضافة   بنجاح']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

            // return $th->getMessage();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $services=Service::where('user_id',Auth::id())->get();
            
            $work = Work::CheckOwner()->findOrFail($id);
            return $work;

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'title' => 'required|string',
                'description'=>'string|required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
                'service_id'=>'required|numeric',
                'url'=>'url',
            ]);

            $photo = "";


            $work= Work::CheckOwner()->findOrFail($id);

            if ($request->image) {
    
    
                if($work->image){
                    Storage::disk('works')->delete($work->image);
                }
                $photo = $this->uploadImage('works',$request->image);
    
            }
            $work->update([
                'title' => $request['title'],
                'url' => $request['url']??'',
                'image' => $photo,
            ]);

            return redirect()->back()->with(['success' => 'تم التعديل   بنجاح']);

        } catch (\Throwable $th) {
            // return $th->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //code...
            $work= Work::with('service')->CheckOwner()->findOrFail($id);
    
                if($work->image){
                    Storage::disk('works')->delete($work->image);
                }
    
            $work->delete();
            return redirect()->back()->with(['success' => 'تم الحذف   بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
        
    }
}
