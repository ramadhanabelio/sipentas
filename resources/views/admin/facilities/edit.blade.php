@extends('layouts.admin')

@section('title', 'Edit Data Fasilitas')

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Edit Data Fasilitas
                                </h5>

                                <form action="{{ route('admin.facilities.update', $facility) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Facility Name -->
                                    <div class="row mb-3">
                                        <label for="input" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $facility->name }}" required>
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div class="row mb-3">
                                        <label for="input" class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" class="form-control" style="height: 100px" required>{{ $facility->description }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Laboratory Dropdown -->
                                    <div class="row mb-3">
                                        <label for="input" class="col-sm-2 col-form-label">Lokasi</label>
                                        <div class="col-sm-10">
                                            <select name="id_laboratory" class="form-select">
                                                <option value=""
                                                    {{ is_null($facility->id_laboratory) ? 'selected' : '' }}>Pilih
                                                    Laboratorium</option>
                                                @foreach ($laboratories as $lab)
                                                    <option value="{{ $lab->id }}"
                                                        {{ $facility->id_laboratory == $lab->id ? 'selected' : '' }}>
                                                        {{ $lab->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Quantity -->
                                    <div class="row mb-3">
                                        <label for="input" class="col-sm-2 col-form-label">Jumlah</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="quantity"
                                                value="{{ $facility->quantity }}" min="1" required>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
