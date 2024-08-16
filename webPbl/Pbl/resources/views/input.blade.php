@extends('layout.template')
@section('title', 'Input Data Instansi')
@section('content')
    <h2 class="mb-4">Tambah Progres Baru</h2>
    <form action="/Instansi/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">ID Instansi:</label>
            <input type="text" class="form-control" id="id" name="id" required="">
        </div>
        <div class="mb-3">
            <label for="Humidity" class="form-label">Humidity</label>
            <input type="text" class="form-control" id="Humidity" name="Humidity" required="">
        </div>
        <div class="mb-3">
            <label for="Temperature_id" class="form-label">Temperature</label>
            <select name="Temperature_id" id="Temperature_id" class="form-select" required>
                <option value="">Pilih Temperature</option>
                @foreach ($categories as $Temperature)
                    <option value="{{ $Temperature->id }}">{{ $Temperature->Temperature_id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="Capacity" class="form-label">Capacity</label>
            <textarea class="form-control" id="Capacity" name="Capacity" rows="4" required=""></textarea>
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Time</label>
            <input type="number" class="form-control" id="tahun" name="tahun" required="">
        </div>
        <div class="mb-3">
            <label for="foto_sampul" class="form-label">Foto Sampul:</label>
            <input type="file" class="form-control" id="foto_sampul" name="foto_sampul" required="">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/Instansis/data" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection
