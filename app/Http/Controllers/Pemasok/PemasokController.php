<?php

namespace App\Http\Controllers\Pemasok;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pemasok;
use Illuminate\Support\Facades\Validator;

class PemasokController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $pemasoks = Pemasok::all();
        return view('dashboard.admin-role.pemasok', compact('pemasoks'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telp' => 'nullable|string',
        ]);

        Pemasok::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
        ]);
        return redirect()->route('invent.pemasok');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telp' => 'nullable|string',
        ]);

        $pemasok = Pemasok::findOrFail($id);


        $pemasok->nama = $request->nama;
        $pemasok->alamat = $request->alamat;
        $pemasok->telp = $request->telp;
        $pemasok->save();

        return redirect()->route('invent.pemasok')->with('success', 'Pemasok berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pemasok = Pemasok::findOrFail($id);

        $pemasok->delete();

        return redirect()->route('invent.pemasok')->with('success', 'Pemasok berhasil dihapus.');
    }

    public function edit($id)
    {
        $pemasok = Pemasok::findOrFail($id);

        $pemasoks = Pemasok::all();

        // Kirim data ke view
        return view('dashboard.admin-role.pemasok-update', compact('pemasoks', 'pemasok'));
    }
}
