@extends('layouts.admin')

@section('title', 'Edit Data Staff Jurusan')

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Edit Data Staff Jurusan
                                </h5>

                                <form action="{{ route('admin.staff.update', $staff->id) }}" class="row g-3" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Staff Name -->
                                    <div class="col-12">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $staff->name }}" required>
                                    </div>

                                    <!-- NIP/NIK -->
                                    <div class="col-12">
                                        <label for="nip_nik" class="form-label">NIP/NIK</label>
                                        <input type="text" name="nip_nik" class="form-control"
                                            value="{{ $staff->nip_nik }}" required>
                                    </div>

                                    <!-- Position -->
                                    <div class="col-12">
                                        <label for="position" class="form-label">Jabatan</label>
                                        <select name="position" class="form-control" required>
                                            <option value="" {{ is_null($staff->position) ? 'selected' : '' }}>Pilih
                                                Jabatan</option>
                                            <option value="Laboran" {{ $staff->position == 'Laboran' ? 'selected' : '' }}>
                                                Laboran</option>
                                            <option value="Staff Jurusan"
                                                {{ $staff->position == 'Staff Jurusan' ? 'selected' : '' }}>Staff Jurusan
                                            </option>
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
