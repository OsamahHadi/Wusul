<?php

namespace App\Http\Controllers\userServiceProvider;

use App\Helpers\Helper;
use App\Models\Service;
use App\Models\ServersCat;
use App\Models\ServiceCat;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ServerProviderRequest;

class ServicesController extends Controller
{
    use Helper, WithFileUploads;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('service_provider.services');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ServiceCat::all();
        return view('service.service_create',compact('categories'));
        // return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // ServerProviderRequest $request
    public function store(Request $request)
    {

        try {


            // $request->validate([
            //     'name' => 'required|string',
            //     'description'=>'string|required',
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            //     'service_cat_id'=>'required|numeric',
            //     'price'=>'numeric',
            //     'type'=>'numeric'
            // ],
            // [
            //     'name.required'=>'هذا الحقل مطلوب',
            //     'description.required'=>'هذا الحقل مطلوب',
            //     'service_cat_id.required'=>'هذا الحقل مطلوب',
            //     'image.required'=>'هذا الحقل مطلوب',
            //     'price.numeric'=>'يجب ملئ الحقل بأرقام فقط',
            //     'type.numeric'=>'يجب ملئ الحقل بأرقام فقط',
            //     'image.image'=>' يجب ان يكون صوره',
            //     'accept.required' => 'يجب ان توافق على الشروط ',
            //     'name.string'=>'هذا الحقل يجب ان يكون نص',
            //     'description.string'=>'هذا الحقل يجب ان يكون نص'
            // ]);

                $photo = "";


            if ($request->hasFile('image')) {


                $photo = $this->uploadImage('services', $request->image);

            }

            // create Service
            $service = Service::create([
                'name' => $request['name'],
                'user_id' => Auth::id(),
                'description' => $request['description'],
                'type' => $request['type']?? 0,
                'image' => $photo,
                'price' => $request['price']??'0',
                'service_cat_id' => $request['category'],
                'stars' => 0,
                'interval'=>$request->interval
            ]);




            return redirect()->route('service')->with(['success' => 'تمت الاضافة   بنجاح']);
        } catch (\Exception $ex) {
            // return $ex->getMessage();

            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
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
            $service = Service::where('user_id', Auth::id())->findOrFail($id);
            $categories = ServiceCat::all();

                if(!$service){
                    return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
                }
            return view('service.service_edit',compact('service','categories'));
        } catch (\Throwable $th) {
            // return $th->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

            // throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ServerProviderRequest
    public function update(Request $request, $id)
    {
        // return $request;
        try {
            $service = Service::where('user_id', Auth::id())->findOrFail($id);
            $photo;
            if ($request->hasFile('image')) {


                if($service->image){
                    Storage::disk('services')->delete($service->image);
                }
                $photo = $this->uploadImage('services',$request->file('image'));

            }else{
                $photo =$service->image;
            }

            // create Service
            $service->update([
                'name' => $request['name'],
                'description' => $request['description'],
                'type' => $request['type']?? 0,
                'image' => $photo,
                'price' => $request['price']??'1',
                'service_cat_id' => $request['category'],

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
            $service = Service::with('works')->findOrFail($id);

            //check if has works
            if(count($service->works))
            foreach ($service->works as $work) {
                if ($work->image != '') { // check if  has image

                    // remove image
                    Storage::disk('works')->delete($work->image);
                }
                $work->delete(); // delete all works od this service
            }

            if ($service->image != '') { // check if  has image

                // remove image
                Storage::disk('services')->delete($service->image);
            }
            $service->delete();

            return redirect()->back()->with(['success' => 'تم الحذف   بنجاح']);

        } catch (Throwable $e) {
            return $th->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function services(){

        return view('admin.services');
    }
}
