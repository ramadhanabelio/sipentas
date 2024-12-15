@extends('layouts.admin')

@section('title', 'Tambah Data Dosen')

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Tambah Data Dosen
                                </h5>

                                <form action="{{ route('admin.lecturers.store') }}" class="row g-3" method="POST">
                                    @csrf
                                    <!-- Lecturer Name -->
                                    <div class="col-12">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>

                                    <!-- No. HP -->
                                    <div class="col-12">
                                        <label for="no_hp" class="form-label">Nomor HP</label>
                                        <input type="text" name="no_hp" class="form-control" required>
                                    </div>

                                    <!-- NIP/NIK -->
                                    <div class="col-12">
                                        <label for="nip_nik" class="form-label">NIP/NIK</label>
                                        <input type="text" name="nip_nik" class="form-control" required>
                                    </div>

                                    <!-- NIDN -->
                                    <div class="col-12">
                                        <label for="nidn" class="form-label">NIDN</label>
                                        <input type="text" name="nidn" class="form-control">
                                    </div>

                                    <!-- Dropdown Prodi -->
                                    <div class="col-12">
                                        <label for="id_prodi" class="form-label">Program Studi</label>
                                        <select name="id_prodi" class="form-control" required>
                                            <option value="" selected>Pilih Program Studi</option>
                                            @foreach ($prodis as $prodi)
                                                <option value="{{ $prodi->id }}">{{ $prodi->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
