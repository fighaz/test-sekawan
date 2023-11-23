@extends('layout.index')
@section('konten')
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>No Plat</th>
                <th>Jenis Kendaraan</th>
                <th>Jadwal Servis</th>
                <th>Pemakaian BBM</th>
                <th>Status Milik</th>
                <th>Tanggal Masuk</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kendaraan as $k)
                <tr>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->noplat }}</td>
                    <td>{{ $k->jenis_kendaraan }}</td>
                    <td>{{ $k->jadwal_servis }}</td>
                    <td>{{ $k->pemakaian_bbm }} KM/L</td>
                    <td>{{ $k->status_milik }}</td>
                    <td>{{ $k->tanggal_masuk }}</td>
                    <td>
                        <a href="" class="btn-sm btn-secondary">Detail</a>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
@endsection
