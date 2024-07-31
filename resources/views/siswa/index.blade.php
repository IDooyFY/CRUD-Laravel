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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
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
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block"><i class="bi bi-person-vcard"></i> Menu siswa</span>
            </a>
        </div>
    </header>

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
            </li>
            <li class="nav-item">
                <a class="nav-link" href="siswa">
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
    </aside>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Siswa</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Siswa</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="row">
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
                    </div>

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
                    </div>

                    <section class="section">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Data Siswa | <span>{{ $siswa->count() ?? '' }}
                                                Siswa</span></h5>
                                        <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"><i class="bi bi-person-vcard"></i> Tambah
                                            Siswa</button>

                                        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Murid</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="siswaForm" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="mb-3">
                                                                    <label for="exampleInputNis">NIS:</label>
                                                                    <input type="number" class="form-control" name="nis"
                                                                        id="nis" placeholder="NIS kamu">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputNama">Nama:</label>
                                                                    <input type="text" class="form-control" name="nama"
                                                                        id="nama" placeholder="Nama kamu">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputNama">No Telepon:</label>
                                                                    <input type="number" class="form-control"
                                                                        name="no_telepon" id="no_telepon"
                                                                        placeholder="No Telepon kamu">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputKelas"
                                                                        class="form-label">Pilih kelas:</label>
                                                                    <select class="form-select" id="kelas_id"
                                                                        name="kelas_id"
                                                                        aria-label="Default select example">
                                                                        <option selected>Pilih kelas</option>
                                                                        @foreach ($kelas as $kls)
                                                                        <option value="{{ $kls->id }}">{{ $kls->kelas }}
                                                                            {{ $kls->jurusan }}</option>
                                                                        @endforeach
                                                                    </select>
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

                                        <!-- Modal Edit -->
<div class="modal fade bd-example-modal-lg" id="exampleModalEdit" tabindex="-1"
aria-labelledby="exampleModalEditLabel" aria-hidden="true">
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalEditLabel">Edit Murid</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formEdit" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3">
                        <label for="editNis">NIS:</label>
                        <input type="number" class="form-control" name="nis" id="editNis" placeholder="NIS kamu">
                    </div>
                    <div class="mb-3">
                        <label for="editNama">Nama:</label>
                        <input type="text" class="form-control" name="nama" id="editNama" placeholder="Nama kamu">
                    </div>
                    <div class="mb-3">
                        <label for="editNoTelepon">No Telepon:</label>
                        <input type="number" class="form-control" name="no_telepon" id="editNoTelepon"
                            placeholder="No Telepon kamu">
                    </div>
                    <div class="mb-3">
                        <label for="editKelas" class="form-label">Pilih kelas:</label>
                        <select class="form-select" id="editKelas" name="kelas_id" aria-label="Default select example">
                            <option selected>Pilih kelas</option>
                            @foreach ($kelas as $kls)
                            <option value="{{ $kls->id }}">{{ $kls->kelas }} {{ $kls->jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
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
                                                <form action="{{ route('siswa.index') }}" method="GET">
                                                    <input type="search" name="search" id="searchInput"
                                                        class="form-control mx-sm-3" placeholder="Search">
                                                </form>
                                            </div>
                                        </div>

                                        <table class="table table-hover mt-3 border text-center"
                                            style="font-family: 'Nunito', sans-serif;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama</th>
                                                    <th>Kelas</th>
                                                    <th>No Telepon</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="siswaTable">
                                                @php
                                                $no = 1;
                                                @endphp
                                                @foreach ($siswa as $row)
                                                <tr id="siswa-{{ $row->id }}">
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $row->nis }}</td>
                                                    <td>{{ $row->nama }}</td>
                                                    <td>{{ $row->kelas->kelas }} {{ $row->kelas->jurusan }}</td>
                                                    <td>{{ $row->no_telepon }}</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-sm btn-success rounded ms-2 shadow-sm editBtn"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModalEdit"
                                                            data-id="{{ $row->id }}" data-nis="{{ $row->nis }}"
                                                            data-nama="{{ $row->nama }}"
                                                            data-no_telepon="{{ $row->no_telepon }}"
                                                            data-kelas_id="{{ $row->kelas->id }}">
                                                            Edit
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-sm btn-danger rounded ms-2 shadow-sm deleteBtn"
                                                            data-id="{{ $row->id }}">
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
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

    <script>
        $(document).ready(function() {
    // CSRF Token setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function updateRowNumbers() {
        $('#siswaTable tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    // Add Siswa
    $('#siswaForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        console.log("Form Data: ", formData); // Log form data

        $.ajax({
            url: "{{ route('siswa.store') }}",
            method: "POST",
            data: formData,
            success: function(response) {
                console.log("Server Response: ", response); // Log server response

                if (response && response.id) {
                    $('#exampleModal').modal('hide');
                    $('#siswaForm')[0].reset();
                    $('#siswaTable').append('<tr id="siswa-' + response.id + '"><td></td><td>' + response.nis + '</td><td>' + response.nama + '</td><td>' + response.kelas + ' ' + response.jurusan + '</td><td>' + response.no_telepon + '</td><td><button class="btn btn-sm btn-success rounded ms-2 shadow-sm editBtn" data-id="' + response.id + '" data-nis="' + response.nis + '" data-nama="' + response.nama + '" data-kelas_id="' + response.kelas_id + '" data-no_telepon="' + response.no_telepon + '">Edit</button><button class="btn btn-sm btn-danger rounded ms-2 shadow-sm deleteBtn" data-id="' + response.id + '">Delete</button></td></tr>');
                    updateRowNumbers();
                } else {
                    alert('Failed to add the record. Please try again.');
                }
            },
            error: function(xhr) {
                console.error("Error Response: ", xhr); // Log error response
                alert('Failed to add the record. Please try again.');
            }
        });
    });

    // Edit Siswa
    $(document).on('click', '.editBtn', function() {
        var id = $(this).data('id');
        var nis = $(this).data('nis');
        var nama = $(this).data('nama');
        var kelas_id = $(this).data('kelas_id');
        var no_telepon = $(this).data('no_telepon');
        $('#editNis').val(nis);
        $('#editNama').val(nama);
        $('#editNoTelepon').val(no_telepon);
        $('#editKelas').val(kelas_id);
        $('#exampleModalEdit').modal('show');
        $('#formEdit').off('submit').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            console.log("Edit Form Data: ", formData); // Log form data

            $.ajax({
                url: "{{ url('siswa') }}/" + id,
                method: "PUT",
                data: formData,
                success: function(response) {
                    console.log("Edit Server Response: ", response); // Log server response

                    if (response && response.id) {
                        $('#exampleModalEdit').modal('hide');
                        $('#siswa-' + id).replaceWith('<tr id="siswa-' + response.id + '"><td></td><td>' + response.nis + '</td><td>' + response.nama + '</td><td>' + response.kelas + ' ' + response.jurusan + '</td><td>' + response.no_telepon + '</td><td><button class="btn btn-sm btn-success rounded ms-2 shadow-sm editBtn" data-id="' + response.id + '" data-nis="' + response.nis + '" data-nama="' + response.nama + '" data-kelas_id="' + response.kelas_id + '" data-no_telepon="' + response.no_telepon + '">Edit</button><button class="btn btn-sm btn-danger rounded ms-2 shadow-sm deleteBtn" data-id="' + response.id + '">Delete</button></td></tr>');
                        updateRowNumbers();
                    } else {
                        alert('Failed to update the record. Please try again.');
                    }
                },
                error: function(xhr) {
                    console.error("Edit Error Response: ", xhr); // Log error response
                    alert('Failed to update the record. Please try again.');
                }
            });
        });
    });

    // Delete Siswa
    $(document).on('click', '.deleteBtn', function() {
        var id = $(this).data('id');
        if (confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                url: "{{ url('siswa') }}/" + id,
                method: "DELETE",
                success: function(response) {
                    console.log("Delete Server Response: ", response); // Log server response

                    $('#siswa-' + id).remove();
                    updateRowNumbers();
                },
                error: function(xhr) {
                    console.error("Delete Error Response: ", xhr); // Log error response
                    alert('Failed to delete the record. Please try again.');
                }
            });
        }
    });

    // Initial update for row numbers
    updateRowNumbers();
});
    </script>


</body>

</html>
