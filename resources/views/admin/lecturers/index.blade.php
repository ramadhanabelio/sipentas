@extends('layouts.admin')

@section('title', 'Manajemen Data Dosen')

@section('content')
    <div class="pagetitle">
        <h1>Manajemen Data Dosen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Manajemen Data Dosen</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Action</h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.lecturers.create') }}">+ Tambah Data
                                            Dosen</a>
                                    </li>
                                    {{-- <li>
                                        <a class="dropdown-item" href="#">Print PDF</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Print Excel</a>
                                    </li> --}}
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">
                                    Manajemen Data Dosen
                                </h5>

                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIP / NIK</th>
                                            <th>Nama</th>
                                            <th>NIDN</th>
                                            <th>Program Studi</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lecturers as $lecturer)
                                            <tr>
                                                <td>{{ $loop->iteration }}.</td>
                                                <td>{{ $lecturer->nip_nik }}</td>
                                                <td>{{ $lecturer->name }}</td>
                                                <td>{{ $lecturer->nidn }}</td>
                                                <td>{{ $lecturer->prodi->level }} {{ $lecturer->prodi->name }}</td>
                                                <td>
                                                    <!-- Edit Badge -->
                                                    <a href="{{ route('admin.lecturers.edit', $lecturer) }}"
                                                        class="badge bg-warning text-dark">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>

                                                    <!-- Hapus Badge -->
                                                    <button type="button" class="badge bg-danger text-white border-0"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $lecturer->id }}">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>

                                                    <!-- Modal Konfirmasi Hapus -->
                                                    <div class="modal fade" id="deleteModal{{ $lecturer->id }}"
                                                        tabindex="-1" aria-labelledby="deleteModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi
                                                                        Hapus</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus data ini?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <!-- Tombol Cancel -->
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <!-- Form Hapus -->
                                                                    <form
                                                                        action="{{ route('admin.lecturers.destroy', $lecturer->id) }}"
                                                                        method="POST" style="display:inline-block;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
