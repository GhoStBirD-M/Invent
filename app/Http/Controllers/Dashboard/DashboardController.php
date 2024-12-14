<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gudang;
use App\Models\Kategori;
use App\Models\Pemasok;

class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function __invoke(Request $request)
  {
    $barangs = Barang::all();
    $kategori = Kategori::count();
    $gudang = Gudang::count();
    $pemasok = Pemasok::count();
    return view('dashboard.admin-role.index', compact('barangs','kategori', 'gudang', 'pemasok'));
  }

  public function index(Request $request)
  {
    $query = Barang::query();

    // Pencarian berdasarkan nama barang
    if ($request->has('search') && $request->search != '') {
      $query->where('nama', 'like', '%' . $request->search . '%');
    }

    $barangs = $query->with(['kategori', 'pemasok', 'gudang'])->paginate(10);

    return view('invent.barang.index', compact('barangs'));
  }

  public function statistikinvent()
  {
    $kategori = Kategori::count();
    $gudang = Gudang::count();
    $pemasok = Pemasok::count();
    return view('dashboard.admin-role.index', compact('kategori', 'gudang', 'pemasok'));
  }
}
