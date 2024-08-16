@extends('layout.template')
@section('title', 'Turorial')
@section('content')
        
    
    {{-- @foreach ($Instansis as $Instansi) --}}
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card">
            <img src="/images/kering2.jpeg" alt="HaydayTeam" style="width: 70px; height: auto; margin-right: 10px;">
            <div class="card-body">
              <h5 class="card-title">HaydayTeam</h5>
              <p class="card-text">Pupuk Kompos kering.</p>
              <p class="card-text">Rp.20.000,</p>
              <a href="#" class="btn btn-primary">Beli</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <img src="/images/cair2.jpeg" alt="HaydayTeam" style="width: 95px; height: auto; margin-right: 30px;">
            <div class="card-body">
              <h5 class="card-title">HaydayTeam</h5>
              <p class="card-text">Pupuk Kompos cair.</p>
              <p class="card-text">Rp.50.000,</p>
              <a href="#" class="btn btn-primary">Beli</a>
            </div>
          </div>
        </div>

        
      </div>
      

    @endsection