<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Facades\Charts;
use App\Http\Requests\StoreKendaraanRequest;
use App\Http\Requests\UpdateKendaraanRequest;
use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kendaraan = Kendaraan::all();
        return view("kendaraan.index", compact("kendaraan"));
    }

    public function detail()
    {
        $data = DB::table('kendaraans')
            ->join('peminjamen', 'kendaraans.id', '=', 'peminjamen.id_kendaraan')
            ->select('kendaraans.nama', DB::raw('count(*) as penggunaan'))
            ->groupBy('kendaraans.nama')
            ->get();

        $chart = Charts::create('bar', 'highcharts')
            ->title('Penggunaan Kendaraan Berdasarkan Nama')
            ->elementLabel('Jumlah Penggunaan')
            ->labels($data->pluck('nama'))
            ->values($data->pluck('penggunaan'))
            ->render();

        return view('chart.kendaraan_usage_chart', compact('chart'));
    }
}
