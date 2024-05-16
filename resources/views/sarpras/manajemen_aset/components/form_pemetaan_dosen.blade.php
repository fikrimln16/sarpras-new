<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Tambah</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <style>
        .card-body {
            display: flex;
            align-items: center;
            justify-content: start;
            gap: 5px;
        }

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
</head>

<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Sarana</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Tambah -->
                    {{-- <form action="{{ route("manajemen_aset.inventaris.tambah_pemetaan_dosen") }}" method="POST" id="formTambahSarana"> --}}
                    <form action="{{ route('manajemen_aset.inventaris.tambah_pemetaan_dosen') }}" method="POST" id="formTambahSarana">
                    @csrf
                    <div class="form-group">
                        <label for="prasarana">Prasarana:</label>
                        <select class="form-control" id="prasarana" name="prasarana">
                            <option disabled selected>Pilih Prasarana</option> <!-- asumsikan kolom nama ada di tabel bangunan -->
                            @foreach($prasarana as $b)
                            <option value="{{ $b->id }}">{{ $b->nama_prasarana }}</option> <!-- asumsikan kolom nama ada di tabel bangunan -->
                            @endforeach
                        </select>
                        {{-- <div class="form-group">
                            <label for="filterRuangan">Filter Ruangan:</label>
                            <select id="filterRuanganForm" class="form-select select2" name="ruangan">
                                <option value="">Semua Ruangan</option>
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label for="ruangan">Ruangan:</label>
                            <select class="form-control" id="ruangan" name="id_ruang">
                                <!-- Options will be dynamically populated -->
                            </select>
                        </div>
                        <div id="pemetaanContainer">
                            <!-- Sarana akan ditambahkan di sini -->
                        </div>
                        <button type="button" class="btn btn-success" id="btnTambahSarana">Tambah Dosen</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            var counter = 0;



            $('#btnTambahSarana').click(function() {
                counter++;

                var saranaHtml = `
                    <div class="card mb-2" id="pemetaan${counter}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_sdm${counter}">Nama Dosen:</label>
                                <select class="form-select select2" id="id_sdm${counter}" name="id_sdm[]" required>
                                    @foreach($nama_dosen as $dosen)
                                    <option value="{{ $dosen->id }}">{{ $dosen->Nama_SDM }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_mulai_penempatan${counter}">Tanggal Mulai Penempatan:</label>
                                <input type="date" class="form-control" id="tanggal_mulai_penempatan${counter}" name="tanggal_mulai_penempatan[]" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_selesai_penempatan${counter}">Tanggal Akhir Penempatan:</label>
                                <input type="date" class="form-control" id="tanggal_selesai_penempatan${counter}" name="tanggal_selesai_penempatan[]" required>
                            </div>
                            <div class="form-group">
                                <label for="status${counter}">Status:</label>
                                <input type="text" class="form-control" id="status${counter}" name="status[]" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi${counter}">deskripsi:</label>
                                <input type="text" class="form-control" id="deskripsi${counter}" name="deskripsi[]">
                            </div>
                            <button type="button" class="btn btn-danger btnHapusSarana" data-counter="${counter}">Hapus</button>
                        </div>
                    </div>
                    `;

                $('#pemetaanContainer').append(saranaHtml);
                $('.select2').select2();
            });

            $(document).on('click', '.btnHapusSarana', function() {
                var counter = $(this).data('counter');
                $('#pemetaan' + counter).remove();
            });
        });
    </script>
</body>

</html>