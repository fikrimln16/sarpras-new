@extends('sarpras.manajemen_aset.index_prasarana')

@section('bangunan_table')
    <div class="container mt-5">
        <!-- Add Create New Prasarana Button -->
        <button id="tambahBtn" class="btn btn-primary mb-2">Tambah</button>
        <table id="dataTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama prasarana</th>
                <th>Panjang</th>
                <th>Lebar</th>
                <th>Luas</th>
                <th>Alamat</th>
                <th>Lintang</th>
                <th>Bujur</th>
                <th>BMN satker</th>
                <th>BMN kode barang</th>
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
                    <td>{{ $item['panjang'] }}</td>
                    <td>{{ $item['lebar'] }}</td>
                    <td>{{ $item['luas_bangunan'] }}</td>
                    <td  class="truncate" title="Click to expand">{{ $item['alamat'] }}</td>
                    <td>{{ $item['lintang'] }}</td>
                    <td>{{ $item['bujur'] }}</td>
                    <td>{{ $item['bmn_satker'] }}</td>
                    <td>{{ $item['bmn_kode_barang'] }}</td>
                    <td>{{ $item['bmn_nup'] }}</td>
                    {{-- <td>{{ $item['tanggal_perolehan']}}</td> --}}
                    <td>{{ number_format($item['nilai_perolehan'], 2) }}</td>
                    <td>{{ number_format($item['nilai_buku'], 2) }}</td>
                    {{-- <td>{{ $item['merk'] }}</td> --}}
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@include('sarpras.manajemen_aset.components.form_create_bangunan')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addressCells = document.querySelectorAll('.truncate');
        
        addressCells.forEach(cell => {
            cell.addEventListener('click', function () {
                this.classList.toggle('not-truncated');
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
    .truncate {
        max-width: 250px; /* adjust based on your layout */
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        cursor: pointer; /* Indicates that the element is clickable */
    }
    .not-truncated {
        max-width: none;
        white-space: normal;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    </style>


@endsection
{{-- <table id="dataTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>KD BRG TANAH</th>
            <th>NM BRG TANAH</th>
            <th>NUP BRG TANAH</th>
            <th>TGL SK PEMAKAIAN</th>
            <th>Kapasitas</th>
            <th>Tanggal Hapus Buku</th>
            <th>Keterangan</th>
            <th>Kategori</th>
            <th>Aksi</th> <!-- Kolom untuk tombol aksi seperti edit atau hapus -->
        </tr>
    </thead>
    <tbody>
        @foreach ($bangunan as $b)
            <tr>
                <td>{{ $b->KD_BRG_TANAH }}</td>
                <td>{{ $b->NM_BRG_TANAH }}</td>
                <td>{{ $b->NUP_BRG_TANAH }}</td>
                <td>{{ $b->TGL_SK_PEMAKAIAN }}</td>
                <td>{{ $b->kapasitas }}</td>
                <td>{{ $b->tanggal_hapus_buku }}</td>
                <td>{{ $b->keterangan }}</td>
                <td>{{ $b->kategori }}</td>
                <td>
                    <!-- Contoh tombol aksi -->
                    <button class="btn btn-info">Edit</button>
                    <button class="btn btn-danger">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table> --}}