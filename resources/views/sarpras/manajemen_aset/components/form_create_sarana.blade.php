<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Sarana</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah -->
                <form action="{{ route('manajemen_aset.sarana.create') }}" method="POST" id="formTambahSarana">
                    @csrf
                    <div class="form-group">
                        <label for="prasarana">Prasarana:</label>
                        <select class="form-control" id="prasarana" name="prasarana">
                            <option disabled selected>Pilih Prasarana</option> <!-- asumsikan kolom nama ada di tabel bangunan -->
                            @foreach($prasarana as $b)
                            <option value="{{ $b->id }}">{{ $b->nama_prasarana }}</option> <!-- asumsikan kolom nama ada di tabel bangunan -->
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ruangan">Ruangan:</label>
                        <select class="form-control" id="ruangan" name="ruangan">
                            <!-- Options will be dynamically populated -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="skema_biaya">Skema Biaya:</label>
                        <select class="form-control" id="skema_biaya" name="skema_biaya">
                            <option value="PHLN">PHLN</option>
                            <option value="SBSN">SBSN</option>
                        </select>
                    </div>
                    <div id="saranaContainer">
                        <!-- Sarana akan ditambahkan di sini -->
                    </div>
                    <button type="button" class="btn btn-success" id="btnTambahSarana">Tambah Sarana</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#prasarana').change(function() {
            var idBangunan = $(this).val(); // Get selected prasarana ID

            // Clear existing options
            $('#ruangan').empty();

            // Construct the URL for the AJAX request dynamically based on the selected ID
            var url = '/manajemen_aset/ruangan/bangunan/' + idBangunan;

            // Fetch new options based on prasarana ID
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    if (data.length > 0) {
                        $.each(data, function(key, value) {
                            $('#ruangan').append('<option value="' + value.id + '">' + value.nama_ruangan + '</option>');
                        });
                    } else {
                        $('#ruangan').append('<option>No Ruangan Available</option>');
                    }
                },
                error: function() {
                    $('#ruangan').append('<option>Error loading data</option>');
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function() {
        var counter = 0;

        $('#btnTambahSarana').click(function() {
            counter++;

            var saranaHtml = `
            <div class="card mb-2" id="sarana${counter}">
                <div class="card-body">
                <div class="form-group">
            <label for="nama_sarana${counter}">Nama Sarana:</label>
            <input type="text" class="form-control" id="nama_sarana${counter}" name="nama_sarana[]">
        </div>
        <div class="form-group">
            <label for="kategori${counter}">Kategori:</label>
            <input type="text" class="form-control" id="kategori${counter}" name="kategori[]">
        </div>
        <div class="form-group">
            <label for="jenis_sarana${counter}">Jenis Sarana:</label>
            <input type="text" class="form-control" id="jenis_sarana${counter}" name="jenis_sarana[]">
        </div>
        <div class="form-group">
            <label for="spesifikasi${counter}">Spesifikasi:</label>
            <input type="text" class="form-control" id="spesifikasi${counter}" name="spesifikasi[]">
        </div>
        <div class="form-group">
            <label for="tanggal_perolehan${counter}">Tanggal Perolehan:</label>
            <input type="date" class="form-control" id="tanggal_perolehan${counter}" name="tanggal_perolehan[]">
        </div>
        <div class="form-group">
            <label for="tahun_produksi${counter}">Tahun Produksi:</label>
            <input type="number" class="form-control" id="tahun_produksi${counter}" name="tahun_produksi[]">
        </div>
        <div class="form-group">
            <label for="nilai_perolehan${counter}">Nilai Perolehan:</label>
            <input type="number" class="form-control" id="nilai_perolehan${counter}" name="nilai_perolehan[]">
        </div>
        <div class="form-group">
            <label for="nilai_buku${counter}">Nilai Buku:</label>
            <input type="number" class="form-control" id="nilai_buku${counter}" name="nilai_buku[]">
        </div>
        <div class="form-group">
            <label for="penggunaan${counter}">Penggunaan:</label>
            <input type="text" class="form-control" id="penggunaan${counter}" name="penggunaan[]">
        </div>
        <div class="form-group">
            <label for="kondisi${counter}">Kondisi:</label>
            <input type="text" class="form-control" id="kondisi${counter}" name="kondisi[]">
        </div>
        <div class="form-group">
            <label for="tanggal_hapus_buku${counter}">Tanggal Hapus Buku:</label>
            <input type="number" class="form-control" id="tanggal_hapus_buku${counter}" name="tanggal_hapus_buku[]">
        </div>
        <div class="form-group">
            <label for="status${counter}">Status:</label>
            <input type="text" class="form-control" id="status${counter}" name="status[]">
        </div>
        <div class="form-group">
            <label for="jumlah_barang${counter}">Jumlah Barang:</label>
            <input type="number" class="form-control" id="jumlah_barang${counter}" name="jumlah_barang[]">
        </div>
    </div>
    <button type="button" class="btn btn-danger mb-3 btnHapusSarana" data-counter="${counter}">Hapus Sarana</button>
</div>
           `;
            $('#saranaContainer').append(saranaHtml);
        });

        $(document).on('click', '.btnHapusSarana', function() {
            var counter = $(this).data('counter');
            $('#sarana' + counter).remove();
        });
    });
</script>

<style>
    .btnHapusSarana {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 30px;
        padding: 10px;
        align-self: flex-end;
    }

    .modal-content {
        /* background-color: blue; */
        min-width: 100%;
        width: fit-content;
    }


    #saranaContainer {
        /* background-color: orange; */
    }


    /* .card-body {
        background-color: orange;
        display: flex;
        align-items: center;
        justify-content: start;
        gap: 5px;
    } */

    .card {
        /* background-color: red; */
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .card-body {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        margin-bottom: 16px;
    }


    .card-body .form-group {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
        /* Menghilangkan margin bawah untuk mengurangi ruang kosong */
    }

    .card-body label {
        width: fit-content;
        /* Atur lebar label sesuai kebutuhan Anda */
        margin-bottom: 0;
        /* Menghilangkan margin bawah untuk mengurangi ruang kosong */
    }
</style>