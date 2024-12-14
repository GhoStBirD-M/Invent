@extends('layouts.base-app')

@section('title', 'Update - Gudang')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Gudang</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('invent.gudang.update', $gudang->id) }}" method="POST" class="row">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama Gudang</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    value="{{ $gudang->nama }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat"
                                    value="{{ $gudang->alamat }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="kapasitas" class="form-label">Space</label>
                                <input type="text" name="kapasitas" class="form-control" id="kapasitas"
                                    value="{{ $gudang->kapasitas }}">
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
