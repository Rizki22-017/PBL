@extends('layout.template')

@section('title', 'Homepage')

@section('content')
    <div class="bg-light">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (isset($capacityNotification))
            <div class="alert alert-warning">
                <p>{{ $capacityNotification }}</p>
            </div>
        @endif
        @if (isset($timeNotification))
            <div class="alert alert-info">
                <p>{{ $timeNotification }}</p>
            </div>
        @endif
    </div>
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    <span style="color: #1D1D1F;"><b>Hayday</b></span> -
                    <span style="color: #6E6E73;">Sistem Informasi Pengolahan</span><br>
                    <span style="color: #6E6E73;">Limbah Rumah Tangga Untuk Pupuk Kompos Berbasis Internet of Things</span>
                </h2>
                <br>
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="/images/logo.png" alt="HaydayTeam" style="width: 70px; height: auto; margin-right: 10px;">
                    <div>
                        <h4>Hi Buddies!!</h4>
                        <h5>What are you looking for today?</h5>
                        <br>
                    </div>
                </a>
                <div style="background: linear-gradient(to right, rgba(255, 250, 250, 0.89), rgb(69, 137, 76)); padding: 20px; color: #000000; border-radius: 5px;">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-2">
                            <h4>Check This Out</h4>
                        </div>
                        <div class="col-md-2">
                            <p>Here's your compost fertilizer data</p>
                        </div>
                        @if ($latestData)
                            <div class="col-md-2 text-center">
                                <img src="/images/humadity.png" alt="" class="img-humadity" style="width: 50px; height: 50px;"><br>
                                <h4>{{ $latestData->soil_moisture ?? 'N/A' }}%</h4>
                                <h5 style="color: #6E6E73">Humidity</h5>
                            </div>
                            <div class="col-md-2 text-center">
                                <img src="/images/temperature.png" alt="" class="img-temperature" style="width: 50px; height: 50px;"><br>
                                <h4>{{ $latestData->temperature ?? 'N/A' }} C</h4>
                                <h5 style="color: #6E6E73">Temperature</h5>
                            </div>
                            <div class="col-md-2 text-center">
                                <img src="/images/capacity.png" alt="" class="img-capacity" style="width: 50px; height: 50px;"><br>
                                <h4>{{ $latestData->distance ?? 'N/A' }}%</h4>
                                <h5 style="color: #6E6E73">Capacity</h5>
                            </div>

                            <div class="col-md-2 text-center">
                                <img src="/images/time.png" alt="" class="img-time" style="width: 50px; height: 50px;"><br>
                                <h4>{{ $daysDiff }} days</h4>
                                <h5 style="color: #6E6E73">Time</h5>
                                <p style="color: #6E6E73; font-size: 12px;">Started on: {{ $startDate ? $startDate->format('d M Y') : 'N/A' }}</p>
                            </div>
                        @else
                            <div class="col-md-12 text-center">
                                <h4>No data available</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
