<!-- Modal Tambah -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Bangunan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah -->
                <form id="prasaranaForm" action="{{ route('manajemen_aset.prasarana.create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="namaPrasarana">Nama Prasarana:</label>
                                <input type="text" class="form-control" id="namaPrasarana" name="nama_prasarana" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="luas">Luas (m²):</label>
                                <input type="number" step="0.1" class="form-control" id="luas" name="luas" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nilaiPerolehan">Nilai Perolehan (Rp):</label>
                                <input type="number" class="form-control" id="nilaiPerolehan" name="nilai_perolehan" required>
                            </div>
                        </div>

                        <!-- Dynamic Bangunan fields container -->
                        <div id="bangunanFields">
                            <div class="form-group">
                                <label for="kdSatkerTanah">Kode Satker Tanah:</label>
                                <input type="text" class="form-control" id="kdSatkerTanah" name="KD_SATKER_TANAH">
                            </div>
                            <div class="form-group">
                                <label for="nmSatkerTanah">Nama Satker Tanah:</label>
                                <input type="text" class="form-control" id="nmSatkerTanah" name="NM_SATKER_TANAH">
                            </div>
                            <div class="form-group">
                                <label for="kdBrgTanah">Kode Barang Tanah:</label>
                                <input type="text" class="form-control" id="kdBrgTanah" name="KD_BRG_TANAH">
                            </div>
                            <div class="form-group">
                                <label for="nmBrgTanah">Nama Barang Tanah:</label>
                                <input type="text" class="form-control" id="nmBrgTanah" name="NM_BRG_TANAH">
                            </div>
                            <div class="form-group">
                                <label for="nupBrgTanah">NUP Barang Tanah:</label>
                                <input type="text" class="form-control" id="nupBrgTanah" name="NUP_BRG_TANAH">
                            </div>
                            <div class="form-group">
                                <label for="tglSkPemakai">Tanggal SK Pemakai:</label>
                                <input type="date" class="form-control" id="tglSkPemakai" name="TGL_SK_PEMAKAIAN">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kapasitas">Kapasitas:</label>
                                    <input type="number" class="form-control" id="kapasitas" name="kapasitas">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggalHapusBuku">Tanggal Hapus Buku:</label>
                                    <input type="date" class="form-control" id="tanggalHapusBuku" name="tanggal_hapus_buku">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan:</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                                </div>
                            </div>
                        </div>
                        <button id="prasaranaForm" type="submit" class="btn btn-primary">Simpan</button>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
    document.getElementById('bangunanCheck').addEventListener('change', function() {
        var bangunanContainer = document.getElementById('bangunanFields');
        bangunanContainer.style.display = this.checked ? 'block' : 'none';
    });
</script>


<style>
    .modal-header {
        background-color: #007bff;
        color: white;
    }

    .modal-content {
        border-radius: 10px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-check {
        margin-bottom: 15px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    #bangunanFields {
        display: none;
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #ddd;
    }
</style>