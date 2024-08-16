@extends('layout.template')

@section('title', $Instansi['judul'])

@section('content')

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-9">
                <div class="card-body">
                    <h2 class="card-title">{{ $Instansi['Humidity'] }}</h2>
                    <p class="card-text">{{ $Instansi['Capacity'] }}</p>
                    <p class="card-text">Kategori : {{ $Instansi->Temperature->Temperature_id }}</p>
                    <p class="card-text">Tahun : {{ $Instansi['tahun'] }}</p>
                    <a href="/homepage" class="btn btn-primary">Kembali</a>

                      @auth
                    @if (auth()->user()->role == 'user')
                        <!-- Periksa apakah pengguna memiliki peran admin -->
                       <a href="/persyaratan/create2" class="btn btn-danger">Daftar Untuk Perusahan Ini</a>
                    @endif
                @endauth


                </div>
            </div>
            <div class="col-md-3">
                <img src="/images/{{ $Instansi['foto_sampul'] }}" class="img-fluid rounded-end" alt="...">
            </div>
        </div>
    </div>

@endsection
