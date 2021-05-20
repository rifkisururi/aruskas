@extends('layouts.layout')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Kas</h1>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <a href="{{ route('export') }}"> <button class="btn btn-primary">Export Data</button></a>
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>Kode</td>
                    <td>Tanggal</td>
                    <td>Keterangan</td>
                    <td>Masuk</td>
                    <td>Keluar</td>
                    <td>Jenis</td>
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
                        } else {
                            echo 0;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($k->type_kas == 'keluar') {
                            echo $k->jumlah;
                        } else {
                            echo 0;
                        }
                        ?>
                    </td>
                    <td>

                        <?php
                        if ($k->type_kas == 'masuk') {
                            echo "<button class='btn btn-success'>Masuk</button> ";
                        } else {
                            echo "<button class='btn btn-danger'>Keluar</button> ";
                        }
                        ?>
                    </td>
                </tr>

                @endforeach
                <tr>
                    <td colspan="4">Total Kas Masuk</td>
                    <td colspan="3">{{$totalMasuk}}</td>
                </tr>
                <tr>
                    <td colspan="5">Total Kas Keluar</td>
                    <td colspan="2">{{$totalKeluar}}</td>
                </tr>
                <tr>
                    <td colspan="3">Saldo</td>
                    <td colspan="4">{{$saldo}}</td>
                </tr>

            </table>
        </div>
    </div>
</div>

@endsection