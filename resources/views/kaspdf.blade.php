<img src="logo/kop.png" width="100%"><br>
<center>
    <h2>
        DATA REKAPITULASI KAS<BR>
        CV. KARUNIA METAL SEJAHTERA<br>
        TAHUN 2021
    </h2>
</center>
<BR>
<BR>

<table border="1" width="100%">
    <tr>
        <td>No</td>
        <td>Kode Transaksi</td>
        <td>Tanggal</td>
        <td>Keterangan</td>
        <td>Masuk</td>
        <td>Keluar</td>
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
    </tr>
    @endforeach
    <tr>
        <td colspan="4">Total Kas Masuk</td>
        <td colspan="2">{{$totalMasuk}}</td>
    </tr>
    <tr>
        <td colspan="5">Total Kas Keluar</td>
        <td colspan="1">{{$totalKeluar}}</td>
    </tr>
    <tr>
        <td colspan="2">Saldo</td>
        <td colspan="4">{{$saldo}}</td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td width="30%"></td>
        <td width="30%"></td>
        <td width="30%">
            <center>
                Karawang, <?php echo date("d M Y"); ?>
                <br>Pemimpin
                <br>CV. KARUNIA METAL SEJAHTERA
                <br>
                <br>
                <br>
                Hari Suryanto<br>
                Owner
            </center>

        </td>
    </tr>
</table>