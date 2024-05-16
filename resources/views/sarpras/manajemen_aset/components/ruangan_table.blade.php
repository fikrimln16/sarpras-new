@extends('sarpras.manajemen_aset.index_prasarana')

@section('prasarana_table')
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <div class="fright">
            @if (auth()->user()->role == '2')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah
            </button>
            @endif

        </div>
    </div>

    <div class="table-container">

        <table id="dataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kode Ruang</th>
                    <th>Nama Ruangan</th>
                    <th>Luas Ruang</th>
                    <th>Lantai</th>
                    <th>Kapasitas</th>
                    <th>Tahun Perolehan</th>
                    <th>Nama Bangunan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="ruanganTableBody">
                @foreach ($ruangan as $r)
                <tr>
                    <td>{{ $r->kode_ruang }}</td>
                    <td>{{ $r->nama_ruangan }}</td>
                    <td>{{ $r->luas_ruang }}</td>
                    <td>{{ $r->lantai }}</td>
                    <td>{{ $r->kapasitas }}</td>
                    <td>{{ $r->tahun_perolehan }}</td>
                    <td>{{ $r->prasarana->nama_prasarana }}</td>
                    {{-- <td>
                        <!-- Contoh tombol aksi -->
                        <button class="btn btn-info">Edit</button>
                        <button class="btn btn-danger">Hapus</button>
                    </td> --}}
                    <td>
                        <a href="{{ route('manajemen_aset.ruangan', ['id' => $r['id']]) }}" class="btn btn-primary">Details</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $r['id'] }}">
                            Delete
                        </button>
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
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
</div>

@include('sarpras.manajemen_aset.components.form_create_ruangan')


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            let button = event.relatedTarget;
            let id = button.getAttribute('data-id');
            let modalBody = deleteModal.querySelector('.modal-body #prasaranaDetails');
            let deleteForm = deleteModal.querySelector('#deleteForm');

            fetch(`/manajemen_aset/ruangan/${id}`) // API endpoint that returns prasarana details
                .then(response => response.json())
                .then(data => {
                    modalBody.innerHTML = `
                        <p>Kode Ruang: ${data.kode_ruang}</p>
                        <p>Nama Ruangan: ${data.nama_ruangan || 'N/A'}</p>
                        <p>Luas Ruangan: ${data.luas_ruang || 'N/A'}</p>
                        <p>Lantai: ${data.lantai || 'N/A'}</p>
                        <p>Kapasitas: ${data.kapasitas || 'N/A'}</p>
                        <p>Tahun Perolehan: ${data.tahun_perolehan}</p>
                        <p>Kelompok Ruangan: ${data.kelompok_ruangan}</p>
                        <p>Tanggal Mulai Kontrak: ${data.tgl_mulai_kontrak ? new Date(data.tgl_mulai_kontrak).toLocaleDateString() : 'N/A'}</p>
                        <p>Tanggal Selesai Kontrak: ${data.tgl_selesai_kontrak ? new Date(data.tgl_selesai_kontrak).toLocaleDateString() : 'N/A'}</p>
                    `;
                    deleteForm.action = `/manajemen_aset/ruangan/delete/${data.id}`;
                });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

<script>
    $(document).ready(function() {

        $('#dataTable').DataTable(); // Memastikan DataTables diaktifkan untuk tabel ini

        // Tampilkan modal saat tombol Tambah ditekan
        $("#tambahBtn").click(function() {
            $("#myModal").modal('show');
        });

        // Sembunyikan modal saat tombol Tutup di modal ditekan
        $(".modal").on("hidden.bs.modal", function() {
            $(this).find('form')[0].reset(); // Reset form saat modal tertutup
        });

        // Sembunyikan modal saat form di-submit
        $("#myForm").submit(function(e) {
            e.preventDefault(); // Hindari reload halaman
            $("#myModal").modal('hide');
        });
    });
</script>

<style>
    .ibox-title {
        font-size: 17px;
        font-weight: bold;
        padding-top: 10px;
        padding-bottom: 10px;
        letter-spacing: -1px;
        color: #2d2d2d;
    }

    .fright {
        float: right !important;
    }

    .truncate {
        max-width: 250px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        cursor: pointer;
    }

    .not-truncated {
        max-width: none;
        white-space: pre-line;
    }



    .table-container {
        max-height: 100vh;
        /* Set the max height for the table container */
        overflow-y: auto;
        /* Enable vertical scrolling */
        width: 100%;
        /* Ensure the table container uses full width of its parent */
    }

    .tabel-prasarana {
        height: 100%;
        width: 100%;
        /* Make the table take the full width of the container */
        border-collapse: collapse;
        /* Ensure borders are collapsed */
    }

    .tabel-prasarana th,
    .tabel-prasarana td {
        border: 1px solid #ddd;
        /* Add border to table cells */
        padding: 8px;
        /* Padding for table cells */
    }

    .tabel-prasarana th {
        background-color: #f2f2f2;
        /* Background color for table header */
        text-align: left;
        /* Align text to the left in table header */
    }
</style>

@endsection