<div class="ibox float-e-margins">
    <div class="table-container">
        <table id="ruangan-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Ruang</th>
                    <th>Nama Ruangan</th>
                    <th>Kapasitas</th>
                    <th>Terisi</th>
                    <th>Tersisa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {
        $('#ruangan-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('manajemen_aset.inventaris.getDataRuangSdm') !!}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'kode_ruang',
                    name: 'kode_ruang'
                },
                {
                    data: 'nama_ruangan',
                    name: 'nama_ruangan'
                },
                {
                    data: 'kapasitas',
                    name: 'kapasitas'
                },
                {
                    data: 'jumlah_orang_terisi',
                    name: 'jumlah_orang_terisi'
                },
                {
                    data: 'tersisa',
                    name: 'tersisa'
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    orderable: false,
                    searchable: false
                }
            ]
        });

    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
