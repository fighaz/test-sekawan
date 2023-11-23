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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->peminjam->nama }}</td>
                    <td>{{ $k->kendaraan->nama }}</td>
                    <td>{{ $k->kendaraan->noplat }}</td>
                    <td>{{ $k->lokasi->nama }}</td>
                    <td>{{ $k->tanggal_pinjam }} </td>
                    <td>{{ $k->tanggal_kembali }}</td>
                    <td>
                        <a href="" class="btn-sm btn-secondary">Konfirmasi</a>
                        <a href="" class="btn-sm btn-secondary">Tolak</a>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
@endsection
