<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: comic sans ms;
        }

        .sidebar {
            height: 100vh;
            position: sticky;
            top: 0;
        }
    </style>
    <title>Sidebar</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-auto d-flex flex-column flex-shrink-0 p-3 bg-light sidebar border border-3"
                style="width: 280px;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-4"><b>Menu Utama</b></span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ route('kelas.index') }}" class="nav-link link-dark border border-dark rounded-4"
                            style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2); padding-left: 70px">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#home"></use>
                            </svg>
                            Kelas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('siswa.index') }}" class="nav-link link-success border border-2 border-success mt-3 rounded-4"
                            style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2); padding-left: 70px">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            Murid
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link link-dark border border-dark mt-3 rounded-4 "
                            style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2); padding-left: 40px">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            Mata Pelajaran
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main content -->
            <div class="col ms-sm-auto">
                <nav class="navbar bg-body-tertiary border border-2 rounded-1">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h1">Murid</span>
                        <a href="#" class="d-flex btn btn-danger"
                            style="box-shadow: 0 2px 4px 0 rgba(255, 0, 0, 0.2);">logout</a>
                    </div>
                </nav>
                <div class="content p-3">
                    <div class="card">
                        <span class="card-header d-flex">
                            Daftar Murid
                            <button type="button" class="btn btn-outline-dark ms-auto" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);">Tambah Murid</button>

                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Murid</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="create" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <!-- Kolom pertama -->
                                                    <div class="mb-3">
                                                        <label for="exampleInputNis">NIS:</label>
                                                        <input type="number" class="form-control" name="nis" placeholder="NIS kamu">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputNama">Nama:</label>
                                                        <input type="text" class="form-control" name="nama" placeholder="Nama kamu">
                                                    </div>
                                                    <!-- Kolom kedua -->
                                                    <div class="mb-3">
                                                        <label for="exampleInputKelas" class="form-label">Pilih kelas:</label>
                                                        <select class="form-select" id="exampleInputKelas" name="kelas" aria-label="Default select example">
                                                            <option selected>Pilih kelas</option>
                                                            <option value="Kelas 10">Kelas 10</option>
                                                            <option value="Kelas 11">Kelas 11</option>
                                                            <option value="Kelas 12">Kelas 12</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputJurusan">Jurusan:</label>
                                                        <input type="text" class="form-control" name="jurusan" placeholder="Masukkan jurusan">
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

                            {{-- End Modal --}}
                        </span>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                Jumlah Murid : {{ $siswa->count() ?? '' }}
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-dark" type="submit">Search</button>
                                </form>
                            </div>
                            @if($errors->any())
                            <div class="alert alert-danger mt-2">
                                    @foreach($errors->all() as $error)
                                    {{ $error }}
                                    @endforeach
                            </div>
                            @endif

                            @if(session('success'))
                            <div class="alert alert-success mt-2">
                                {{ session('success') }}
                            </div>
                            @endif
                            <table class="table table-striped mt-5 border border-black text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($siswa as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->nis }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->kelas }}</td>
                                        <td>{{ $row->jurusan }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-success rounded shadow-sm">Lihat
                                                Data</button>
                                            <a href="edit/{{ $row->id }}" type="button"
                                                class="btn btn-sm btn-warning rounded ms-2 shadow-sm">Edit
                                                Data</a>
                                            <button type="button"
                                                class="btn btn-sm btn-danger rounded ms-2 shadow-sm">Hapus
                                                data</button>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            <!-- Modal Edit -->
                            <div class="modal fade bd-example-modal-lg" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Murid</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="create" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <!-- Kolom pertama -->
                                                    <div class="mb-3">
                                                        <label for="exampleInputNis">NIS:</label>
                                                        <input type="number" class="form-control" name="nis" placeholder="NIS kamu">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputNama">Nama:</label>
                                                        <input type="text" class="form-control" name="nama" placeholder="Nama kamu">
                                                    </div>
                                                    <!-- Kolom kedua -->
                                                    <div class="mb-3">
                                                        <label for="exampleInputKelas" class="form-label">Pilih kelas:</label>
                                                        <select class="form-select" id="exampleInputKelas" name="kelas" aria-label="Default select example">
                                                            <option selected>Pilih kelas</option>
                                                            <option value="Kelas 10">Kelas 10</option>
                                                            <option value="Kelas 11">Kelas 11</option>
                                                            <option value="Kelas 12">Kelas 12</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputJurusan">Jurusan:</label>
                                                        <input type="text" class="form-control" name="jurusan" placeholder="Masukkan jurusan">
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

                            {{-- End Modal --}}
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
