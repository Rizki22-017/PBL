@extends('layout.template')
@section('title', 'Persyaratan')
@section('content')
    <h2 class="mb-4">Masukkan Persyaratan</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="/persyaratan/store2" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap:</label>
            <input type="text" class="form-control" id="nama" name="nama" required="">
        </div>
        <div class="mb-3">
            <label for="tgl" class="form-label">Tanggal Lahir:</label>
            <input type="date" class="form-control" id="tgl" name="tgl" required="">
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">No nip:</label>
            <input type="text" class="form-control" id="nip" name="nip" required="">
        </div>
        <div class="mb-3">
            <label for="hp" class="form-label">No Hp:</label>
            <input type="text" class="form-control" id="hp" name="hp" required="">
        </div>
        <div class="mb-3">
            <label for="Temperature_id" class="form-label">Kategori:</label>
            <select name="Temperature_id" id="Temperature_id" class="form-select" required>
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $Temperature)
                    <option value="{{ $Temperature->id }}">{{ $Temperature->Temperature_id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="perusahaan" class="form-label">Perusahaan:</label>
            <input type="text" class="form-control" id="perusahaan" name="perusahaan"
             required="">
        </div>

        <div class="mb-3">
            <label for="Capacity" class="form-label">Capacity:</label>
            <textarea class="form-control" id="Capacity" name="Capacity" rows="4" required=""></textarea>
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun Mendaftar:</label>
            <input type="number" class="form-control" id="tahun" name="tahun" required="">
        </div>
        <div class="mb-3">
            <label for="foto_sampul" class="form-label">Foto Sampul:</label>
            <input type="file" class="form-control" id="foto_sampul" name="foto_sampul" required="">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/homepage" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection
