<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Menu Kelas</title>
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
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block"><i class="bi bi-menu-button-wide-fill"></i> Menu mapel</span>
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
                <a class="nav-link" href="mapel">
                    <i class="bi bi-journal-text"></i><span>Mata Pelajaran</span>
                </a>
            </li>
        </ul>
    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Mata Pelajaran</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Mata Pelajaran</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Kelas</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
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
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
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
                                    <h5 class="card-title">Data Mata Pelajaran | <span>{{ $mapel->count() ?? '' }} Mata
                                            pelajaran</span></h5>
                                    <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><i class="bi bi-journal-text"></i> Tambah
                                        Mapel</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mata pelajaran
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="create.mapel" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="exampleInputMapel" class="form-label">Mata
                                                                Pelajaran: </label>
                                                            <input type="text" name="mapel" class="form-control"
                                                                id="exampleInputMapel" placeholder="Mata Pelajaran">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputGuru" class="form-label">Guru Pengajar:</label>
                                                            <input type="text" name="guru" class="form-control"
                                                                id="exampleInputGuru" placeholder="Guru">
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
                                            <form action="{{ route('mapel.index') }}" method="GET">
                                                <input type="search" name="search" id="searchInput" class="form-control mx-sm-3" placeholder="Search">
                                            </form>
                                        </div>
                                    </div>


                                    <table class="table table-hover mt-3 border text-center" id="mapelTable" style="font-family: 'Nunito', sans-serif;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Mata Pelajaran</th>
                                                <th>Guru Mata Pelajaran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($mapel as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->mapel }}</td>
                                                <td>{{ $row->guru }}</td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-sm btn-warning rounded ms-2 shadow-sm btn-edit-mapel"
                                                        data-bs-toggle="modal" data-bs-target="#modalEditMapel"
                                                        data-id="{{ $row->id }}" data-mapel="{{ $row->mapel }}"
                                                        data-guru="{{ $row->guru }}">Edit Data</button>
                                                    <form action="{{ route('mapel.destroy', $row->id) }}" method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger rounded ms-2 shadow-sm">Hapus
                                                            data</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach

                                            <!-- Modal Edit Mata Pelajaran-->
                                            <div class="modal fade" id="modalEditMapel" tabindex="-1"
                                                aria-labelledby="modalEditMapelLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalEditMapelLabel">Edit Mata
                                                                Pelajaran</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="formEditMapel" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="editMapel" class="form-label">Mata
                                                                        Pelajaran: </label>
                                                                    <input type="text" name="mapel" class="form-control"
                                                                        id="editMapel" placeholder="Mata Pelajaran">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="editGuru" class="form-label">Guru Mata
                                                                        Pelajaran:</label>
                                                                    <input type="text" class="form-control"
                                                                        id="editGuru" name="guru" placeholder="Guru"
                                                                        required>
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
                                            <!-- End Modal Edit Mata Pelajaran-->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Table -->
            </div>
        </section>
    </main><!-- End #main -->

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
            var editMapelButtons = document.querySelectorAll('.btn-edit-mapel');
            var modalEditMapel = document.getElementById('modalEditMapel');
            var formEditMapel = document.getElementById('formEditMapel');

            editMapelButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var id = this.getAttribute('data-id');
                    var mapel = this.getAttribute('data-mapel');
                    var guru = this.getAttribute('data-guru');

                    formEditMapel.action = `/mapel/${id}`;
                    modalEditMapel.querySelector('#editMapel').value = mapel;
                    modalEditMapel.querySelector('#editGuru').value = guru;
                });
            });
        });
    </script>
</body>

</html>
