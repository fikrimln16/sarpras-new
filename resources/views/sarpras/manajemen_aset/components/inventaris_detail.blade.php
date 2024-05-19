@extends('layout')

@section('content')
    <div class="container mt-5">
        <div>
            <a href="{{ route('manajemen_aset.inventaris') }}" class="btn btn-secondary mb-3">
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
                <p><strong>Kapasitas:</strong> {{ $ruangan->kapasitas }}</p>
                <p><strong>Terisi:</strong> {{ $penempatan_sdm_ruang->count() }}</p>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahSDMModal"
                    {{ $penempatan_sdm_ruang->count() >= $ruangan->kapasitas ? 'disabled' : '' }}>
                    Tambah SDM
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID SDM</th>
                            <th>Nama SDM</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penempatan_sdm_ruang as $item)
                            <tr>
                                <td>{{ $item->sumber_daya_manusia->id }}</td>
                                <td>{{ $item->sumber_daya_manusia->Nama_SDM }}</td>
                                <td>{{ $item->sumber_daya_manusia->jenis_kelamin }}</td>
                                <td>{{ $item->sumber_daya_manusia->tempat_lahir }}</td>
                                <td>
                                    @if (auth()->user()->role == '2')
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-id="{{ $item->id }}"
                                            data-id-ruang="{{ $item->id_ruang }}">
                                            Delete
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Delete-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this item?</p>
                    <div id="prasaranaDetails"></div> <!-- Details will be loaded here -->
                </div>
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

    <!-- Modal Tambah SDM -->
    <div class="modal fade" id="tambahSDMModal" tabindex="-1" role="dialog" aria-labelledby="tambahSDMModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahSDMModalLabel">Tambah SDM ke Ruangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <div class="form-group">
                        <label for="search_dosen">Cari Dosen</label>
                        <input type="text" class="form-control" id="search_dosen" placeholder="Cari dosen...">
                    </div> --}}
                    <div class="form-group">
                        <label for="sdm_table">Daftar Dosen</label>
                        <table class="table table-bordered" id="sdm_table">
                            <thead>
                                <tr>
                                    <th>Pilih</th>
                                    <th>ID SDM</th>
                                    <th>Nama SDM</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sdm_list as $sdm)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="checkbox-dosen" value="{{ $sdm->id }}"
                                                data-nama="{{ $sdm->Nama_SDM }}">
                                        </td>
                                        <td>{{ $sdm->id }}</td>
                                        <td>{{ $sdm->Nama_SDM }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <form id="tambahSDMForm" action="{{ route('manajemen_aset.inventaris.tambah_pemetaan_dosen') }}"
                        method="POST">
                        @csrf
                        <input type="hidden" name="id_ruang" value="{{ $ruangan->id }}">
                        <div class="form-group">
                            <label for="sdm_terpilih">Dosen Terpilih</label>
                            <table class="table table-bordered" id="sdm_terpilih">
                                <thead>
                                    <tr>
                                        <th>ID SDM</th>
                                        <th>Nama SDM</th>
                                        <th>Tanggal Mulai Penempatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Dosen terpilih akan ditambahkan di sini -->
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <script>
        $(document).ready(function() {
            // Initialize DataTable with pageLength option set to 5
            $('#sdm_table').DataTable({
                "pageLength": 5,
                "searching": true
            });

            // Event handler for checkbox selection
            $('#sdm_table').on('change', '.checkbox-dosen', function() {
                var id = $(this).val();
                var nama = $(this).data('nama');

                if ($(this).is(':checked')) {
                    // Append selected dosen to the selected list with additional fields
                    $('#sdm_terpilih tbody').append(`
                      <tr data-id="${id}">
                          <td><input type="hidden" name="id_sdm[]" value="${id}">${id}</td>
                          <td>${nama}</td>
                          <td><input type="date" name="tanggal_mulai_penempatan[]" class="form-control"></td>
                          <td><button type="button" class="btn btn-danger btn-sm hapus-dosen">Hapus</button></td>
                      </tr>
                  `);
                } else {
                    // Remove dosen from the selected list
                    $('#sdm_terpilih tbody tr[data-id="' + id + '"]').remove();
                }
            });

            // Event handler for 'Hapus' button
            $('#sdm_terpilih').on('click', '.hapus-dosen', function() {
                var id = $(this).closest('tr').data('id');
                // Uncheck the checkbox in the main table
                $('#sdm_table .checkbox-dosen[value="' + id + '"]').prop('checked', false);
                // Remove dosen from the selected list
                $(this).closest('tr').remove();
            });

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

                deleteForm.action = `{{ url('manajemen_aset/inventaris/delete') }}/${id_ruang}/${id}`;
            });
        });
    </script>
@endsection
