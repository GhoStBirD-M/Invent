<?php

namespace App\Livewire;

use App\Models\Pemasok;
use Livewire\Component;
use Livewire\WithPagination;

class PemasokTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $pemasoks = Pemasok::orderBy('id','asc')->paginate(3);
        return view('livewire.pemasok-table',[
            'pemasoks' => $pemasoks
        ]);
    }
}
