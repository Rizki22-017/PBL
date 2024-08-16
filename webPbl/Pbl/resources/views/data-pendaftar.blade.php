@extends('layout.template')

@section('title', 'Data pendaftar')

@section('content')


@if (auth()->user()->role == 'admin')
    <a href="/persyaratan/create2" class="btn bg-success mt-2 text-white">Input New Member</a>
@endif
{{-- <a href="/persyaratan/create2" class="btn bg-success mt-2 text-white">Input New Member</a> --}}

    <h1>Data Member</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="background-color:#7ABA78" class="text-center"  scope="col">No</th>
                <th style="background-color:#7ABA78" class="text-center"  scope="col">Nama Lengkap</th>
                <th style="background-color:#7ABA78" class="text-center"  scope="col">Kategori</th>
                <th style="background-color:#7ABA78" class="text-center"  scope="col">Tanggal Lahir</th>
                <th style="background-color:#7ABA78" class="text-center"  scope="col">NIP</th>
                <th style="background-color:#7ABA78" class="text-center"  scope="col">No Hp</th>
                <th style="background-color:#7ABA78" class="text-center"  scope="col">Perusahaan</th>
                <th style="background-color:#7ABA78" class="text-center"  scope="col">Alamat</th>
                <th style="background-color:#7ABA78" class="text-center"  scope="col">Tahun</th>
                @auth
                    @if (auth()->user()->role == 'admin')
                        <!-- Periksa apakah pengguna memiliki peran admin -->
                        <th style="background-color:#7ABA78" class="text-center"  scope="col">Aksi</th>
                    @endif
                @endauth

            </tr>
        </thead>
        <tbody>
            @foreach ($persyaratans as $persyaratan)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td class="text-center">{{ $persyaratan->nama }}</td>
                    <td class="text-center">{{ $persyaratan->Temperature_id }}</td>
                    <td class="text-center">{{ $persyaratan->tgl }}</td>
                    <td class="text-center">{{ $persyaratan->nip }}</td>
                    <td class="text-center">{{ $persyaratan->hp }}</td>
                    <td class="text-center">{{ $persyaratan->perusahaan }}</td>
                    <td class="text-center">{{ $persyaratan->Capacity }}</td>
                    <td class="text-center">{{ $persyaratan->tahun }}</td>

                    @auth
                        @if (auth()->user()->role == 'admin')
                            <!-- Periksa apakah pengguna memiliki peran admin -->
                            <td class="text-center">
                                <a href="/persyaratan/delete/{{ $persyaratan->id }}" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        @endif
                    @endauth

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $persyaratans->links() }}
    </div>
@endsection
