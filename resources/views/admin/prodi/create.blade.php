@extends('layouts.admin')

@section('title', 'Tambah Data Program Studi')

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Tambah Data Program Studi
                                </h5>

                                <form action="{{ route('admin.prodi.store') }}" class="row g-3" method="POST">
                                    @csrf

                                    <!-- Name -->
                                    <div class="col-12">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>

                                    <!-- Level -->
                                    <div class="col-12">
                                        <label for="level" class="form-label">Jenjang</label>
                                        <select name="level" class="form-control" required>
                                            <option value="" selected>Pilih Jenjang</option>
                                            <option value="D2 Jalur Cepat">D2 Jalur Cepat</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
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
