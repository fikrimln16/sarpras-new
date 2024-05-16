@extends('layout')

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <div class="fright">
            <!-- <button id="tambahBtn" class='btn btn-sm btn-primary noborder-radius' data-toggle="tooltip" data-placement="top">
                <i class='fa fa-plus'></i> <b>Tambah Data</b>
            </button> -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="kocak" data-target="kocak">
                Tambah
            </button> -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah
            </button>

        </div>
    </div>
    {{-- <table id="dataTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>id_sarana</th>
                <th>Nama Sarana</th>
                <th>jenis_sarana</th>
                <th>tanggal_perolehan</th>
                <th>nilai_perolehan</th>
                <th>kondisi</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item['id_sarana'] }}</td>
    <td>{{ $item['Nama Sarana'] }}</td>
    <td>{{ $item['jenis_sarana'] }}</td>
    <td>{{ $item['tanggal_perolehan'] }}</td>
    <td>{{ $item['nilai_perolehan'] }}</td>
    <td>{{ $item['kondisi'] }}</td>
    <td>{{ $item['status'] }}</td>
    </tr>
    @endforeach
    </tbody>
    </table> --}}

    <div class="table-container">
        <table id="dataTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Prasarana</th>
                    <th>Nama Ruangan</th>
                    <th>Nama Sarana</th>
                    <th>Spesifikasi</th>
                    <th>Tanggal Perolehan</th>
                    <th>Nilai Peroleham</th>
                    {{-- <th>Detail Ruangan</th> --}}
                    {{-- <th>Detail Sarana</th> --}}
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penempatanSarana as $penempatan)
                <tr>
                    <td>{{ $penempatan->id }}</td>
                    {{-- <td>{{ $penempatan->ruangan->nama_ruangan }}</td> --}}
                    <td>{{ $penempatan->nama_prasarana }}</td>
                    <td>{{ $penempatan->nama_ruangan }}</td>
                    <td>{{ $penempatan->nama_sarana }}</td>
                    <td>{{ $penempatan->spesifikasi }}</td>
                    <td>{{ $penempatan->tanggal_perolehan }}</td>
                    <td>{{ $penempatan->nilai_perolehan }}</td>
                    {{-- <td>{{ $penempatan->ruangan->detail }}</td> tambahkan untuk kolom lainnya --}}
                    {{-- <td>{{ $penempatan->sarana->detail }}</td> --}}
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $penempatan->id }}">
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
</div>
@include('sarpras.manajemen_aset.components.form_create_sarana')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            let button = event.relatedTarget;
            let id = button.getAttribute('data-id');
            let deleteForm = deleteModal.querySelector('#deleteForm');
            // console.log(id);
            deleteForm.action = `/manajemen_aset/sarana/delete/${id}`;
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();

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