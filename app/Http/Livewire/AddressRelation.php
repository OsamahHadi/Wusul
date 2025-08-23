<?php

namespace App\Http\Livewire;

use App\Models\State;
use Livewire\Component;

class AddressRelation extends Component
{
    public $state;
    public $city;
    public function mount($state_id,$city_id){
        $this->state=$state_id;
        $this->city=$city_id;
    }
    public function updatingState(){
        
    }

    public function render()
    {
        $states=State::with(['cities'=>function($q){
            if($this->state !=''){
                $q->where('state_id',$this->state);
            }
            $this->emit('changeState',$this->state);
            $this->emit('changeCity',$this->city);

        }])->get();
        // dd($states);
        return view('livewire.address-relation',compact('states'));
    }
}
