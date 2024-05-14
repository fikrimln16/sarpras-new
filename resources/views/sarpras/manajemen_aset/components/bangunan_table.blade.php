@extends('sarpras.manajemen_aset.index_prasarana')

@section('bangunan_table')
<div>
    <table id="dataTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>KD BRG TANAH</th>
                <th>NM BRG TANAH</th>
                <th>NUP BRG TANAH</th>
                <th>TGL SK PEMAKAIAN</th>
                <th>Kapasitas</th>
                <th>Tanggal Hapus Buku</th>
                <th>Keterangan</th>
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
@include('sarpras.manajemen_aset.components.form_create_bangunan')

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