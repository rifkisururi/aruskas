@extends('layouts.layout')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Kas</h1>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>Kode</td>
                    <td>Tanggal</td>
                    <td>Keterangan</td>
                    <td>Masuk</td>
                    <td>Keluar</td>
                    <td>Aksi</td>
                </tr>
                <?php $no = 1; ?>
                @foreach($kas as $k)
                <tr>
                    <td><?php
                        echo $no;
                        $no++
                        ?>
                    </td>
                    <td>{{$k->kode}}</td>
                    <td>{{$k->tanggal}}</td>
                    <td>{{$k->keterangan}}</td>
                    <td>
                        <?php
                        if ($k->type_kas == 'masuk') {
                            echo $k->jumlah;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($k->type_kas == 'keluar') {
                            echo $k->jumlah;
                        }
                        ?>
                    </td>
                    <td>
                        <a href="{{ route('kas-edit', ['id' => $k->id ] ) }}"> <button class="btn btn-warning">Edit</button></a>
                        <a href="{{ route('kas-hapus', ['id' => $k->id ] ) }}"> <button class="btn btn-danger">Hapus</button></a>

                    </td>
                </tr>

                @endforeach
                <tr>
                    <td colspan="2">Total Kas Masuk</td>
                    <td colspan="4">{{$totalMasuk}}</td>
                </tr>
                <tr>
                    <td colspan="2">Total Kas Keluar</td>
                    <td colspan="4">{{$totalKeluar}}</td>
                </tr>
                <tr>
                    <td colspan="2">Saldo</td>
                    <td colspan="4">{{$saldo}}</td>
                </tr>

            </table>
        </div>
    </div>
</div>

@endsection