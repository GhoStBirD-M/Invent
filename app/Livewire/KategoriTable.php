<?php

namespace App\Livewire;

use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithPagination;

class KategoriTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $kategoris = Kategori::orderBy('id','asc')->paginate(3);
        
        return view('livewire.kategori-table', [
            'kategoris' => $kategoris,
        ]);
    }
}
