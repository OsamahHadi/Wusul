<?php

namespace App\Http\Controllers\admin;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class stateController extends Controller
{
    public function index()
    {
        $states = State::all();

        return view('admin.states',compact('states'));
    }

    public function store(Request $request)
    {
        try {
            $state = State::create([
                'name'=> $request->name,
                'is_active'=>0
            ]);
            return redirect()->back()->with(['success' => 'تم  الاضافه بنجاح']);
        } catch (\Throwable $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function update(Request $request)
    {
        try {
            $state = State::findOrFail($request->id);

            $state->update([
                'name'=> $request->name,
            ]);
            return redirect()->back()->with(['success' => 'تم  التعديل بنجاح']);
        } catch (\Throwable $ex) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

            // return $ex->getMessage();
        }
    }

    public function destroy($id){
        try {
            $state=State::with('cities')->findOrFail($id);
            if($state->cities)
            foreach ( $state->cities as $city) {
                $city->delete();
            }

            $state->delete();
            return redirect()->back()->with(['success' => 'تم  الحذف بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

            // return $th->getMessage();
            //throw $th;
        }
    }
            
    public function activation($id)
    {
        try {

            $state = State::with('cities')->findOrFail($id);
            // check if active
            if($state->is_active != 1){
                $state->is_active=1;
            }else{
                if($state->cities)
                foreach ( $state->cities as $city) {
                    $city->is_active=0; // dis active all city of this state
                    $city->save();
                }

                $state->is_active=0 ;
            }
            
            $state->save();

            return redirect()->back()->with(['success' => 'تمت العمليه   بنجاح']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
        
    }
}
