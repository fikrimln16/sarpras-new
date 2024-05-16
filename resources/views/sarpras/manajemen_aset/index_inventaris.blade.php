@extends('layout')

@section('content')
<!-- <button id="tambahBtn" class="btn btn-primary mb-2">Tambah</button> -->
<div class="row">
   <div class="col-md-6 mb-2">
       <label for="filterBangunan">Filter Bangunan:</label>
       <select id="filterBangunan" class="form-select">
           <option value="">Semua Bangunan</option>
           @foreach ($bangunan as $item)
               <option value="{{ $item['id'] }}">{{ $item['nama_bangunan'] }}</option>
           @endforeach
       </select>
   </div>
   <div class="col-md-6 mb-2">
       <label for="filterRuangan">Filter Ruangan:</label>
       <select id="filterRuangan" class="form-select">
           <option value="" disabled>Semua Ruangan</option>
       </select>
   </div>
</div>
@include('sarpras.manajemen_aset.components.form_pemetaan_dosen')
@include('sarpras.manajemen_aset.components.inventaris_table')


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
 
        // $('#filterRuangan').on('change', function() {
        //     var ruangan = $(this).val();
        //     $('#dataTable').DataTable().column(2).search(ruangan).draw();
        // });
    });
 </script>
@endsection