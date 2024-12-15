@extends('layouts.admin')

@section('title', 'Edit Data Lab')

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Edit Data Lab
                                </h5>

                                <form action="{{ route('admin.laboratories.update', $laboratory->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Laboratory Name -->
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $laboratory->name }}" required>
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div class="row mb-3">
                                        <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="description" name="description" required style="height: 100px;">{{ $laboratory->description }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Upload Image -->
                                    <div class="row mb-3">
                                        <label for="image" class="col-sm-2 col-form-label">Upload Gambar</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="image" name="image">
                                            @if ($laboratory->image)
                                                <div class="mt-2">
                                                    <img src="{{ Storage::url($laboratory->image) }}" alt="Image"
                                                        width="100">
                                                </div>
                                            @endif
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
