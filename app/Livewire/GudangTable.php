<?php

namespace App\Livewire;

use App\Models\Gudang;
use Livewire\Component;
use Livewire\WithPagination;

class GudangTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $gudangs = Gudang::orderBy('id', 'asc')->paginate(3);
        return view('livewire.gudang-table',[
            'gudangs' => $gudangs
        ]);
    }
}
