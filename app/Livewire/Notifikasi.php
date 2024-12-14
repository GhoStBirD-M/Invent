<?php

namespace App\Livewire;

use App\Models\Barang;
use Livewire\Component;
use Livewire\Attributes\Computed;

class Notifikasi extends Component
{
    public $barang;

    public function mount()
    {
        $this->barang = Barang::all();
    }

    #[Computed()]
    public function notifikasi()
    {
        return Barang::where('notifikasi', 0)->get();
    }

    public function update()
    {
        Barang::query()->update(['notifikasi' => 1]);
    }

    public function render()
    {
        return view('livewire.notifikasi');
    }
}   
