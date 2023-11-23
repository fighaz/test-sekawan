<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class PeminjamanUser extends Controller
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
        return view("peminjam.index", compact("kendaraan"));


    }
    public function showPeminjaman()
    {
        $peminjamanuser = Peminjaman::where("id_supervisor", session('id'))->get();
        return view("supervisor.index", compact("peminjamanuser"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function konfirm($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->status = "disetujui";
        $peminjaman->save();
        return redirect("user");

    }
    public function tolak($id)
    {
        $data = Peminjaman::find($id);
        $data->status = "ditolak";
        $data->save();
        return redirect('user');
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_kendaraan' => 'required',
            'lokasi_pemakaian' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);
        $validateData['id_peminjam'] = auth()->user()->id;
        Peminjaman::create($validateData);
        return redirect('peminjam.pinjam')->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
