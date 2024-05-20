<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah tanah</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tanahForm" action="{{ route('manajemen_aset.tanah.tambah') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tanggal_mutasi_keluar" class="form-label">Nama Prasarana:</label>
                        <input type="text" class="form-control" id="tanggal_mutasi_keluar" name="nama_prasarana"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_mutasi_keluar" class="form-label">Luas:</label>
                        <input type="text" class="form-control" id="tanggal_mutasi_keluar" name="luas" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_mutasi_keluar" class="form-label">Alamat:</label>
                        <input type="text" class="form-control" id="tanggal_mutasi_keluar" name="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_mutasi_keluar" class="form-label">Nilai Perolehan:</label>
                        <input type="text" class="form-control" id="tanggal_mutasi_keluar" name="nilai_perolehan"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_mutasi_keluar" class="form-label">Tanggal Mutasi Keluar:</label>
                        <input type="date" class="form-control" id="tanggal_mutasi_keluar"
                            name="tanggal_mutasi_keluar" required>
                    </div>
                    <div class="mb-3">
                        <label for="batas" class="form-label">Batas:</label>
                        <input type="text" class="form-control" id="batas" name="batas" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">keterangan:</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

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
