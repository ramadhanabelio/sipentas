@extends('layouts.admin')

@section('title', 'Edit Facilities')

@section('content')
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Recent Sales -->
                    <div class="col-8">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Edit Facilities
                                </h5>

                                <form action="{{ route('admin.facilities.update', $facility) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="input" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $facility->name }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="input" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" class="form-control" style="height: 100px" required>{{ $facility->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="input" class="col-sm-2 col-form-label">Location</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="location"
                                                value="{{ $facility->location }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="input" class="col-sm-2 col-form-label">Quantity</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="quantity"
                                                value="{{ $facility->quantity }}" min="1" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Recent Sales -->
                </div>
            </div>
            <!-- End Left side columns -->
        </div>
    </section>
@endsection
