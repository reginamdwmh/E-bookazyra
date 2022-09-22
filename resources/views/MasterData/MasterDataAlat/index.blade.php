@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Alat
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="{{route('tambahalat')}}" class="btn-btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                         @foreach($alat as $a) 
                         <tr>
                             <td>{{ $no++}}</td>
                             <td>{{$a->nama_alat}}</td>
                             <td>@currency($a->harga) </td>
                             <td>
                             {{-- <a href="/master-data/data-alat/lihat/{{$a->id_alat}}" title="Lihat" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> --}}
                             <a href="/master-data/data-alat/ubah/{{$a->id_alat}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                             <a href="/master-data/data-alat/hapus/{{$a->id_alat}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                             </td>
                         </tr>
             
                         @endforeach
                    </tbody>
                    </tfoot>
                </table>
            </div>
        </div>        
</section>
@endsection
