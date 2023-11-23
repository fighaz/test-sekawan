<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $fillable = [
        'id_peminjam',
        'id_kendaraan',
        'lokasi_pemakaian',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'id_supervisor'
    ];
    protected $with = ['lokasi', 'peminjam'];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_pemakaian');
    }
    public function peminjam()
    {
        return $this->belongsTo(User::class, 'id_peminjam');
    }
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan');
    }
    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor');
    }
}
