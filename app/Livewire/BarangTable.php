<?php

namespace App\Livewire;

use App\Models\Barang;
use Livewire\Component;
use Livewire\WithPagination;

class BarangTable extends Component
{
    public $sortColumn = 'nama';
    public $sortDirection = 'asc';
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function updateSearch()
    {
        $this->resetPage(); // Memanggil metode resetPage dengan tanda kurung
    }

    public function render()
    {
        $barangs = Barang::with('kategori') // Eager load the kategori relationship
            ->where('nama', 'like', '%' . $this->search . '%')
            ->orWhereHas('kategori', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%'); // Assuming 'nama' is the column in the kategori table
            })
            ->orWhereHas('pemasok', function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%'); // Assuming 'nama' is the column in the pemasok table
            })
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate(5);

        return view('livewire.barang-table', [
            'barangs' => $barangs,
        ]);
    }

    public function sort($columnName)
    {
        $this->sortColumn = $columnName;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }
}
