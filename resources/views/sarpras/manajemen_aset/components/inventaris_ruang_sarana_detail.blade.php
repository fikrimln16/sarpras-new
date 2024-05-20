@extends('layout')

@section('content')
    {{-- <h1>{{ $id }}</h1> --}}
    <div class="container mt-5">
        <div>
            <a href="{{ route('manajemen.aset.inventaris.index_ruang_sarana') }}" class="btn btn-secondary mb-3">
                Kembali
            </a>
        </div>
        <h2>Detail Inventaris Ruangan</h2>
        <div class="card">
            <div class="card-header">
                <strong>Informasi Ruangan</strong>
            </div>
            <div class="card-body">
                <p><strong>Kode Ruang:</strong> {{ $ruangan->kode_ruang }}</p>
                <p><strong>Nama Ruangan:</strong> {{ $ruangan->nama_ruangan }}</p>
                {{-- <p><strong>Kapasitas:</strong> {{ $ruangan->kapasitas }}</p> --}}
                {{-- <p><strong>Terisi:</strong> {{ $penempatan_sdm_ruang->count() }}</p> --}}
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>SDM di Ruangan Ini</strong>
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahSDMModal">
                 Tambah SDM
             </button> --}}
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered">
                    <thead>
                        <tr>
                            {{-- <th>ID Penempatan Sarana</th> --}}
                            <th>Kode Sarana</th>
                            <th>Nama Sarana</th>
                            {{-- <th>Kategori</th> --}}
                            <th>Penggunaan</th>
                            <th>Status</th>
                            <th>Kondisi</th>
                            @if (auth()->user()->role != '1')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penempatan_sarana as $item)
                            <tr>
                                {{-- <td>{{ $item->id }}</td> --}}
                                <td>{{ $item->kode_unik }}</td>
                                <td>{{ $item->nama_sarana }}</td>
                                {{-- <td>{{ $item->sarana->kategori }}</td> --}}
                                <td>{{ $item->penggunaan ?: 'belum diisi' }}</td>
                                <td>{{ $item->status ?: 'belum diisi' }}</td>
                                <td>{{ $item->kondisi ?: 'belum diisi' }}</td>
                                @if (auth()->user()->role != '1')
                                    <td>
                                        @if (auth()->user()->role == '2')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" data-id="{{ $item->id }}"
                                                data-id-ruang="{{ $item->id_ruang }}">
                                                Delete
                                            </button>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editModal" data-id="{{ $item->id_alat }}"
                                                data-kode-unik="{{ $item->kode_unik }}"
                                                data-nama-sarana="{{ $item->nama_sarana }}"
                                                data-penggunaan="{{ $item->penggunaan }}"
                                                data-kondisi="{{ $item->kondisi }}" data-status="{{ $item->status }}">
                                                Edit
                                            </button>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this item?</p>
                        <div id="prasaranaDetails"></div>
                    </div>
                    <!-- Modal Footer within a Bootstrap Modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form id="deleteForm" action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        @include('sarpras.manajemen_aset.components.form_edit_sarana')

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

        <!-- DataTables JS -->
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        </head>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const deleteModal = document.getElementById('deleteModal');
                deleteModal.addEventListener('show.bs.modal', function(event) {
                    let button = event.relatedTarget;
                    let id = button.getAttribute('data-id');
                    let id_ruang = button.getAttribute('data-id-ruang');
                    let deleteForm = deleteModal.querySelector('#deleteForm');
                    // console.log(id);
                    deleteForm.action = `{{ url('manajemen_aset/sarana/delete') }}/${id_ruang}/${id}`;
                });
            });
        </script>
    @endsection
