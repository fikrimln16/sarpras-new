@extends('sarpras.manajemen_aset.index_prasarana')

@section('prasarana_table')
<div>
    <!-- <button id="tambahBtn" class="btn btn-primary mb-2">Tambah</button> -->
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
                <th>Universitas</th>
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
                    <td>{{ $r->bangunan->NM_BRG_TANAH }}</td>
                    <td>{{ $r->bangunan->NM_SATKER_TANAH }}</td>
                    <td>
                        <!-- Contoh tombol aksi -->
                        <button class="btn btn-info">Edit</button>
                        <button class="btn btn-danger">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('sarpras.manajemen_aset.components.form_create_ruangan')

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


@endsection