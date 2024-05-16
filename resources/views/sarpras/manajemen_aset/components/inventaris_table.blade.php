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
               <td>{{ $item->sumber_daya_manusia->Nama_SDM }}</td>
               <td>{{ $item->ruang->nama_ruangan }}</td>
               <td>{{ $item->ruang->prasarana->nama_prasarana }}</td>
               <td>{{ $item->tanggal_mulai_penempatan }}</td>
               <td>{{ $item->tanggal_selesai_penempatan }}</td>
               {{-- <td>{{ $item['status'] }}</td>
               <td>{{ $item['deskripsi'] }}</td> --}}
               {{-- <td>{{ $item['detail'] }}</td> --}}
           </tr>
       @endforeach
   </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">