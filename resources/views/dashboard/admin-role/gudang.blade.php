@extends('layouts.base-app')

@section('title', 'Gudang')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">View</h4>
        </div>
        <div class="card-body">
            @livewire('gudang-table')
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Gudang</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('invent.craft') }}" method="POST" class="row">
                    @csrf
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama Gudang</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat"
                                    placeholder="Type...">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="kapasitas" class="form-label">Space</label>
                                <input type="text" name="kapasitas" class="form-control" id="kapasitas" placeholder="12">
                            </div>
                        </div>
                    </div>
                    <div class="button">
                        <button class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
