@extends('layouts.base-app')

@section('title', 'Update - Kategori')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Kategori</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('invent.kategori.update', $kategori->id) }}" method="POST" class="row">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="basicInput" class="form-label">Nama Kategori</label>
                                <input type="text" name="nama" class="form-control" id="basicInput"
                                    value="{{ $kategori->nama }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="basicInput" class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control" id="basicInput"
                                    value="{{ $kategori->deskripsi }}">
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
