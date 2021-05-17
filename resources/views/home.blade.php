@extends('layouts.layout')

@section('content')
<div class="container">
    <table align="center" class="table">
        <tr>
            <td>
                <h2><i class="fa fa-arrow-up" aria-hidden="true"></i> Kas Masuk</h2> <br>
                {{$totalMasuk}}
            </td>
            <td>
                <h2> <i class="fa fa-arrow-down" aria-hidden="true"></i> Kas Keluar</h2> <br>
                {{$totalKeluar}}
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><br></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <h2> <i class="fas fa-dollar-sign"></i> Saldo Akhir</h2>
                <br>
                {{$saldo}}
            </td>
        </tr>
    </table>
</div>
@endsection