<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Models\ServiceCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class ServiceCategory extends Controller
{
    use Helper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=ServiceCat::all();
        return view('admin.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        try {


            // create Service category
            $category = ServiceCat::create([
                'name' => $request['name'],
                'description' => $request['description'],
            ]);




            return redirect()->back()->with(['error' => 'تمت الاضافة بنجاح']);
            // return $category;
        } catch (\Exception $ex) {
            // return $ex->getMessage();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     try {
    //         $category = ServiceCat::findOrFail($id);
    //         return $category;
    //     } catch (\Throwable $th) {
    //         return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

    //     }

    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $category = ServiceCat::findOrFail($request->id);
            // update Service category
            $category->update([
                'name' => $request['name'],
                'description' => $request['description'],
            ]);   
            return redirect()->back()->with(['error' => 'تمت التعديل بنجاح']);
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
            $category = ServiceCat::with('services')->findOrFail($id);

            // check if this category has service
            if($category->services)
            foreach ($category->services as $service) {
                if ($service->image != '') { // check if  has image

                    // remove image
                    Storage::disk('services')->delete($service->image);
                }
                $service->delete();
            }

            $category->delete();

            return redirect()->back()->with(['error' => 'تمت الحذف بنجاح']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
            //throw $th;
        }
    }
}
