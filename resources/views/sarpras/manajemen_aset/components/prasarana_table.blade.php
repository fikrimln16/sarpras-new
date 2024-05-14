@extends('sarpras.manajemen_aset.index_prasarana')

@section('prasarana_table')
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5><i class="fa fa-th-list"></i> Daftar Bangunan</h5>
        <div class="fright">
            <button id="tambahBtn" class='btn btn-sm btn-primary noborder-radius' data-toggle="tooltip" data-placement="top">
                <i class='fa fa-plus'></i> <b>Tambah Data</b>
            </button>

        </div>
    </div>
    <div class="table-container">
        <table id="dataTable" class="table table-bordered table-striped tabel-prasarana">
            <thead>
                <tr>
                    <th>Nama prasarana</th>
                    <!-- <th>Panjang</th> -->
                    <!-- <th>Lebar</th> -->
                    <th>Luas</th>
                    <th>Alamat</th>
                    <!-- <th>Lintang</th> -->
                    <!-- <th>Bujur</th> -->
                    <th>BMN satker</th>
                    <!-- <th>BMN kode barang</th> -->
                    <th>BMN nup</th>
                    {{-- <th>Tanggal perolehan</th> --}}
                    <th>Nilai perolehan</th>
                    <th>Nilai buku</th>
                    {{-- <th>MERK</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $item['nama_prasarana'] }}</td>
                    <!-- <td>{{ $item['panjang'] }}</td> -->
                    <!-- <td>{{ $item['lebar'] }}</td> -->
                    <td>{{ $item['luas_bangunan'] }}</td>
                    <td class="truncate" title="Click to expand">{{ $item['alamat'] }}</td>
                    <!-- <td>{{ $item['latitude'] }}</td> -->
                    <!-- <td>{{ $item['longitude'] }}</td> -->
                    <td>{{ $item['BMN_satker'] }}</td>
                    <!-- <td>{{ $item['BMN_kode_barang'] }}</td> -->
                    <td>{{ $item['BMN_nup'] }}</td>
                    {{-- <td>{{ $item['tanggal_perolehan']}}</td> --}}
                    <td>{{ number_format($item['nilai_perolehan'], 2) }}</td>
                    <td>{{ number_format($item['nilai_buku'], 2) }}</td>
                    {{-- <td>{{ $item['merk'] }}</td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- </div> -->
@include('sarpras.manajemen_aset.components.form_create_bangunan')


<style>
    .ibox-title {
        font-size: 17px;
        font-weight: bold;
        padding-top: 10px;
        padding-bottom: 10px;
        letter-spacing: -1px;
        color: #2d2d2d;
    }
    .fright{
	float: right !important;
}

    .truncate {
        max-width: 250px;
        /* adjust based on your layout */
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        cursor: pointer;
        /* Indicates that the element is clickable */
    }

    .not-truncated {
        max-width: none;
        white-space: normal;
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
        height: 100vh;
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
    document.addEventListener('DOMContentLoaded', function() {
        const addressCells = document.querySelectorAll('.truncate');

        addressCells.forEach(cell => {
            cell.addEventListener('click', function() {
                this.classList.toggle('not-truncated');
            });
        });
    });
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

@endsection