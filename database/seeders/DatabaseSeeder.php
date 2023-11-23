<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Lokasi;
use App\Models\Kendaraan;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'level' => 'admin',
            'jabatan' => 'admin',
        ]);
        User::create([
            'username' => 'pegawai',
            'password' => Hash::make('password'),
            'level' => 'user',
            'jabatan' => 'pegawai',
        ]);
        User::create([
            'username' => 'supervisor',
            'password' => Hash::make('password'),
            'level' => 'user',
            'jabatan' => 'supervisor',
        ]);
        Lokasi::create([
            'nama' => 'Palembang',
            'keterangan' => 'Tambang Emas',
        ]);
        Lokasi::create([
            'nama' => 'Pekanbaru',
            'keterangan' => 'Tambang Nikel'
        ]);
        Lokasi::create([
            'nama' => 'Riau',
            'keterangan' => 'Tambang Bauksit'
        ]);
        Kendaraan::create([
            'nama' => 'Dump Truck',
            'noplat' => 'DK 02487',
            'jenis_kendaraan' => 'barang',
            'jadwal_servis' => '2023-12-12',
            'pemakaian_bbm' => 5,
            'status_milik' => 'Milik Perusahaan',
            'tanggal_masuk' => '2022-08-09',
        ]);
        Kendaraan::create([
            'nama' => 'Bus',
            'noplat' => 'DK 02347',
            'jenis_kendaraan' => 'orang',
            'jadwal_servis' => '2023-12-12',
            'pemakaian_bbm' => 8,
            'status_milik' => 'Milik Perusahaan',
            'tanggal_masuk' => '2022-08-09',
        ]);
    }
}
