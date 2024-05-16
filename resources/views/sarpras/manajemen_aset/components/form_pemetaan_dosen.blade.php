<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Tambah</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <style>
      .modal-content {
        /* background-color: blue; */
        width: fit-content;
    }


    #pemetaanContainer {
        /* background-color: orange; */
    }


    .card-body {
        display: flex;
        align-items: center;
        justify-content: start;
        gap: 5px;
    }
    </style>
</head>

<body>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Pemetaan Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form Tambah -->
                    {{-- <form action="{{ route("manajemen_aset.inventaris.tambah_pemetaan_dosen") }}" method="POST" id="formTambahSarana"> --}}
                    <form action="" method="POST" id="formTambahSarana">
                        <div class="form-group">
                            <label for="filterBangunan">Filter Bangunan:</label>
                            <select id="filterBangunanForm" class="form-select select2" name="bangunan">
                                <option value="">Semua Bangunan</option>
                                @foreach ($bangunan as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['nama_bangunan'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="filterRuangan">Filter Ruangan:</label>
                            <select id="filterRuanganForm" class="form-select select2" name="ruangan">
                                <option value="">Semua Ruangan</option>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        {{-- <script>


            $(document).ready(function() {
                var counter = 0;

                $('#filterBangunanForm').on('change', function() {
                    var bangunanId = $(this).val();
                    var ruanganOptions = '<option value="">Semua Ruangan</option>';
                    if (bangunanId !== '') {
                        $.get('{{ route("manajemen_aset.inventaris.getRuangan", ["id_bangunan" => ""]) }}/' + bangunanId, function(data) {
                            data.forEach(function(value) {
                                ruanganOptions += '<option value="' + value + '">' + value + '</option>';
                            });
                            $('#filterRuanganForm').html(ruanganOptions);
                        });
                    } else {
                        $('#filterRuanganForm').html(ruanganOptions);
                    }
                });

                $('#btnTambahSarana').click(function() {
                    counter++;

                    var saranaHtml = `
                        <div class="card mb-2" id="pemetaan${counter}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_dosen${counter}">Nama Dosen:</label>
                                    <select class="form-select select2" id="nama_dosen${counter}" name="nama_dosen[]" required>
                                        @foreach($nama_dosen as $dosen)
                                            <option value="{{ $dosen }}">{{ $dosen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_mulai_penempatan${counter}">Tanggal Mulai Penempatan:</label>
                                    <input type="date" class="form-control" id="tanggal_mulai_penempatan${counter}" name="tanggal_mulai_penempatan[]" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_akhir_penempatan${counter}">Tanggal Akhir Penempatan:</label>
                                    <input type="date" class="form-control" id="tanggal_akhir_penempatan${counter}" name="tanggal_akhir_penempatan[]" required>
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
        </script> --}}
</body>

</html>