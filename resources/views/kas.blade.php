@extends('layouts.layout')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Kas {{$type}}</h1>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                + Tambah
            </button>
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <td>No</td>
                    <td>Kode</td>
                    <td>Tanggal</td>
                    <td>Keterangan</td>
                    <td>Jumlah</td>
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
                    <td>{{$k->jumlah}}</td>
                    <td>
                        <a href="{{ route('kas-edit', ['id' => $k->id ] ) }}"> <button class="btn btn-warning">Edit</button></a>
                        <a href="{{ route('kas-hapus', ['id' => $k->id ] ) }}"> <button class="btn btn-danger">Hapus</button></a>

                    </td>
                </tr>

                @endforeach
                <tr>
                    <td colspan="2">Total Kas {{$type}}</td>
                    <td colspan="4">{{$total}}</td>
                </tr>

            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    <div class="form-group" hidden>
                        <input type="text" class="form-control" name="type_kas" value="{{$type}}">
                    </div>

                    <div class="form-group">
                        <label for="">Kode</label>
                        <input type="text" class="form-control" name="kode">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                    </div>

                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan">
                    </div>

                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection