<?php

namespace App\Http\Livewire;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;

class ReportSearch extends Component
{      
    use WithPagination;

    public $search;
    public $status;
    public $sortFile;
    public function render()
    {
        $reports=Report::with('user')->withFilters(
            $this->search,
            $this->status
            )->when($this->sortFile,function($query){
                $query->orderBy("$this->sortFile");
            })->latest()
            ->paginate(10);
        return view('livewire.report-search',compact('reports'));
    }
}
