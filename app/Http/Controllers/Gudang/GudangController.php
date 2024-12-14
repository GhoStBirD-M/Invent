<?php

namespace App\Http\Controllers\Gudang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gudang;
use Illuminate\Support\Facades\Validator;

class GudangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $gudangs = Gudang::all();
        return view('dashboard.admin-role.gudang', compact('gudangs'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'alamat'=> 'nullable|string',
            'kapasitas' => 'nullable|string',
        ]);

        Gudang::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kapasitas' => $request->kapasitas,
        ]);
        return redirect()->route('invent.gudang');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'kapasitas' => 'nullable|string',
        ]);

        $gudang = Gudang::findOrFail($id);


        $gudang->nama = $request->nama;
        $gudang->alamat = $request->alamat;
        $gudang->kapasitas = $request->kapasitas;
        $gudang->save();

        return redirect()->route('invent.gudang')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $gudang = Gudang::findOrFail($id);

        $gudang->delete();

        return redirect()->route('invent.gudang')->with('success', 'Kategori berhasil dihapus.');
    }

    public function edit($id)
    {
        $gudang = Gudang::findOrFail($id);

        $gudangs = Gudang::all();

        // Kirim data ke view
        return view('dashboard.admin-role.gudang-update', compact('gudangs', 'gudang'));
    }
}
