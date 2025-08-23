<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\ServiceCat;
use Livewire\WithPagination;

class OrdersFilter extends Component
{
    use WithPagination;

    public $search;
    public $category;
    public $status;
    public $sortFile;

    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        try {
            $type = [['جديد',' في انتظار الدفع','مكتمل' ,'نم الغاءه','مرفوض','انتظار تأكيد الدفع','انتظار تاكيد الاستلام'],
                    ['primary', 'warning' , 'success'  , 'danger' , 'danger','warning' ,'primary']];
        
            //code...
            $categories=ServiceCat::all();
            
            $orders = Order::with('user','service','address')->CheckOwner()
                ->withFilters(
                $this->search,
                $this->category,
                $this->status,
                )->when($this->sortFile,function($query){
                    $query->orderBy("$this->sortFile");
                })->latest()->paginate(10);
                // dd($orders);
    
            return view('livewire.orders-filter',compact('orders','categories','type'));
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
}
