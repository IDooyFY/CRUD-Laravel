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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
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
                                        <h5 class="card-title">Data Guru | <span>{{ $guru->count() ?? '' }}
                                                Guru</span></h5>
                                        <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#createGuruModal"><i class="bi bi-house-add"></i> Tambah
                                            Guru</button>

                                        <!-- Modal for Creating Guru -->
                                        <div class="modal fade bd-example-modal-lg" id="createGuruModal" tabindex="-1" aria-labelledby="createGuruModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="createGuruModalLabel">Tambah Guru
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="createGuruForm" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="mb-3">
                                                                    <label for="namaInput">Nama:</label>
                                                                    <input type="text" class="form-control" name="nama" id="namaInput" placeholder="Nama" required>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="noIndukInput">No Induk:</label>
                                                                    <input type="number" class="form-control" name="no_induk" id="noIndukInput" placeholder="No Induk" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="alamatInput">Alamat:</label>
                                                                    <input type="text" class="form-control" name="alamat" id="alamatInput" placeholder="Alamat" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="noTeleponInput">No Telepon:</label>
                                                                    <input type="number" class="form-control" name="no_telepon" id="noTeleponInput" placeholder="No Telepon" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Edit Guru -->
                                        <div class="modal fade" id="editGuruModal" tabindex="-1" aria-labelledby="editGuruModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editGuruModalLabel">Edit Guru</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="editGuruForm">
                                                            @csrf
                                                            <input type="hidden" id="editGuruId" name="id">
                                                            <div class="mb-3">
                                                                <label for="editnamaInput" class="form-label">Nama:</label>
                                                                <input type="text" class="form-control" id="editnamaInput" name="nama" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="editnoIndukInput" class="form-label">No Induk:</label>
                                                                <input type="number" class="form-control" id="editnoIndukInput" name="no_induk" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="editalamatInput" class="form-label">Alamat:</label>
                                                                <input type="text" class="form-control" id="editalamatInput" name="alamat" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="editnoTeleponInput" class="form-label">No Telepon:</label>
                                                                <input type="text" class="form-control" id="editnoTeleponInput" name="no_telepon" required>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row g-3 align-items-center mt-2">
                                            <div class="col-auto">
                                                <form action="{{ route('guru.index') }}" method="GET">
                                                    <input type="search" name="search" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" placeholder="Cari disini">
                                                </form>
                                            </div>
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                        <br>

                                        <table id="guruTable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>No Induk</th>
                                                    <th>Alamat</th>
                                                    <th>No Telepon</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($gurus as $guru)
                                                <tr id="guru-{{ $guru->id }}">
                                                    <td>{{ $loop->iteration + ($gurus->currentPage() - 1) * $gurus->perPage() }}</td>
                                                    <td>{{ $guru->nama }}</td>
                                                    <td>{{ $guru->no_induk }}</td>
                                                    <td>{{ $guru->alamat }}</td>
                                                    <td>{{ $guru->no_telepon }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-success editBtn" data-id="{{ $guru->id }}">Edit</button>
                                                        <button type="button" class="btn btn-sm btn-danger rounded ms-2 shadow-sm deleteBtn" data-id="{{ $guru->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="pagination-wrapper">
                                            {{ $gurus->links('pagination::bootstrap-4') }}
                                        </div>

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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
        function updateTableNumbers() {
            $('#guruTable tbody tr').each(function(index) {
                $(this).find('td:first').text(index + 1);
            });
        }

        $(document).ready(function() {
            // Create Guru
            $('#createGuruForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST"
                    , url: "/guru"
                    , data: $(this).serialize()
                    , success: function(response) {
                        $('#createGuruModal').modal('hide');
                        $('#guruTable tbody').append(
                            `<tr id="guru-${response.id}">
                            <td></td>
                            <td>${response.nama}</td>
                            <td>${response.no_induk}</td>
                            <td>${response.alamat}</td>
                            <td>${response.no_telepon}</td>
                            <td>
                                <button class="btn btn-sm btn-success editBtn" data-id="${response.id}">Edit</button>
                                <button type="button" class="btn btn-sm btn-danger rounded ms-2 shadow-sm deleteBtn"
                                    data-id="${response.id}">Delete</button>
                            </td>
                        </tr>`
                        );
                        updateTableNumbers();
                        Swal.fire({
                            icon: 'success'
                            , title: 'Success'
                            , text: 'Data berhasil ditambahkan!'
                        });
                    }
                    , error: function(error) {
                        console.log(error);
                        Swal.fire({
                            icon: 'error'
                            , title: 'Oops...'
                            , text: 'Terjadi kesalahan!'
                        });
                    }
                });
            });

            // Edit GUru
            $(document).on('click', '.editBtn', function() {
                let id = $(this).data('id');
                $.get(`/guru/${id}/edit`, function(data) {
                    $('#editGuruId').val(data.id);
                    $('#editnamaInput').val(data.nama);
                    $('#editnoIndukInput').val(data.no_induk);
                    $('#editalamatInput').val(data.alamat);
                    $('#editnoTeleponInput').val(data.no_telepon);
                    $('#editGuruModal').modal('show');
                });
            });

            $('#editGuruForm').on('submit', function(e) {
                e.preventDefault();
                let id = $('#editGuruId').val();
                $.ajax({
                    type: "PUT"
                    , url: "/guru/" + id
                    , data: $(this).serialize()
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , success: function(response) {
                        $('#editGuruModal').modal('hide');
                        $(`#guru-${response.id}`).html(
                            `<td></td>
                            <td>${response.nama}</td>
                            <td>${response.no_induk}</td>
                            <td>${response.alamat}</td>
                            <td>${response.no_telepon}</td>
                        <td>
                            <button class="btn btn-sm btn-success editBtn" data-id="${response.id}">Edit</button>
                            <button type="button" class="btn btn-sm btn-danger rounded ms-2 shadow-sm deleteBtn"
                                data-id="${response.id}">Delete</button>
                        </td>`
                        );
                        updateTableNumbers();
                        Swal.fire({
                            icon: 'success'
                            , title: 'Success'
                            , text: 'Data berhasil diupdate!'
                        });
                    }
                    , error: function(xhr) {
                        console.log(xhr);
                        Swal.fire({
                            icon: 'error'
                            , title: 'Oops...'
                            , text: 'Terjadi kesalahan!'
                        });
                    }
                });
            });

            // Delete Guru
            $(document).on('click', '.deleteBtn', function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?'
                    , text: "You won't be able to revert this!"
                    , icon: 'warning'
                    , showCancelButton: true
                    , confirmButtonColor: '#3085d6'
                    , cancelButtonColor: '#d33'
                    , confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE"
                            , url: `/guru/${id}`
                            , data: {
                                "_token": $('meta[name="csrf-token"]').attr('content')
                            }
                            , success: function(response) {
                                Swal.fire(
                                    'Deleted!'
                                    , 'Your data has been deleted.'
                                    , 'success'
                                ).then(() => {
                                    // Menghapus baris yang sesuai dari tabel
                                    $(`#guru-${id}`).remove();
                                    updateTableNumbers();
                                });
                            }
                            , error: function(xhr) {
                                console.log(xhr);
                                Swal.fire({
                                    icon: 'error'
                                    , title: 'Oops...'
                                    , text: 'Terjadi kesalahan!'
                                });
                            }
                        });
                    }
                });
            });
        });

    </script>
</body>

</html>
