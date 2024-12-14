<?php

namespace App\Http\Controllers\Barang;

use App\Models\Barang;
use App\Models\Gudang;
use App\Models\Pemasok;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $kategories = Kategori::all();
        $pemasoks = Pemasok::all();
        $gudangs = Gudang::all();
        return view('dashboard.admin-role.barang', compact('kategories', 'pemasoks', 'gudangs'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'unit' => 'required|integer',
            'kategori' => 'required|exists:kategoris,id',
            'gudang' => 'required|exists:gudangs,id',
            'pemasok' => 'required|exists:pemasoks,id',
        ]);

        $file = $request->file('img');
        $customName = time() . '.' . $file->getClientOriginalExtension();
        $imgPath = $file->storeAs('images/barang', $customName, 'public'); // Sesuaikan path


        // Create Barang
        Barang::create([
            'img' => 'images/barang/' . $customName, // Simpan path relatif
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->unit,
            'kategori_id' => $request->kategori,
            'gudang_id' => $request->gudang,
            'pemasok_id' => $request->pemasok,
            'notifikasi' => 0,
        ]);



        return redirect()->route('dashboard');
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'unit' => 'required|integer',
            'kategori' => 'required|exists:kategoris,id',
            'gudang' => 'required|exists:gudangs,id',
            'pemasok' => 'required|exists:pemasoks,id',
        ]);

        $barang = Barang::findOrFail($id);

        // Jika ada file gambar baru yang diunggah
        if ($request->hasFile('img')) {
            // Hapus gambar lama
            if ($barang->img && Storage::disk('public')->exists($barang->img)) {
                Storage::disk('public')->delete($barang->img);
            }

            // Simpan gambar baru
            $file = $request->file('img');
            $customName = time() . '.' . $file->getClientOriginalExtension();
            $imgPath = $file->storeAs('images/barang', $customName, 'public');
            $barang->img = 'images/barang/' . $customName; // Simpan path relatif
        }

        // Update data barang
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->deskripsi = $request->deskripsi;
        $barang->stok = $request->unit;
        $barang->kategori_id = $request->kategori;
        $barang->gudang_id = $request->gudang;
        $barang->pemasok_id = $request->pemasok;
        $barang->save();

        return redirect()->route('dashboard')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        // Hapus gambar terkait, jika ada
        if ($barang->img && Storage::disk('public')->exists($barang->img)) {
            Storage::disk('public')->delete($barang->img);
        }

        // Hapus data barang
        $barang->delete();

        return redirect()->route('dashboard')->with('success', 'Barang berhasil dihapus.');
    }

    public function edit($id)
    {
        // Ambil data barang berdasarkan ID
        $barang = Barang::findOrFail($id);

        // Ambil data tambahan untuk dropdown
        $kategories = Kategori::all();
        $gudangs = Gudang::all();
        $pemasoks = Pemasok::all();

        // Kirim data ke view
        return view('dashboard.admin-role.barang-update', compact('barang', 'kategories', 'gudangs', 'pemasoks'));
    }
}
