<?php

namespace App\Http\Livewire;

use App\Helpers\Helper;
use Livewire\Component;
use App\Models\UserProfile;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploudImage extends Component
{
    use WithFileUploads , Helper    ;

    public $photo;
    public $path;
    public function render()
    {
        if($this->photo){
            $this->save();
        }
        return view('livewire.uploud-image');
    }
    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
        $user = UserProfile::where('user_id',Auth::id())->first();
        if($user->image != ''){
            Storage::disk('users')->delete($user->image);

        }
        $this->path = $this->uploadImage('users',$this->photo);
        $user->update([
            'image'=>$this->path,
        ]);
    }

}
