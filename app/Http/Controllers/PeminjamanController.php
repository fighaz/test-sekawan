<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use App\Models\Peminjaman;
use App\Models\Kendaraan;
use App\Models\Lokasi;
use App\Models\User;


class PeminjamanController extends Controller
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
        return view("admin.index", compact("kendaraan"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idkendaraan)
    {
        //
        $kendaraan = Kendaraan::find($idkendaraan);
        $lokasi = Lokasi::all();
        $pegawai = User::where("jabatan", "pegawai")->get();
        $supervisor = User::where("jabatan", "supervisor")->get();

        return view("admin.pinjam", compact('lokasi', 'pegawai', 'kendaraan', 'supervisor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeminjamanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'id_peminjam' => 'required',
            'id_kendaraan' => 'required',
            'lokasi_pemakaian' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'id_supervisor' => 'required',
        ]);
        Peminjaman::create($validateData);
        return redirect('admin/peminjaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $peminjaman = Peminjaman::all();
        return view('admin.peminjaman', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */

    public function ApproveAdmin(Request $request, Peminjaman $peminjaman)
    {
        $peminjaman->status = $request->status;
        $peminjaman->supervisor_id = auth()->user()->id;
        $peminjaman->save();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeminjamanRequest  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeminjamanRequest $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
