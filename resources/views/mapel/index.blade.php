<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Menu Mapel</title>
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
                <span class="d-none d-lg-block"><i class="bi bi-journal-text"></i> Menu mapel</span>
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
                                    <h5 class="card-title">Data Mapel | <span>{{ $mapel->count() ?? '' }}
                                            Mapel</span></h5>
                                    <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#createMapelModal"><i class="bi bi-house-add"></i> Tambah
                                        Mapel</button>

                                    <!-- Modal for Creating Mapel -->
                                    <div class="modal fade bd-example-modal-lg" id="createMapelModal" tabindex="-1" aria-labelledby="createMapelModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="createMapelModalLabel">Tambah Mapel
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="createMapelForm" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="mb-3">
                                                                <label for="mapelInput">Mata Pelajaran:</label>
                                                                <input type="text" class="form-control" name="mapel" id="mapelInput" placeholder="Mapel" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="keteranganInput">Keterangan:</label>
                                                                <input type="text" class="form-control" name="keterangan" id="keteranganInput" placeholder="Keterangan" required>
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
                                    <div class="modal fade" id="editMapelModal" tabindex="-1" aria-labelledby="editMapelModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form id="editMapelForm" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" id="editMapelId" name="id">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editMapelModalLabel">Edit Mapel
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="editMapelInput" class="form-label">Mapel:</label>
                                                            <input type="text" class="form-control" id="editMapelInput" name="mapel">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="editKeteranganInput" class="form-label">Keterangan:</label>
                                                            <input type="text" class="form-control" id="editKeteranganInput" name="keterangan">
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
                                            <form action="{{ route('mapel.index') }}" method="GET">
                                                <input type="search" name="search" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" placeholder="Cari disini">
                                            </form>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                    <br>

                                    <table id="mapelTable" class="table table-hover mt-3 border text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Mapel</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mapel as $row)
                                            <tr id="mapel-{{ $row->id }}">
                                                <td>{{ $loop->iteration + ($mapel->currentPage() - 1) * $mapel->perPage() }}</td>
                                                <td>{{ $row->mapel }}</td>
                                                <td>{{ $row->keterangan }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-success editBtn" data-id="{{ $row->id }}">Edit</button>
                                                    <button type="button" class="btn btn-sm btn-danger rounded ms-2 shadow-sm deleteBtn" data-id="{{ $row->id }}">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="pagination-wrapper">
                                        {{ $mapel->links('pagination::bootstrap-4') }}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </main>

    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>SMKN6 Balikpapan</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="#">Ridhoo</a>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            var editMapelButtons = document.querySelectorAll('.btn-edit-mapel');
            var modalEditMapel = document.getElementById('modalEditMapel');
            var formEditMapel = document.getElementById('formEditMapel');

            editMapelButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var id = this.getAttribute('data-id');
                    var mapel = this.getAttribute('data-mapel');
                    var keterangan = this.getAttribute('data-keterangan');

                    formEditMapel.action = `/mapel/${id}`;
                    modalEditMapel.querySelector('#editMapel').value = mapel;
                    modalEditMapel.querySelector('#editKeterangan').value = keterangan;
                });
            });
        });
    </script> --}}

    <script>
        function updateTableNumbers() {
            $('#mapelTable tbody tr').each(function(index) {
                $(this).find('td:first').text(index + 1);
            });
        }

        $(document).ready(function() {
            // Create Mapel
            $('#createMapelForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST"
                    , url: "/mapel"
                    , data: $(this).serialize()
                    , success: function(response) {
                        $('#createMapelModal').modal('hide');
                        $('#mapelTable tbody').append(
                            `<tr id="mapel-${response.id}">
                                <td></td>
                                <td>${response.mapel}</td>
                                <td>${response.keterangan}</td>
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

            // Edit Mapel
            $(document).on('click', '.editBtn', function() {
                let id = $(this).data('id');
                $.get(`/mapel/${id}/edit`, function(data) {
                    $('#editMapelId').val(data.id);
                    $('#editMapelInput').val(data.mapel);
                    $('#editKeteranganInput').val(data.keterangan);
                    $('#editMapelModal').modal('show');
                });
            });

            $('#editMapelForm').on('submit', function(e) {
                e.preventDefault();
                let id = $('#editMapelId').val();
                $.ajax({
                    type: "PUT"
                    , url: "/mapel/" + id
                    , data: $(this).serialize()
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , success: function(response) {
                        $('#editMapelModal').modal('hide');
                        $(`#mapel-${response.id}`).html(
                            `<td></td>
                            <td>${response.mapel}</td>
                            <td>${response.keterangan}</td>
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

            // Delete Mapel
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
                            , url: "/mapel/" + id
                            , data: {
                                "_token": $('meta[name="csrf-token"]').attr('content')
                            , }
                            , success: function(response) {
                                Swal.fire(
                                    'Deleted!'
                                    , 'Your data has been deleted.'
                                    , 'success'
                                ).then(() => {
                                    $(`#mapel-${id}`).remove();
                                    updateTableNumbers();
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
                    }
                });
            });
        });

    </script>
</body>

</html>
