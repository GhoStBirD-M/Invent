@extends('layouts.base-app')

@section('title', 'Pemasok')
@section('content')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">View</h4>
        </div>
        <div class="card-body">
            @livewire('pemasok-table')
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Pemasok</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('invent.make') }}" method="POST" class="row">
                    @csrf
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama Pemasok</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="alamat"class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat"
                                    placeholder="Type...">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="telp" class="form-label">No Telp</label>
                                <input type="text" name="telp" class="form-control" id="telp"
                                    placeholder="08XX-XXXX-XXXX">
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
