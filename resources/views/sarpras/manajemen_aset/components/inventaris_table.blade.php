@extends('sarpras.manajemen_aset.index_inventaris')

@section('inventaris_table')
    <div class="ibox float-e-margins">
        <div class="dropdown-container mb-2">
            <label for="building-select">Pilih Bangunan:</label>
            <select id="building-select" class="form-control">
                <option value="">Semua Bangunan</option>
                @foreach ($list_ruangan as $item)
                    <option value="{{ $item->id_bangunan }}">{{ $item->nama_prasarana }}</option>
                @endforeach
            </select>
        </div>
        <div class="table-container">
            <table id="ruangan-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Ruang</th>
                        <th>Nama Ruangan</th>
                        <th>Kapasitas</th>
                        <th>Terisi</th>
                        {{-- <th>Tersisa</th> --}}
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
            overflow-y: auto;
            width: 100%;
        }

        .tabel-prasarana {
            height: 100%;
            width: 100%;
            border-collapse: collapse;
        }

        .tabel-prasarana th,
        .tabel-prasarana td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .tabel-prasarana th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .dropdown-container {
            margin-bottom: 15px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            var table = $('#ruangan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route('manajemen_aset.inventaris.getDataRuangSdm') !!}',
                    data: function(d) {
                        d.building_id = $('#building-select').val();
                    }
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'kode_ruang', name: 'kode_ruang' },
                    { data: 'nama_ruangan', name: 'nama_ruangan' },
                    { data: 'kapasitas', name: 'kapasitas' },
                    { data: 'jumlah_orang_terisi', name: 'jumlah_orang_terisi' },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#building-select').change(function() {
                table.ajax.reload();
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection
