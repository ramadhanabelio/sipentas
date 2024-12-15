<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Aplikasi Peminjaman Fasilitas')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRAB+8QBs6Io8WlSOtWyyUtG1J7WlszM6/hy5aBi2pC8AKz8FMQh37X8X" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles') {{-- Untuk menambahkan stylesheet khusus per halaman --}}
</head>

<body>

    <div id="app">
        <!-- Sidebar dan Navbar akan ditempatkan di sini -->
        <div class="d-flex" id="wrapper">
            <div class="bg-dark text-white" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                    <h4>Aplikasi Peminjaman Fasilitas</h4>
                </div>
                <div class="list-group list-group-flush">
                    @if (Auth::guard('admin')->check())
                        <a href="{{ route('admin.dashboard') }}"
                            class="list-group-item list-group-item-action bg-dark text-white">Dashboard Admin</a>
                        <a href="{{ route('admin.users.index') }}"
                            class="list-group-item list-group-item-action bg-dark text-white">Manajemen Pengguna</a>
                        <a href="{{ route('admin.laboratories.index') }}"
                            class="list-group-item list-group-item-action bg-dark text-white">Manajemen Laboratorium</a>
                    @elseif (Auth::guard('lecturer')->check())
                        <a href="{{ route('dosen.dashboard') }}"
                            class="list-group-item list-group-item-action bg-dark text-white">Dashboard Dosen</a>
                        <a href="{{ route('dosen.laboratories.index') }}"
                            class="list-group-item list-group-item-action bg-dark text-white">Laporan Peminjaman</a>
                    @elseif (Auth::check())
                        <a href="{{ route('mahasiswa.dashboard') }}"
                            class="list-group-item list-group-item-action bg-dark text-white">Dashboard Mahasiswa</a>
                        {{-- <a href="{{ route('mahasiswa.peminjaman.store') }}"
                            class="list-group-item list-group-item-action bg-dark text-white">Peminjaman Fasilitas</a> --}}
                    @endif
                    {{-- <form action="{{ route('logout') }}" method="POST"> --}}
                    @csrf
                    <button type="submit"
                        class="list-group-item list-group-item-action bg-dark text-white">Logout</button>
                    </form>
                </div>
            </div>

            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="menu-toggle">Toggle Sidebar</button>
                    </div>
                </nav>

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gyb1zNl8k+PM7nZeC2t7WlAqI5XAmf6DeQpTjpBEBt3ry4b0YF4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyt6tGqF6dG9zNp+qM1g02i5aB6Ev2b/CwJlqzFGoH7z7Knz5EdkLQ0" crossorigin="anonymous">
    </script>
    <script>
        // Script untuk toggle sidebar
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('wrapper').classList.toggle('toggled');
        });
    </script>
    @stack('scripts') {{-- Untuk menambahkan script khusus per halaman --}}
</body>

</html>
