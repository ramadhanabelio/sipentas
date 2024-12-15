@extends('layouts.mahasiswa')

@section('content')
    <div class="container">
        <h2>Dashboard Mahasiswa</h2>

        <h3>Fasilitas yang Tersedia</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Fasilitas</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laboratories as $laboratory)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $laboratory->name }}</td>
                        <td>{{ $laboratory->description }}</td>
                        <td>
                            <form action="{{ route('mahasiswa.peminjaman.store', $laboratory->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Pinjam</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
