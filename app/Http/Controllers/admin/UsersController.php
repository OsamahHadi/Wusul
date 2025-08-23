<?php

namespace App\Http\Controllers\admin;

use App\Models\Social;
use App\Models\User;
use App\Helpers\Helper;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\String\s;

class UsersController extends Controller
{
    use Helper;

        public function account(){
            $name=explode(' ',Auth::user()->name,2);
            $profile=Auth::user()->profile;
            return view('account.person',compact('name','profile'));
        }
        // show all users
        public function users()
        {
            // all users
            $users = User::latest()->where('id', '<>', auth()->id())->get();

            // users type
            $types = ['مستخدم', 'مدير', 'صاحب خدمة'];

            return view('admin.users');
        }

        // active user
        public function activation($id)
        {
            try {
                $user = User::findOrFail($id);
                $user->is_active? $user->is_active=0 : $user->is_active= 1;
                $user->save();

                return redirect()->back()->with(['success' => 'تمت العمليه   بنجاح']);

            } catch (\Throwable $th) {
                return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
            }

        }

        public function update(Request $request){
            try {
                $user = User::with('profile','address')->findOrFail(Auth::id());
                $user->update([
                    'name'=> $request->firstName.' '.$request->lastName,
                ]);
                $user->profile()->update([
                    'birthday'=>$request->birth,
                    'phone'=>$request->phone,
                ]);
                $user->address()->update([
                    'state_id'=>$request->state,
                    'city_id'=>$request->city,
                    'description'=>$request->description
                ]);
                return redirect()->back()->with(['success' => 'تمت  العملية بنجاح']);
            } catch (\Throwable $th) {
                return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
                // return $th->getMessage();
                //throw $th;
            }
        }

        public function changePassword(Request $request) {
            if (!(Hash::check($request->current_password, Auth::user()->password))) {

                // The passwords matches
                return redirect()->back()->with(["error"=>" كلمة المرور لا تتطابق مع كلمة المروو الخاصه بك"]);
            }

            // Current password and new password same
            if(strcmp($request->current_password , $request->new_password) == 0){
                return redirect()->back()->with(["error"=>" كلمة المرور الجديده لا يمكن تساوي   كلمة الحاليه"]);
            }

            // Current password and new password same
            if(strcmp($request->new_password , $request->confirmPassword) !== 0){
                return redirect()->back()->with(["error"=>" كلمة المرور غير متطابقة"]);
            }

            //Change Password
            $user = Auth::user();
            $user->password = bcrypt($request->new_password);
            $user->save();

            return redirect()->back()->with(["success"=>" تم تغيير كلمة السر بنجاح"]);
        }

        public function social(){
            $social=Auth::user()->social;
            return view('account.social',compact('social'));
        }

        public function updateSocial(Request $request) {
            //Change Password
            $social = Social::find(Auth::id());
            if ($social)
            {
                $social->facebook = $request->facebook;
                $social->twitter = $request->twitter;
                $social->instagram = $request->instagram;
                $social->linkedin = $request->linkedin;
                $social->save();
            }
            else
            {
                Social::create([
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'instagram' => $request->instagram,
                    'linkedin' => $request->linkedin,
                    'user_id' => Auth::id()
                ]);
            }
            return redirect()->back()->with(["sucess"=>" تم تحديث التواصل"]);
        }


}
