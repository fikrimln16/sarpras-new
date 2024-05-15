<table id="dataTable" class="table table-bordered table-striped">
   <thead>
       <tr>
           <th>kode_penempatan</th>
           <th>Nama Dosen</th>
           <th>Ruangan</th>
           <th>tanggal_mulai_penempatan</th>
           <th>tanggal_akhir_penempatan</th>
           <th>status</th>
           <th>deskripsi</th>
           <th>detail</th>
       </tr>
   </thead>
   <tbody>
       @foreach ($data as $item)
           <tr>
               <td>{{ $item['kode_penempatan'] }}</td>
               <td>{{ $item['Nama Dosen'] }}</td>
               <td>{{ $item['Ruangan'] }}</td>
               <td>{{ $item['tanggal_mulai_penempatan'] }}</td>
               <td>{{ $item['tanggal_akhir_penempatan'] }}</td>
               <td>{{ $item['status'] }}</td>
               <td>{{ $item['deskripsi'] }}</td>
               <td>{{ $item['detail'] }}</td>
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
