<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kas_model;
use PDF;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalMasuk = DB::table("kas")->where('type_kas', '=', 'masuk')->get()->sum("jumlah");
        $totalKeluar = DB::table("kas")->where('type_kas', '=', 'keluar')->get()->sum("jumlah");
        $saldo = $totalMasuk - $totalKeluar;

        return view('home', [
            'totalMasuk' => $totalMasuk,
            'totalKeluar' => $totalKeluar,
            'saldo' => $saldo
        ]);
    }

    public function kas($type)
    {
        $kas = DB::table('kas')
            ->select('id', 'kode', 'tanggal', 'keterangan', 'jumlah')
            ->where('type_kas', '=', $type)
            ->get();

        $total = DB::table("kas")->where('type_kas', '=', $type)->get()->sum("jumlah");


        return view('kas', ['kas' => $kas, 'type' => $type, 'total' => $total]);
    }

    public function Store(Request $request)
    {
        $kas = new kas_model();
        $kas->kode = $request->kode;
        $kas->tanggal = $request->tanggal;
        $kas->keterangan = $request->keterangan;
        $kas->jumlah = $request->jumlah;
        $kas->type_kas = $request->type_kas;
        $kas->save();
        return redirect('/kas/' . $request->type_kas);
    }

    public function edit($id)
    {
        $kas = kas_model::find($id);
        return view('kasedit', ['kas' => $kas]);
    }

    public function update(Request $request, $id)
    {
        $a = kas_model::findOrFail($id);
        $a->tanggal = $request->get('tanggal');
        $a->keterangan = $request->get('keterangan');
        $a->jumlah = $request->get('jumlah');
        $a->save();

        $type_kas = kas_model::find($id)->type_kas;

        return redirect('/kas/' . $type_kas);
    }

    public function destroy($id)
    {
        $type_kas = kas_model::find($id)->type_kas;

        $hapus = kas_model::findOrFail($id);
        $hapus->delete();

        return redirect('/kas/' . $type_kas);
    }

    public function rekapitulasi()
    {
        $kas = DB::table('kas')
            ->select('id', 'kode', 'tanggal', 'keterangan', 'jumlah', 'type_kas')
            ->get();

        $totalMasuk = DB::table("kas")->where('type_kas', '=', 'masuk')->get()->sum("jumlah");
        $totalKeluar = DB::table("kas")->where('type_kas', '=', 'keluar')->get()->sum("jumlah");
        $saldo = $totalMasuk - $totalKeluar;


        return view('rekapitulasi', [
            'kas' => $kas,
            'totalMasuk' => $totalMasuk,
            'totalKeluar' => $totalKeluar,
            'saldo' => $saldo
        ]);
    }

    public function grafik($tahun)
    {
        $m1 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'masuk')
            ->where('bulan', '=', '1')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();

        $m2 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'masuk')
            ->where('bulan', '=', '2')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();

        $m3 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'masuk')
            ->where('bulan', '=', '3')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();

        $m4 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'masuk')
            ->where('bulan', '=', '4')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();

        $m5 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'masuk')
            ->where('bulan', '=', '5')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();

        $m6 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'masuk')
            ->where('bulan', '=', '6')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();

        $m7 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'masuk')
            ->where('bulan', '=', '7')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();

        $m8 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'masuk')
            ->where('bulan', '=', '8')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();

        $m9 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'masuk')
            ->where('bulan', '=', '9')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();

        $m10 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'masuk')
            ->where('bulan', '=', '10')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();

        $m11 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'masuk')
            ->where('bulan', '=', '11')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();

        $m12 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'masuk')
            ->where('bulan', '=', '12')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();

        $k1 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'keluar')
            ->where('bulan', '=', '1')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();
        $k2 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'keluar')
            ->where('bulan', '=', '2')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();
        $k3 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'keluar')
            ->where('bulan', '=', '3')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();
        $k4 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'keluar')
            ->where('bulan', '=', '4')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();
        $k5 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'keluar')
            ->where('bulan', '=', '5')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();
        $k6 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'keluar')
            ->where('bulan', '=', '6')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();
        $k7 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'keluar')
            ->where('bulan', '=', '7')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();
        $k8 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'keluar')
            ->where('bulan', '=', '8')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();
        $k9 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'keluar')
            ->where('bulan', '=', '9')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();
        $k10 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'keluar')
            ->where('bulan', '=', '10')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();
        $k11 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'keluar')
            ->where('bulan', '=', '11')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();
        $k12 = DB::table('vw_arusKasSummary')
            ->where('type_kas', '=', 'keluar')
            ->where('bulan', '=', '12')
            ->where('tahun', '=', $tahun)
            ->select('jumlah')
            ->pluck('jumlah')
            ->first();
        return view('grafik', [
            'k1' => $k1,
            'k2' => $k2,
            'k3' => $k3,
            'k4' => $k4,
            'k5' => $k5,
            'k6' => $k6,
            'k7' => $k7,
            'k8' => $k8,
            'k9' => $k9,
            'k10' => $k10,
            'k11' => $k11,
            'k12' => $k12,
            'm1' => $m1,
            'm2' => $m2,
            'm3' => $m3,
            'm4' => $m4,
            'm5' => $m5,
            'm6' => $m6,
            'm7' => $m7,
            'm8' => $m8,
            'm9' => $m9,
            'm10' => $m10,
            'm11' => $m11,
            'm12' => $m12,
        ]);
    }

    public function export()
    {
        $kas = DB::table('kas')
            ->select('id', 'kode', 'tanggal', 'keterangan', 'jumlah', 'type_kas')
            ->get();
        $totalMasuk = DB::table("kas")->where('type_kas', '=', 'masuk')->get()->sum("jumlah");
        $totalKeluar = DB::table("kas")->where('type_kas', '=', 'keluar')->get()->sum("jumlah");
        $saldo = $totalMasuk - $totalKeluar;

        $pdf = PDF::loadview('kaspdf', [
            'kas' => $kas, 'totalMasuk' => $totalMasuk,
            'totalKeluar' => $totalKeluar,
            'saldo' => $saldo
        ])->setPaper('A4', 'potrait');
        return $pdf->stream();
        //$pdf = PDF::loadview('kaspdf', ['kaspdf' => $kas]);
        //return $pdf->download('kaspdf');
    }
}
