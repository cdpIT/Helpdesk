<?php

namespace App\Http\Controllers\Pimpinan;

use App\Models\Tiket;
use App\Models\DetailTiket;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index() {
            
        return view('pimpinan.laporan.index', [
            'tikets'    => Tiket::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function all() {
        $data = [
            'tikets' => Tiket::orderBy('created_at', 'desc')->get()
        ];

        $pdf = Pdf::loadView('pimpinan.laporan.all', $data);
        return $pdf->stream('Laporan.pdf');
    }

    public function target(Request $request) {
        $data = [
            'tikets' => Tiket::whereDate('created_at', '>=', $request->dariTanggal)->whereDate('created_at', '<=', $request->sampaiTanggal)->orderBy('created_at', 'desc')->get(),
            'dariTanggal' => $request->dariTanggal,
            'sampaiTanggal' => $request->sampaiTanggal,
        ];

        $pdf = Pdf::loadView('pimpinan.laporan.target', $data);
        return $pdf->stream('Laporan.pdf');
    }

    public function one(Tiket $tiket) {
        $data = [
            'tiket'             => $tiket,
            'detailTikets'      => DetailTiket::where('tiket', $tiket->idTiket)->orderBy('created_at', 'desc')->get()
        ];

        $pdf = Pdf::loadView('pimpinan.laporan.one', $data);
        return $pdf->stream('Laporan.pdf');
    }
}
