<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>SIPENTAS - Teknik Informatika :: Politeknik Negeri Bengkalis</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet" />
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <div class="container text-center">
                                            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo POLBENG"
                                                class="text-center" width="100px" />
                                        </div>
                                        <h5 class="card-title text-center pb-0 fs-4">DAFTAR</h5>
                                        <p class="text-center small">SIPENTAS - Sistem Informasi Peminjaman Fasilitas
                                        </p>
                                    </div>
                                    <form action="{{ route('mahasiswa.register.submit') }}" method="POST"
                                        class="row g-3 needs-validation" novalidate>
                                        @csrf

                                        <!-- Nama Lengkap -->
                                        <div class="col-12">
                                            <label for="name" class="form-label">Nama Lengkap</label>
                                            <input type="text"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                name="name" value="{{ old('name') }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- NIM -->
                                        <div class="col-12">
                                            <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                                            <input type="text"
                                                class="form-control @error('nim') is-invalid @enderror" id="nim"
                                                name="nim" value="{{ old('nim') }}" required>
                                            @error('nim')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Program Studi -->
                                        <div class="col-12">
                                            <label for="id_prodi" class="form-label">Program Studi</label>
                                            <select name="id_prodi"
                                                class="form-control @error('id_prodi') is-invalid @enderror" required>
                                                <option value="" disabled selected>Pilih Program Studi</option>
                                                @foreach ($prodis as $prodi)
                                                    <option value="{{ $prodi->id }}"
                                                        {{ old('id_prodi') == $prodi->id ? 'selected' : '' }}>
                                                        {{ $prodi->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_prodi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Semester -->
                                        <div class="col-12">
                                            <label for="semester" class="form-label">Semester</label>
                                            <select name="semester"
                                                class="form-control @error('semester') is-invalid @enderror"
                                                id="semester" required>
                                                <option value="" disabled selected>Pilih Semester</option>
                                                @for ($i = 1; $i <= 14; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ old('semester') == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                            @error('semester')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Password -->
                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password" required>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Konfirmasi Password -->
                                        <div class="col-12">
                                            <label for="password_confirmation" class="form-label">Konfirmasi
                                                Password</label>
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" required>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Daftar</button>
                                        </div>

                                        <!-- Link Masuk -->
                                        <div class="text-center col-12">
                                            <p class="small mb-0">Sudah punya akun? <a
                                                    href="{{ route('mahasiswa.login') }}">Masuk</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
