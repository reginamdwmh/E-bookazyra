<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterDataBahanModel;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UsersModel;

class MasterDataBahanController extends Controller
{
    public function indexbahan()
    {
        $users = UsersModel::select('*')
                ->get();       
        $bahan = MasterDataBahanModel::select('*')
                 ->get();

        return view ('MasterData.MasterDataBahan.index',['bahan' => $bahan,'users' => $users]);
    }

    public function tambahbahan()
    {
        $users = UsersModel::select('*')
                ->get();
        return view('MasterData.MasterDataBahan.tambahdata',['users' => $users]);
    }

    public function simpanbahan(Request $request)
    {
        $users = UsersModel::select('*')
                ->get();
        $bahan = MasterDataBahanModel::create([
            'nama_bahan' => $request->nama_bahan,
            'harga' => $request->harga,
            
        ]);
        Alert::success('Success', 'Data Berhasil Disimpan',['users' => $users]);
        return redirect()->route('indexbahan');
    }

    public function hapusbahan($id_bahan)
    {
        $bahan = MasterDataBahanModel::where('id_bahan',$id_bahan)
                ->delete();
        Alert::success('Success', 'Data Berhasil Dihapus');       
        return redirect()->route('indexbahan');
    }

    public function ubahbahan($id_bahan)
    {
        $users = UsersModel::select('*')
                ->get();
        $bahan =MasterDataBahanModel::select('*')
                ->where('id_bahan',$id_bahan)
                ->get();

        return view ('MasterData.MasterDataBahan.ubahdata', ['bahan' =>$bahan,'users' => $users]);
    }

    public function updatebahan(Request $request)
    {
        $users = UsersModel::select('*')
                ->get();
       $bahan = MasterDataBahanModel::where('id_bahan', $request->id_bahan)
                 ->update([
                    'nama_bahan' => $request->nama_bahan,
                    'harga' => $request->harga,
                 ]);
        Alert::success('Success', 'Data Berhasil Diubah',['users' => $users]);    
       return redirect()->route('indexbahan');
    }

    // public function lihatbahan($id_bahan)
    // {
    //     $bahan = MasterDataBahanModel::select('*')
    //                              ->where('id_bahan',$id_bahan)
    //                              ->get();


    //     return view ('MasterData.MasterDataBahan.lihatdata', ['bahan' => $bahan],compact('bahan'));
    // }
}
