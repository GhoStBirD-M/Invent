@extends('layouts.base-app')

@section('title', 'Update')

@section('content')
<div class="container">
    <h1>Edit Barang</h1>
    <form action="{{ route('invent.barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Barang</label>
            <input type="text" name="nama" id="nama" value="{{ $barang->nama }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" value="{{ $barang->harga }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="unit">Stok</label>
            <input type="number" name="unit" id="unit" value="{{ $barang->stok }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="form-control" required>
                @foreach($kategories as $kategori)
                <option value="{{ $kategori->id }}" {{ $kategori->id == $barang->kategori_id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="gudang">Gudang</label>
            <select name="gudang" id="gudang" class="form-control" required>
                @foreach($gudangs as $gudang)
                <option value="{{ $gudang->id }}" {{ $gudang->id == $barang->gudang_id ? 'selected' : '' }}>{{ $gudang->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="pemasok">Pemasok</label>
            <select name="pemasok" id="pemasok" class="form-control" required>
                @foreach($pemasoks as $pemasok)
                <option value="{{ $pemasok->id }}" {{ $pemasok->id == $barang->pemasok_id ? 'selected' : '' }}>{{ $pemasok->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="img">Gambar</label>
            <input type="file" name="img" id="img" class="form-control">
            @if($barang->img)
            <img src="{{ asset('storage/' . $barang->img) }}" alt="Gambar Barang" width="100">
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
@endsection
