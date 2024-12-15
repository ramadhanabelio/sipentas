@extends('layouts.admin')

@section('content')
    <h1>User Management</h1>
    <h2>Students</h2>
    <ul>
        @foreach ($students as $student)
            <li>{{ $student->name }}</li>
        @endforeach
    </ul>
    <h2>Lecturers</h2>
    <ul>
        @foreach ($lecturers as $lecturer)
            <li>{{ $lecturer->name }}</li>
        @endforeach
    </ul>
@endsection
