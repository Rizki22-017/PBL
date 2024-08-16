@extends('layout.template')

@section('title', 'Homepage')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-dark">
        <div class="card text-dark text-center">
            <img src="/images/logo.png" class="card-img" alt="..." style="width: 30%; height: auto; margin-right: 30%;">
            <div class="card-img-overlay d-flex flex-column justify-content-center">
                <h2 class="card-title" >Project Base Learning</h2>
                <p class="card-text">Selamatkan Bumi, Gunakan Pupuk Alami</p>
            </div>
        </div>
        
    </div>

@endsection
