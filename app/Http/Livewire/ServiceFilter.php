<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use App\Models\ServiceCat;
use Livewire\WithPagination;

class ServiceFilter extends Component
{
    use WithPagination;
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public $search;
    public $category;
    public $active;
    public $stars;
    public $sortFile;
    public $state;
    public $city;


    protected $listeners = [
        'changeCity'     =>'cityChange',
        'changeState'     => 'stateChange',
    ];
    public function render()
    {
        $categories=ServiceCat::all();
        $services=Service::with('user','orders','rating','category','address') 
        ->whereHas('address', function($query){
            $query->withFilters(
                $this->state,
                $this->city,
            );
        })
        ->withFilters(
            $this->search,
            $this->category,
            $this->active,
            $this->stars
            )->when($this->sortFile,function($query){
                $query->orderBy("$this->sortFile");
            })->latest()
        ->paginate(10);
        return view('livewire.service-filter',compact('services','categories'));
    }
    public function stateChange($state){
        $this->state=$state;
        
    }
    public function cityChange($city){
        $this->city=$city;
    }
}
