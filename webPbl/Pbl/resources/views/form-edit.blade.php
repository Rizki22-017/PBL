@extends('layout.template')
@section('title', 'Input Data Instansi')
@section('content')
  
    <h2 class="mb-4">Edit Instansi</h2>
    <form action="/Instansi/{{ $Instansi->id }}/edit" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id" class="form-label">ID Instansi:</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $Instansi->id }}" disabled>
        </div>
        <div class="mb-3">
            <label for="Humidity" class="form-label">Nama Perusahaan:</label>
            <input type="text" class="form-control" id="nama" name="Humidity"
                value="{{ $Instansi->Humidity }}" required="">
        </div>
        <div class="mb-3">
            <label for="Temperature_id" class="form-label">Kategori:</label>
            <select name="Temperature_id" id="Temperature_id" class="form-select" required>
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $Temperature)
                    <option value="{{ $Temperature->id }}" {{ $Instansi->Temperature_id == $Temperature->id ? 'selected' : '' }}>
                        {{ $Temperature->Temperature_id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="Capacity" class="form-label">Capacity:</label>
            <textarea class="form-control" id="Capacity" name="Capacity" rows="4" required="">{{ $Instansi->Capacity }}</textarea>
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun:</label>
            <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $Instansi->tahun }}"
                required="">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Sebelumnya:</label>
            <img src="/images/{{ $Instansi['foto_sampul'] }}" class="img-thumbnail" alt="..." width="100px">
        </div>
        <div class="mb-3">
            <label for="foto_sampul" class="form-label">Foto Sampul:</label>
            <input type="file" class="form-control" id="foto_sampul" name="foto_sampul">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
