<?php

namespace App\Http\Controllers\Pdf;

use App\Models\Barang;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Http\Controllers\Controller;

class MakePdfController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('pdf.pdf-view', compact('barangs'));
    }

    function view_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $barangs = Barang::all();
        $mpdf->WriteHTML(view('pdf.pdf-view', compact('barangs')));
        $mpdf->Output();
    }

    function download_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $barangs = Barang::all();
        $mpdf->WriteHTML(view('pdf.pdf-view', compact('barangs')));
        $mpdf->Output('Laporan Barang', 'D');
    }
}
