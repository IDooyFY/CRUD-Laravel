<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Menu Guru</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block"><i class="bi bi-person-raised-hand"></i> Menu guru</span>
            </a>
        </div><!-- End Logo -->
    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="/">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="kelas">
                    <i class="bi bi-house"></i>
                    <span>Kelas</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="siswa">
                    <i class="bi bi-person-vcard"></i><span>Siswa</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="mapel">
                    <i class="bi bi-journal-text"></i><span>Mata Pelajaran</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="guru">
                    <i class="bi bi-person-raised-hand"></i><span>Guru</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Guru</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Guru</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Jumlah Kelas</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-house"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $kelas->count() }} Kelas</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Jumlah Siswa</h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-vcard"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $siswa->count() }} Siswa</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Table -->
                    <section class="section">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Data Guru | <span>{{ $guru->count() ?? '' }}
                                                Guru</span></h5>
                                        <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"><i class="bi bi-person-vcard"></i> Tambah
                                            Guru</button>


                                        <!-- Modal -->
                                        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="create.guru" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <!-- Kolom pertama -->
                                                                <div class="mb-3">
                                                                    <label for="exampleInputNis">Nama:</label>
                                                                    <input type="text" class="form-control" name="nama"
                                                                        placeholder="Nama">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputNama">No Induk:</label>
                                                                    <input type="text" inputmode="numeric" class="form-control" name="no_induk" maxlength="5" placeholder="No Induk">

                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputNama">Alamat:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="alamat" placeholder="Alamat">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputNama">No Telepon:</label>
                                                                    <input type="number" class="form-control"
                                                                        name="no_telepon" placeholder="no_telepon">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Modal --}}

                                        <div class="row g-3 align-items-center mt-2">
                                            <div class="col-auto">
                                                <form action="{{ route('guru') }}" method="GET">
                                                    <input type="search" name="search" id="searchInput" class="form-control mx-sm-3" placeholder="Search">
                                                </form>
                                            </div>
                                        </div>

                                        <table class="table table-hover mt-3 border text-center"
                                            style="font-family: 'Nunito', sans-serif;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>No Induk</th>
                                                    <th>Alamat</th>
                                                    <th>No Telepon</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php
                                                $no = 1;
                                                @endphp
                                                @foreach ($guru as $row)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $row->nama }}</td>
                                                    <td>{{ $row->no_induk }}</td>
                                                    <td>{{ $row->alamat }}</td>
                                                    <td>{{ $row->no_telepon }}</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-sm btn-warning rounded ms-2 shadow-sm btn-edit"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModalEdit"
                                                            data-id="{{ $row->id }}"
                                                            data-nama="{{ $row->nama }}"
                                                            data-no_induk="{{ $row->no_induk }}"
                                                            data-alamat="{{ $row->alamat }}"
                                                            data-no_telepon="{{ $row->no_telepon }}">
                                                            Edit Data
                                                        </button>
                                                        <form action="{{ route('guru.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger rounded ms-2 shadow-sm">Hapus data</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                <!-- Modal Edit-->
                                                <div class="modal fade bd-example-modal-lg" id="exampleModalEdit"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    Guru</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="formEdit" method="POST"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row">
                                                                        <div class="mb-3">
                                                                            <label for="editNama">Nama:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="editNama" name="nama"
                                                                                placeholder="Nama">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="editNoInduk">No Induk:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="editNo_induk" name="no_induk"
                                                                                placeholder="No Induk" inputmode="numeric" maxlength="5">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="editAlamat">Alamat:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="editAlamat" name="alamat"
                                                                                placeholder="Alamat">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="editNoTelepon">No
                                                                                Telepon:</label>
                                                                            <input type="number" class="form-control"
                                                                                id="editNoTelepon" name="no_telepon"
                                                                                placeholder="No Telepon">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Table -->

                </div>
            </div>
        </section>

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>SMKN6 Balikpapan</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">Ridhoo</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
                var editButtons = document.querySelectorAll('.btn-edit');
                var modal = document.getElementById('exampleModalEdit');
                var form = document.getElementById('formEdit');

                editButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        var id = this.getAttribute('data-id');
                        var nama = this.getAttribute('data-nama');
                        var no_induk = this.getAttribute('data-no_induk');
                        var alamat = this.getAttribute('data-alamat');
                        var no_telepon = this.getAttribute('data-no_telepon');

                        form.action = `/guru/${id}`;
                        modal.querySelector('#editNama').value = nama;
                        modal.querySelector('#editNo_induk').value = no_induk;
                        modal.querySelector('#editAlamat').value = alamat;
                        modal.querySelector('#editNoTelepon').value = no_telepon;
                    });
                });
            });
    </script>

</body>

</html>
