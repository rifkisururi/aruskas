@extends('layouts.layout')
@section('content')
<form action="" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset>
        <legend>Ubah Data</legend>
        <div class="form-group row">

            <div class="col-md-2">
                <label for="kode">Kode</label>
                <input class="form-control" type="text" name="kode" value="{{$kas->kode}}" readonly>
            </div>


            <div class="col-md-2">
                <label for="tanggal">Tanggal</label>
                <input class="form-control" type="date" name="tanggal" value="{{$kas->tanggal}}">
            </div>


            <div class="col-md-2">
                <label for="keterangan">Keterangan</label>
                <input class="form-control" type="text" name="keterangan" value="{{$kas->keterangan}}">
            </div>


            <div class="col-md-2">
                <label for="jumlah">Jumlah</label>
                <input class="form-control" type="number" name="jumlah" value="{{$kas->jumlah}}">
            </div>

        </div>
    </fieldset>
    <div class="col-md-10">
        <input type="submit" class="btn btn-success btn-send" value="Ubah">
        <button type="button" onclick="history.back();" class="btn btn-primary">Kembali</button>
    </div>
    <hr>
</form>
@endsection