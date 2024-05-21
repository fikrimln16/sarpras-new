<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Sarana</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah -->
                <form action="{{ route('manajemen_aset.sarana.tambah_pemetaan_sarana') }}" method="POST"
                    id="formTambahSarana">
                    @csrf
                    <div class="form-group">
                        <label for="prasarana">Prasarana:</label>
                        <select class="form-control" id="prasarana" name="prasarana">
                            <option disabled selected>Pilih Prasarana</option>
                            <!-- asumsikan kolom nama ada di tabel bangunan -->
                            @foreach ($prasarana as $b)
                                <option value="{{ $b->id }}">{{ $b->prasarana->nama_prasarana }}</option>
                                <!-- asumsikan kolom nama ada di tabel bangunan -->
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ruangan">Ruangan:</label>
                        <select class="form-control" id="ruangan" name="ruangan">
                            <!-- Options will be dynamically populated -->
                        </select>
                    </div>

                    <div id="saranaContainer">
                        <div class="form-group">
                            <label for="sarana_table">Daftar Sarana</label>
                            <table class="table table-bordered" id="sarana_table">
                                <thead>
                                    <tr>
                                        <th>pilih</th>
                                        <th>ID Sarana</th>
                                        <th>Nama Sarana</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penempatanSarana as $sarana)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="checkbox-dosen"
                                                    value="{{ $sarana->id }}"
                                                    data-nama_sarana="{{ $sarana->nama_sarana }}">
                                            </td>
                                            <td>{{ $sarana->id }}</td>
                                            <td>{{ $sarana->nama_sarana }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tambahSaranaForm">
                        <input type="hidden" name="id_sarana" value="{{ $sarana->id ?? null }}">
                        <div class="form-group">
                            <label for="sarana_terpilih">Dosen Terpilih</label>
                            <table class="table table-bordered" id="sarana_terpilih">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Sarana</th>
                                        {{-- <th>Jumlah</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Dosen terpilih akan ditambahkan di sini -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {

        $('#sarana_table').DataTable({
            "pageLength": 5,
            "searching": true
        });

        $('#prasarana').change(function() {
            var idBangunan = $(this).val(); // Get selected prasarana ID
            // console.log(idBangunan);
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
                            $('#ruangan').append('<option value="' + value.id +
                                '">' + value.nama_ruangan + '</option>');
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

        $('#sarana_table').on('change', '.checkbox-dosen', function() {
            var id = $(this).val();
            var nama_sarana = $(this).data('nama_sarana');

            if ($(this).is(':checked')) {
                // Append selected dosen to the selected list with additional fields
                $('#sarana_terpilih tbody').append(`
                      <tr data-id="${id}">
                          <td><input type="hidden" name="id_sarana[]" value="${id}">${id}</td>
                          <td>${nama_sarana}</td>
                          <td><button type="button" class="btn btn-danger btn-sm hapus-dosen">Hapus</button></td>
                      </tr>
                  `);
            } else {
                // Remove dosen from the selected list
                $('#sarana_terpilih tbody tr[data-id="' + id + '"]').remove();
            }
        });

        $('#sarana_terpilih').on('click', '.hapus-dosen', function() {
            var id = $(this).closest('tr').data('id');
            // Uncheck the checkbox in the main table
            $('#sarana_table .checkbox-dosen[value="' + id + '"]').prop('checked', false);
            // Remove dosen from the selected list
            $(this).closest('tr').remove();
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
            <input type="date" class="form-control" id="tanggal_hapus_buku${counter}" name="tanggal_hapus_buku[]">
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
