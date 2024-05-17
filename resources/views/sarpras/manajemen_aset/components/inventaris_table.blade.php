<div class="ibox float-e-margins">
    <div class="ibox-title">
        <div class="fright">
            <!-- <button id="tambahBtn" class='btn btn-sm btn-primary noborder-radius' data-toggle="tooltip" data-placement="top">
                <i class='fa fa-plus'></i> <b>Tambah Data</b>
            </button> -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="kocak" data-target="kocak">
                Tambah
            </button> -->
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
                    <th>kode_penempatan</th>
                    <th>Nama Dosen</th>
                    <th>Ruangan</th>
                    <th>Prasarana</th>
                    <th>tanggal_mulai_penempatan</th>
                    <th>tanggal_selesai_penempatan</th>
                    {{-- <th>status</th>
           <th>deskripsi</th> --}}
                    {{-- <th>detail</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->Nama_SDM }}</td>
                    <td>{{ $item->nama_ruangan }}</td>
                    <td>{{ $item->nama_prasarana }}</td>
                    <td>{{ $item->tanggal_mulai_penempatan }}</td>
                    <td>{{ $item->tanggal_selesai_penempatan }}</td>
                    {{-- <td>{{ $item['status'] }}</td>
                    <td>{{ $item['deskripsi'] }}</td> --}}
                    {{-- <td>{{ $item['detail'] }}</td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('sarpras.manajemen_aset.components.form_pemetaan_dosen')


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
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">