@extends('layouts.admin')

@section('title', 'Edit Data Dosen')

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Edit Data Dosen
                                </h5>

                                <form action="{{ route('admin.lecturers.update', $lecturer->id) }}" class="row g-3"
                                    method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Lecturer Name -->
                                    <div class="col-12">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $lecturer->name }}" required>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $lecturer->email }}" required>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password (Biarkan kosong jika tidak
                                            berubah)</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>

                                    <!-- No. HP -->
                                    <div class="col-12">
                                        <label for="no_hp" class="form-label">Nomor HP</label>
                                        <input type="text" name="no_hp" class="form-control"
                                            value="{{ $lecturer->no_hp }}" required>
                                    </div>

                                    <!-- NIP/NIK -->
                                    <div class="col-12">
                                        <label for="nip_nik" class="form-label">NIP/NIK</label>
                                        <input type="text" name="nip_nik" class="form-control"
                                            value="{{ $lecturer->nip_nik }}" required>
                                    </div>

                                    <!-- NIDN -->
                                    <div class="col-12">
                                        <label for="nidn" class="form-label">NIDN</label>
                                        <input type="text" name="nidn" class="form-control"
                                            value="{{ $lecturer->nidn }}">
                                    </div>

                                    <!-- Dropdown Prodi -->
                                    <div class="col-12">
                                        <label for="id_prodi" class="form-label">Program Studi</label>
                                        <select name="id_prodi" class="form-control" required>
                                            <option value="" {{ is_null($lecturer->id_prodi) ? 'selected' : '' }}>
                                                Pilih Program Studi</option>
                                            @foreach ($prodis as $prodi)
                                                <option value="{{ $prodi->id }}"
                                                    {{ $lecturer->id_prodi == $prodi->id ? 'selected' : '' }}>
                                                    {{ $prodi->name }}
                                                </option>
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
