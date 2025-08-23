<?php

namespace App\Http\Controllers\admin;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        $states = State::all();

        return view('admin.cities',compact('cities','states'));
    }

    public function store(Request $request)
    {
        try {
            $city = City::create([
                'name'=> $request->name,
                'state_id'=>$request->state,
                'is_active'=>0
            ]);
            return redirect()->back()->with(['success' => 'تم  الاضافه بنجاح']);
        } catch (\Throwable $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

            // return $ex->getMessage();
        }
    }

    public function update(Request $request)
    {
        try {
            $city = City::findOrFail($request->id);

            $city->update([
                'name'=> $request->name,
                'state_id'=>$request->state,
            ]);
            return redirect()->back()->with(['success' => 'تم  التعديل بنجاح']);
        } catch (\Throwable $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

            // return $ex->getMessage();
        }
    }
    
    public function destroy($id){
        try {
            $city = City::findOrFail($id);
            $city->delete();

            return redirect()->back()->with(['error' => '  تم الحذف بنجاح']);

            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

            // return $th->getMessage();
            //throw $th;
        }
    }
            
    public function activation($id)
    {
        try {
            $city = City::with('state')->findOrFail($id);
            $city->is_active? $city->is_active=0 :($city->state->is_active? $city->is_active= 1:$city->is_active=0);
            $city->save();

            return redirect()->back()->with(['error' => 'تمت العملية بنجاح']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
        
    }


}
