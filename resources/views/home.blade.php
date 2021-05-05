@extends('layouts.layout')

@section('content')
<div class="container">
    <table align="center" class="table">
        <tr>
            <td>
                <h2>Kas Masuk</h2> <br>
                {{$totalMasuk}}
            </td>
            <td>
                <h2>Kas Keluar</h2> <br>
                {{$totalKeluar}}
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><br></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <h2>Saldo Akhir</h2>
                <br>
                {{$saldo}}
            </td>
        </tr>
    </table>
</div>
@endsection