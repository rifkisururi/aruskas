@extends('layouts.layout')
@section('content')

Tahun
<select class="form-control" id="year" onchange="pindahTahun()">
    <option value="0">Pilih Tahun</option>
    <option value="<?php echo date("Y") ?>"><?php echo date("Y") ?></option>
    <option value="<?php echo date("Y") - 1 ?>"><?php echo date("Y") - 1 ?></option>
</select>

<script>
    function pindahTahun() {
        var year = document.getElementById('year').value;
        var url = window.location.origin + "/grafik/" + year;
        window.location.replace(url);
    }
</script>

<div>
    <canvas id="myChart"></canvas>
</div>


<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nov", "Desember"],
            datasets: [{
                    label: 'Pengeluaran',
                    data: [<?php echo $k1 . "," . $k2 . "," . $k3 . "," . $k4 . "," . $k5 . "," . $k6 . "," . $k7 . "," . $k8 . "," . $k9 . "," . $k10 . "," . $k11 . "," . $k12 ?>],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Pemasukan',
                    data: [<?php echo $m1 . "," . $m2 . "," . $m3 . "," . $m4 . "," . $m5 . "," . $m6 . "," . $m7 . "," . $m8 . "," . $m9 . "," . $m10 . "," . $m11 . "," . $m12 ?>],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

@endsection