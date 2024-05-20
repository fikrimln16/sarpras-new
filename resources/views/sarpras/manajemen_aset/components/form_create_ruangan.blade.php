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
                                <option value="{{ $b->id }}" data-jumlah-lantai="{{ $b->jumlah_lantai }}">
                                    {{ $b->nama_prasarana }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kode_ruang" class="form-label">Kode Ruang:</label>
                        <input type="text" class="form-control" id="kode_ruang" name="kode_ruang" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_ruangan" class="form-label">Nama Ruangan:</label>
                        <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="luas_ruang" class="form-label">Luas Ruang:</label>
                            <input type="number" class="form-control" id="luas_ruang" name="luas_ruang" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lantai" class="form-label">Lantai:</label>
                            <select class="form-control" id="lantai" name="lantai" required>
                                <option value="">Pilih Lantai</option>
                                <!-- Opsi lantai akan diisi secara dinamis oleh JavaScript -->
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="kapasitas" class="form-label">Kapasitas:</label>
                            <input type="number" class="form-control" id="kapasitas" name="kapasitas" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tahun_perolehan" class="form-label">Tahun Perolehan:</label>
                            <input type="number" class="form-control" id="tahun_perolehan" name="tahun_perolehan"
                                required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="kelompok_ruangan" class="form-label">Kelompok Ruangan:</label>
                        <input type="text" class="form-control" id="kelompok_ruangan" name="kelompok_ruangan"
                            required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tgl_mulai_kontrak" class="form-label">Tanggal Mulai Kontrak:</label>
                            <input type="date" class="form-control" id="tgl_mulai_kontrak" name="tgl_mulai_kontrak"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tgl_selesai_kontrak" class="form-label">Tanggal Selesai Kontrak:</label>
                            <input type="date" class="form-control" id="tgl_selesai_kontrak"
                                name="tgl_selesai_kontrak">
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
</script>
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
</style>
