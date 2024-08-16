@extends('layout.template')

@section('title', 'Data Instansi')

@section('content')

<a href="/Instansis/create" class="btn bg-success mt-2 text-white">Input New Progres</a>

    <h1>Data Progres</h1>
    <table class="table table-hover">
        <div class="bg-secondary">
        <thead>
            <tr>
                <th style="background-color:#7ABA78" class="text-center" scope="col">No</th>
                <th style="background-color:#7ABA78" class="text-center" scope="col">Humidity</th>
                <th style="background-color:#7ABA78" class="text-center" scope="col">Capacity</th>
                <th style="background-color:#7ABA78" class="text-center" scope="col">Temperature</th>
                <th style="background-color:#7ABA78" class="text-center" scope="col">Time</th>

                <th style="background-color:#7ABA78" class="text-center" scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Instansis as $Instansi)
                <tr>
                    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                    <td class="text-center">{{ $Instansi->Humidity }}</td>
                    <td class="text-center">{{ $Instansi->Capacity }}</td>
                    <td class="text-center">{{ $Instansi->Temperature_id }}</td>
                    <td class="text-center">{{ $Instansi->tahun }}</td>
                    <td class="text-center" >
                        <a href="/Instansi/{{ $Instansi['id'] }}/edit" class="btn btn-warning">Edit</a>
                        <a href="/Instansi/delete/{{ $Instansi->id }}" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $Instansis->links() }}
    </div>
</div>
@endsection
