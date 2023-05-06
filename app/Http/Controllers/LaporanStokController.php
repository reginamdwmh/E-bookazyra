<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataAlatModel;
use App\Models\UsersModel;
use Barryvdh\DomPDF\Facade\PDF;

class LaporanStokController extends Controller
{
    public function indexstokalat()
    {
        $users = UsersModel::select('*')
                ->get();
        $stok = MasterDataAlatModel::join('stok_alat','alat.id_alat','=','stok_alat.id_alat')
                ->get(['alat.nama_alat','stok_alat.stok_masuk','stok_alat.stok_keluar']);

        return view('Stok.StokAlat.index',['stok' => $stok,'users' => $users]);
    }

    public function cetaklaporanstok()
    {
        $users = UsersModel::select('*')
                ->get();
        $stok = MasterDataAlatModel::join('stok_alat','alat.id_alat','=','stok_alat.id_alat')
                ->get(['alat.nama_alat','stok_alat.stok_masuk','stok_alat.stok_keluar']);

        $pdf = PDF::loadView('Laporan.LaporanStok.laporan',['stok'=>$stok,'users'=>$users]);
        return $pdf->stream('Laporan-Data-Stok-Alat.pdf');
    }
}
