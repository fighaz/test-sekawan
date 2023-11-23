@extends('layout.index')
@section('konten')
    <form action="{{ url('admin/store') }}" method="post">
        @csrf
        <input type="hidden" name="id_kendaraan" value="{{ $kendaraan->id }}">
        <div class="form-group mb-3">
            <label for="Nama">Nama Driver</label>
            <select class="form-control" name="id_peminjam">
                @foreach ($pegawai as $p)
                    <option value="{{ $p->id }}">{{ $p->username }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">No Plat Kendaraan</label><span> = {{ $kendaraan->noplat }}</span>
        </div>
        <div class="form-group mb-3">
            <label for="kategori">Lokasi</label>
            <select class="form-control" name="lokasi_pemakaian">
                @foreach ($lokasi as $l)
                    <option value="{{ $l->id }}">{{ $l->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Tanggal Pinjam</label>
            <input class="form-control" type="date" name="tanggal_pinjam">
        </div>
        <div class="form-group">
            <label for="">Tanggal Kembali</label>
            <input class="form-control" type="date" name="tanggal_kembali">
        </div>
        <div class="form-group mb-3">
            <label for="Nama">Pilih Supervisor</label>
            <select class="form-control" name="id_supervisor">
                @foreach ($supervisor as $s)
                    <option value="{{ $s->id }}">{{ $s->username }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="submit" class="btn btn-primary">
    </form>
@endsection
