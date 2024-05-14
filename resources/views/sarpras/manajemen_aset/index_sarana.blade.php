@extends('layout')

@section('content')
    <button id="tambahBtn" class="btn btn-primary mb-2">Tambah</button>
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
    <table id="dataTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Ruangan</th>
                <th>Nama Sarana</th>
                <th>Spesifikasi</th>
                <th>Tanggal Perolehan</th>
                <th>Nilai Peroleham</th>
                {{-- <th>Detail Ruangan</th> --}}
                {{-- <th>Detail Sarana</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($penempatanSarana as $penempatan)
            <tr>
                <td>{{ $penempatan->id }}</td>
                <td>{{ $penempatan->ruangan->nama_ruangan }}</td>
                <td>{{ $penempatan->sarana->nama_sarana }}</td>
                <td>{{ $penempatan->sarana->spesifikasi }}</td>
                <td>{{ $penempatan->sarana->tanggal_perolehan }}</td>
                <td>{{ $penempatan->sarana->nilai_perolehan }}</td>
                {{-- <td>{{ $penempatan->ruangan->detail }}</td> tambahkan untuk kolom lainnya --}}
                {{-- <td>{{ $penempatan->sarana->detail }}</td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
    @include('sarpras.manajemen_aset.components.form_create_sarana')

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
@endsection
