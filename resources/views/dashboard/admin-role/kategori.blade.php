@extends('layouts.base-app')

@section('title', 'Kategori')

@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">View</h4>
        </div>
        <div class="card-body">
            @livewire('kategori-table')
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Kategori</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('invent.store') }}" method="POST" class="row">
                    @csrf
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="basicInput" class="form-label">Nama Kategori</label>
                                <input type="text" name="nama" class="form-control" id="basicInput"
                                    placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="basicInput" class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control" id="basicInput"
                                    placeholder="Type...">
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
