@extends('layouts.base-app')
@section('title', 'Update - Barang')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Barang</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <form action="{{ route('invent.barang.update', $barang->id) }}" method="POST" class="row" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="img">Gambar</label>
                            <input type="file" name="img" id="img" class="form-control">
                            @if($barang->img)
                            <img src="{{ asset('storage/' . $barang->img) }}" alt="Gambar Barang" width="100">
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="basicInput" class="form-label">Nama Barang</label>
                            <input type="text" name="nama" class="form-control" id="basicInput"
                                placeholder="{{$barang->nama}}" value="{{$barang->nama}}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="basicInput" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="basicInput"
                                placeholder="{{$barang->deskripsi}}" value="{{$barang->deskripsi}}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="Rupiah" class="form-label">Harga</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" name="harga" class="form-control" id="Rupiah" value="{{$barang->harga}}" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">,00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="select" class="form-label">Kategori</label>
                            <fieldset class="form-group" name="kategori">
                                <select class="form-select" name="kategori" id="select" required>
                                    @foreach ($kategories as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="select" class="form-label">Penyimpanan</label>
                            <fieldset class="form-group" name="gudang">
                                <select class="form-select" name="gudang" id="select" required>
                                    @foreach ($gudangs as $gudang)
                                        <option value="{{ $gudang->id }}">{{ $gudang->nama }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="select" class="form-label">Pemasok</label>
                            <fieldset class="form-group" name="pemasok">
                                <select class="form-select" name="pemasok" id="select" required>
                                    @foreach ($pemasoks as $pemasok)
                                        <option value="{{ $pemasok->id }}">{{ $pemasok->nama }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" name="unit" class="form-control" id="unit" placeholder="{{$barang->stok}}" value="{{$barang->stok}}">
                        </div>
                    </div>
                </div>
                <div class="button">
                    <button class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
