<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Tambah Ruangan</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .modal-lg {
            max-width: 800px;
        }

        .form-control:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .modal-header {
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 15px;
        }

        .modal-body {
            padding-top: 15px;
        }

        .mb-3 {
            margin-bottom: 1.5rem !important;
        }

        .w-100 {
            width: 100% !important;
        }

        .nav-link {
            color: black !important;
            cursor: pointer;
            /* Ensures the text color is black */
        }

        .nav-link.active {
            font-weight: bold;
            /* Optional: Makes the active link bold */
            border-bottom: 2px solid black;
            /* Optional: Adds an underline to the active link */
        }

        .nav-link:hover {
            color: black !important;
            /* Ensures the text color remains black on hover */
        }
    </style>
</head>

<body>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Ruangan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="ruanganForm" action="{{ route('manajemen_aset.ruangan.create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="bangunan" class="form-label">Prasarana:</label>
                            <select class="form-control" id="bangunan" name="id_bangunan" required>
                                <option value="">Pilih Prasarana</option>
                                @foreach ($prasarana as $b)
                                <option value="{{ $b->id }}" data-jumlah-lantai="{{ $b->prasarana->jumlah_lantai }}">
                                    {{ $b->prasarana->nama_prasarana }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <ul class="nav nav-underline mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" data-target="create">Create</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-target="import">Import Excel</a>
                            </li>
                        </ul>

                        <div id="import_excel" class="mb-3">

                            <!-- isinya component import excel -->

                        </div>

                        <div id="create_manual">
                            <div class="mb-3">
                                <label for="kode_ruang" class="form-label">Kode Ruang:</label>
                                <input type="text" class="form-control" id="kode_ruang" name="kode_ruang">
                            </div>
                            <div class="mb-3">
                                <label for="nama_ruangan" class="form-label">Nama Ruangan:</label>
                                <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="luas_ruang" class="form-label">Luas Ruang:</label>
                                    <input type="number" class="form-control" id="luas_ruang" name="luas_ruang">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lantai" class="form-label">Lantai:</label>
                                    <select class="form-control" id="lantai" name="lantai">
                                        <option value="">Pilih Lantai</option>
                                        <!-- Opsi lantai akan diisi secara dinamis oleh JavaScript -->
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kapasitas" class="form-label">Kapasitas:</label>
                                    <input type="number" class="form-control" id="kapasitas" name="kapasitas">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var prasaranaSelect = document.getElementById('bangunan');
            var lantaiSelect = document.getElementById('lantai');

            prasaranaSelect.addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                var jumlahLantai = selectedOption.getAttribute('data-jumlah-lantai');

                // Clear previous options
                lantaiSelect.innerHTML = '<option value="">Pilih Lantai</option>';

                // Add new options based on jumlahLantai
                for (var i = 1; i <= jumlahLantai; i++) {
                    var option = document.createElement('option');
                    option.value = i;
                    option.textContent = 'Lantai ' + i;
                    lantaiSelect.appendChild(option);
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var ruanganForm = document.getElementById('ruanganForm');
            var importExcel = document.getElementById('import_excel');
            // Sembunyikan elemen saat halaman dimuat
            document.getElementById('import_excel').style.display = 'none';
            document.getElementById('create_manual').style.display = 'block';

            // Tindakan ketika tautan Create ditekan
            document.querySelector('a[data-target="create"]').addEventListener("click", function() {
                document.getElementById('import_excel').style.display = 'none'; // Sembunyikan komponen import_excel
                document.getElementById('create_manual').style.display = 'block'; // Tampilkan komponen create_manual

                document.querySelector('a[data-target="create"]').classList.add('active');
                document.querySelector('a[data-target="import"]').classList.remove('active');

                ruanganForm.action = "{{ route('manajemen_aset.ruangan.create') }}";
                ruanganForm.removeAttribute('enctype');

            });

            // Tindakan ketika tautan Import Excel ditekan
            document.querySelector('a[data-target="import"]').addEventListener("click", function() {
                document.getElementById('import_excel').style.display = 'block'; // Tampilkan komponen import_excel
                document.getElementById('create_manual').style.display = 'none'; // Sembunyikan komponen create_manual

                document.querySelector('a[data-target="create"]').classList.remove('active');
                document.querySelector('a[data-target="import"]').classList.add('active');

                ruanganForm.action = "{{ route('manajemen_aset.ruangan.import') }}";
                ruanganForm.setAttribute('enctype', 'multipart/form-data'); // Tambahkan enctype

                importExcel.innerHTML = `
                <a href="{{ route('manajemen_aset.ruangan.download_template') }}"
                                                    class="">Download Excel Template</a>
            <div class="form-group">
                <label for="file">Pilih File Excel</label>
                <input type="file" name="file" class="form-control" id="file">
            </div>
        `;
            });
        });
    </script>

</body>

</html>