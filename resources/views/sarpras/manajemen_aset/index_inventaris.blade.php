@extends('layout')

@section('content')
<div>

    @include('sarpras.manajemen_aset.components.inventaris_table')

</div>

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