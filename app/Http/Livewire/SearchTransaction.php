<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchTransaction extends Component
{
    public $wallet;
    public $search;

    public function mount($wallet)
    {
        $this->$wallet = $wallet->$wallet;
    }
    public function render()
    {
        return view('livewire.search-transaction');
    }
}
