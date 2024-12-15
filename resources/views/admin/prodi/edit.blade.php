@extends('layouts.admin')

@section('title', 'Edit Data Program Studi')

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Edit Data Program Studi
                                </h5>

                                <form action="{{ route('admin.prodi.update', $prodi->id) }}" class="row g-3" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Name -->
                                    <div class="col-12">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $prodi->name }}" required>
                                    </div>

                                    <!-- Level -->
                                    <div class="col-12">
                                        <label for="level" class="form-label">Jenjang</label>
                                        <select name="level" class="form-control" required>
                                            <option value="" {{ is_null($prodi->level) ? 'selected' : '' }}>Pilih
                                                Jenjang</option>
                                            <option value="D2 Jalur Cepat"
                                                {{ $prodi->level == 'D2 Jalur Cepat' ? 'selected' : '' }}>
                                                D2 Jalur Cepat</option>
                                            <option value="D3" {{ $prodi->level == 'D3' ? 'selected' : '' }}>D3</option>
                                            <option value="D4" {{ $prodi->level == 'D4' ? 'selected' : '' }}>D4</option>
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
