@extends('layouts.base-app')

@section('title', 'Dashboard')

@push('style')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('content')
    <div class="card ">
        <div class="card-header">
            <h4>persentase</h4>
        </div>
        <div class="card-body">
            <div id="chart-visit"></div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <section class="section">
                    <div class="row" id="table-bordered">
                        <div class="col-12">
                            @livewire('barang-table')
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // Pastikan variabel kategori, gudang, dan pemasok sudah terdefinisi
        var kategori = {{ $kategori }} || 0; // Ganti dengan nilai default jika tidak ada
        var gudang = {{ $gudang }} || 0; // Ganti dengan nilai default jika tidak ada
        var pemasok = {{ $pemasok }} || 0; // Ganti dengan nilai default jika tidak ada

        var options = {
            series: [kategori, gudang, pemasok],
            chart: {
                type: 'pie',
                height: 350,
                toolbar: {
                    show: false // Menyembunyikan toolbar jika tidak diperlukan
                }
            },
            labels: ['Kategori', 'Gudang', 'Pemasok'], // Label yang lebih deskriptif
            colors: ['#ff7976', '#57caeb', '#5ddab4'],
            legend: {
                position: 'bottom',
                horizontalAlign: 'center'
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        height: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#chart-visit"), options);
        chart.render();
    </script>
@endsection
