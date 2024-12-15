@extends('layouts.admin')

@section('title', 'Manage Facilities')

@section('content')
    <div class="pagetitle">
        <h1>Manage Facilities</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">Manage Facilities</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Recent Sales -->
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
                                        <a class="dropdown-item" href="{{ route('admin.facilities.create') }}">+ Add New
                                            Facility</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Print PDF</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Print Excel</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">
                                    Manage Facilities
                                </h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Location</th>
                                            <th>Quantity</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($facilities as $facility)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $facility->name }}</td>
                                                <td>{{ $facility->description }}</td>
                                                <td>{{ $facility->location }}</td>
                                                <td>{{ $facility->quantity }}</td>
                                                <td>
                                                    <span class="badge bg-warning">
                                                        <a href="{{ route('admin.facilities.edit', $facility) }}"
                                                            class="text-decoration-none text-dark">
                                                            <i class="bi bi-pencil me-1"></i> Edit
                                                        </a>
                                                    </span>

                                                    <span class="badge bg-danger">
                                                        <form action="{{ route('admin.facilities.destroy', $facility) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="badge bg-danger border-0 text-light"
                                                                style="cursor: pointer;">
                                                                <i class="bi bi-trash me-1"></i> Delete
                                                            </button>
                                                        </form>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
