@extends('layout.index')
@section('konten')
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>No Peminjaman</th>
                <th>Nama Peminjam</th>
                <th>Nama Kendaraan</th>
                <th>No Plat</th>
                <th>Lokasi Pemakaian</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->peminjam->username }}</td>
                    <td>{{ $p->kendaraan->nama }}</td>
                    <td>{{ $p->kendaraan->noplat }}</td>
                    <td>{{ $p->lokasi->nama }}</td>
                    <td>{{ $p->tanggal_pinjam }} </td>
                    <td>{{ $p->tanggal_kembali }}</td>
                    <td>{{ $p->status }}</td>

                </tr>
            @endforeach

        </tbody>

    </table>
@endsection
