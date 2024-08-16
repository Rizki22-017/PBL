@extends('layout.template')

@section('title', 'Data Sensor')

@section('content')


    <h1>Data Sensor</h1>
    <table class="table table-hover">
        <div class="bg-secondary">
        <thead>
            <tr>
                <th style="background-color:#7ABA78" class="text-center" scope="col">No</th>
                <th style="background-color:#7ABA78" class="text-center" scope="col">Temperature</th>
                <th style="background-color:#7ABA78" class="text-center" scope="col">Distance</th>
                <th style="background-color:#7ABA78" class="text-center" scope="col">Soil Moisture</th>
                <th style="background-color:#7ABA78" class="text-center" scope="col">Time</th>
                {{-- <th style="background-color:#7ABA78" class="text-center" scope="col">Aksi</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($sensorData as $data)
                <tr>
                    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                    <td class="text-center">{{ $data->temperature }}</td>
                    <td class="text-center">{{ $data->distance }}</td>
                    <td class="text-center">{{ $data->soil_moisture }}</td>
                    <td class="text-center">1</td>
                    {{-- <td class="text-center">{{ $data->created_at }}</td> --}}
                    {{-- <td class="text-center">
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $sensorData->links() }}
    </div>
</div>
@endsection
