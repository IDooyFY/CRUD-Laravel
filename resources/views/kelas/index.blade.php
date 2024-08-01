<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Menu Siswa</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block"><i class="bi bi-house"></i> Menu kelas</span>
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
                <a class="nav-link " href="kelas">
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
                <a class="nav-link collapsed" href="guru">
                    <i class="bi bi-person-raised-hand"></i><span>Guru</span>
                </a>
            </li>
        </ul>
    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Mata Pelajaran</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Mata Pelajaran</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

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
                                        <h5 class="card-title">Data Kelas | <span>{{ $kelas->count() ?? '' }}
                                                Kelas</span></h5>
                                        <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#createKelasModal"><i class="bi bi-house-add"></i> Tambah
                                            Kelas</button>

                                        <!-- Modal for Creating Kelas -->
                                        <div class="modal fade bd-example-modal-lg" id="createKelasModal" tabindex="-1" aria-labelledby="createKelasModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="createKelasModalLabel">Tambah Kelas
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="createKelasForm" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="mb-3">
                                                                    <label for="kelasSelect">Kelas:</label>
                                                                    <select class="form-select" id="kelasSelect" name="kelas" required>
                                                                        <option selected>Pilih kelas</option>
                                                                        <option value="Kelas 10">Kelas 10</option>
                                                                        <option value="Kelas 11">Kelas 11</option>
                                                                        <option value="Kelas 12">Kelas 12</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="jurusanInput">Jurusan:</label>
                                                                    <input type="text" class="form-control" name="jurusan" id="jurusanInput" placeholder="Jurusan" required>
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
                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editKelasModal" tabindex="-1" aria-labelledby="editKelasModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form id="editKelasForm" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <input type="hidden" id="editKelasId" name="id">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editKelasModalLabel">Edit Kelas
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="editKelasSelect" class="form-label">Kelas</label>
                                                                <select id="editKelasSelect" class="form-select" name="kelas">
                                                                    <option value="Kelas 10">Kelas 10</option>
                                                                    <option value="Kelas 11">Kelas 11</option>
                                                                    <option value="Kelas 12">Kelas 12</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="editJurusanInput" class="form-label">Jurusan</label>
                                                                <input type="text" class="form-control" id="editJurusanInput" name="jurusan">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-3 align-items-center mt-2">
                                            <div class="col-auto">
                                                <form action="{{ route('kelas.index') }}" method="GET">
                                                    <input type="search" name="search" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" placeholder="Cari disini">
                                                </form>
                                            </div>
                                            <div class="col-auto">
                                            </div>
                                        </div>
                                        <br>

                                        <table id="kelasTable" class="table table-hover mt-3 border text-center">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kelas</th>
                                                    <th>Jurusan</th>
                                                    <th>Jumlah siswa</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $no = ($kelas->currentPage() - 1) * $kelas->perPage() + 1;
                                                @endphp
                                                @foreach ($kelas as $row)
                                                <tr id="kelas-{{ $row->id }}">
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $row->kelas }}</td>
                                                    <td>{{ $row->jurusan }}</td>
                                                    <td>{{ $row->siswa->count() }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-success editBtn" data-id="{{ $row->id }}">Edit</button>
                                                        <button type="button" class="btn btn-sm btn-danger rounded ms-2 shadow-sm deleteBtn" data-id="{{ $row->id }}">Delete</button>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>


                                        {{ $kelas->links() }}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Table -->
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        function updateTableNumbers() {
            $('#kelasTable tbody tr').each(function(index) {
                $(this).find('td:first').text(index + 1);
            });
        }

        $(document).ready(function() {
            // Create Kelas
            $('#createKelasForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/kelas",
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#createKelasModal').modal('hide');
                        $('#kelasTable tbody').append(
                            `<tr id="kelas-${response.id}">
                                <td></td>
                                <td>${response.kelas}</td>
                                <td>${response.jurusan}</td>
                                <td>${response.siswa_count}</td>
                                <td>
                                    <button class="btn btn-sm btn-success editBtn" data-id="${response.id}">Edit</button>
                                    <button type="button" class="btn btn-sm btn-danger rounded ms-2 shadow-sm deleteBtn"
                                        data-id="${response.id}">Delete</button>
                                </td>
                            </tr>`
                        );
                        updateTableNumbers();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Data berhasil ditambahkan!'
                        });
                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan!'
                        });
                    }
                });
            });

            // Edit Kelas
            $(document).on('click', '.editBtn', function() {
                let id = $(this).data('id');
                $.get(`/kelas/${id}/edit`, function(data) {
                    $('#editKelasId').val(data.id);
                    $('#editKelasSelect').val(data.kelas);
                    $('#editJurusanInput').val(data.jurusan);
                    $('#editKelasModal').modal('show');
                });
            });

            $('#editKelasForm').on('submit', function(e) {
                e.preventDefault();
                let id = $('#editKelasId').val();
                $.ajax({
                    type: "PUT",
                    url: "/kelas/" + id,
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#editKelasModal').modal('hide');
                        $(`#kelas-${response.id}`).html(
                            `<td></td>
                            <td>${response.kelas}</td>
                            <td>${response.jurusan}</td>
                            <td>${response.siswa_count}</td>
                            <td>
                                <button class="btn btn-sm btn-success editBtn" data-id="${response.id}">Edit</button>
                                <button type="button" class="btn btn-sm btn-danger rounded ms-2 shadow-sm deleteBtn"
                                    data-id="${response.id}">Delete</button>
                            </td>`
                        );
                        updateTableNumbers();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Data berhasil diupdate!'
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan!'
                        });
                    }
                });
            });

            // Delete Kelas
            $(document).on('click', '.deleteBtn', function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "/kelas/" + id,
                            data: {
                                "_token": $('meta[name="csrf-token"]').attr('content'),
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your data has been deleted.',
                                    'success'
                                ).then(() => {
                                    $(`#kelas-${id}`).remove();
                                    updateTableNumbers();
                                });
                            },
                            error: function(error) {
                                console.log(error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Terjadi kesalahan!'
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
