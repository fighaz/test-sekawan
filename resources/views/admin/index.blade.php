@extends('layout.index')
@section('konten')
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>No Plat</th>
                <th>Jenis Kendaraan</th>
                <th>Pemakaian BBM</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kendaraan as $k)
                <tr>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->noplat }}</td>
                    <td>{{ $k->jenis_kendaraan }}</td>
                    <td>{{ $k->pemakaian_bbm }} KM/L</td>
                    <td>
                        <a href="{{ url('admin/pinjam/' . $k->id) }}" class="btn-sm btn-secondary">Pinjam</a>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
@endsection
