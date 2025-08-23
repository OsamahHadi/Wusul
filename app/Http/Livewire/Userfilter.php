<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Userfilter extends Component
{
    use WithPagination;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $search;
    public $type;
    public $active;
    public $stars;
    public $sortFile;
    public function render()
    {

              // all users
            $users = User::latest()->where('id', '<>', auth()->id()) ->withFilters(
                $this->search,
                $this->type,
                $this->active,
                $this->stars
                )->when($this->sortFile,function($query){
                    $query->orderBy("$this->sortFile");
                })->latest()
                ->paginate(10);

              // users type
              $types = ['مستخدم', 'مدير', 'موفر خدمة'];

        return view('livewire.userfilter',compact('users', 'types'));
    }
}
