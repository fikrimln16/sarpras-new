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
                    <div class="form-group">
                        <label for="namaPrasarana">Nama Prasarana:</label>
                        <input type="text" class="form-control" id="namaPrasarana" name="nama_prasarana" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_prasarana">Jenis Prasarana:</label>
                        <input type="text" class="form-control" id="jenis_prasarana" name="jenis_prasarana" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="lintang">Lintang:</label>
                        <input type="text" class="form-control" id="lintang" name="lintang" required>
                    </div>
                    <div class="form-group">
                        <label for="bujur">Bujur:</label>
                        <input type="text" class="form-control" id="bujur" name="bujur" required>
                    </div>
                    <div class="form-group">
                        <label for="panjang">Panjang (m):</label>
                        <input type="number" step="0.1" class="form-control" id="panjang" name="panjang" required>
                    </div>
                    <div class="form-group">
                        <label for="lebar">Lebar (m):</label>
                        <input type="number" step="0.1" class="form-control" id="lebar" name="lebar" required>
                    </div>
                    <div class="form-group">
                        <label for="luas">Luas Bangunan(m²):</label>
                        <input type="number" step="0.1" class="form-control" id="luas" name="luas_bangunan" required>
                    </div>
                    <div class="form-group">
                        <label for="luas_tanah">Luas Tanah(m²):</label>
                        <input type="number" step="0.1" class="form-control" id="luas_tanah" name="luas_tanah" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_lantai">Jumlah Lantai:</label>
                        <input type="number" step="0.1" class="form-control" id="jumlah_lantai" name="jumlah_lantai" required>
                    </div>
                    <div class="form-group">
                        <label for="objek_infrastruktur">BMN Satker:</label>
                        <input type="text" class="form-control" id="objek_infrastruktur" name="objek_infrastruktur" required>
                    </div>
                    <div class="form-group">
                        <label for="bmnSatker">BMN Satker:</label>
                        <input type="text" class="form-control" id="bmnSatker" name="bmn_satker" required>
                    </div>
                    <div class="form-group">
                        <label for="bmnKodeBarang">BMN Kode Barang:</label>
                        <input type="text" class="form-control" id="bmnKodeBarang" name="bmn_kode_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="bmnNup">BMN NUP:</label>
                        <input type="number" class="form-control" id="bmnNup" name="bmn_nup" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggalPerolehan">Tanggal Perolehan:</label>
                        <input type="date" class="form-control" id="tanggalPerolehan" name="tanggal_perolehan" required>
                    </div>
                    <div class="form-group">
                        <label for="nilaiPerolehan">Nilai Perolehan (Rp):</label>
                        <input type="number" class="form-control" id="nilaiPerolehan" name="nilai_perolehan" required>
                    </div>
                    <div class="form-group">
                        <label for="nilaiBuku">Nilai Buku (Rp):</label>
                        <input type="number" class="form-control" id="nilaiBuku" name="nilai_buku" required>
                    </div>
                    <div class="form-group">
                        <label for="merk">MERK:</label>
                        <input type="text" class="form-control" id="merk" name="merk" required>
                    </div>
                    <div class="form-group">
                        <label for="penggunaan">Penggunaan:</label>
                        <input type="text" class="form-control" id="penggunaan" name="penggunaan" required>
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi:</label>
                        <input type="text" class="form-control" id="kondisi" name="kondisi" required>
                    </div>
                    <div class="form-group">
                        <label for="kd_kab_kota">kd_kab_kota:</label>
                        <input type="text" class="form-control" id="kd_kab_kota" name="kd_kab_kota" required>
                    </div>
                    <div class="form-group">
                        <label for="nm_kab_kota">nm_kab_kota:</label>
                        <input type="text" class="form-control" id="nm_kab_kota" name="nm_kab_kota" required>
                    </div>
                    <div class="form-group">
                        <label for="kd_prov">kd_prov:</label>
                        <input type="text" class="form-control" id="kd_prov" name="kd_prov" required>
                    </div>
                    <div class="form-group">
                        <label for="nm_prov">nm_prov:</label>
                        <input type="text" class="form-control" id="nm_prov" name="nm_prov" required>
                    </div>
                    <div class="form-group">
                        <label for="nm_dok_kepemilikan">nm_dok_kepemilikan:</label>
                        <input type="text" class="form-control" id="nm_dok_kepemilikan" name="nm_dok_kepemilikan" required>
                    </div>
                    <div class="form-group">
                        <label for="dok_kepemilikan">dok_kepemilikan:</label>
                        <input type="text" class="form-control" id="dok_kepemilikan" name="dok_kepemilikan" required>
                    </div>
                    <div class="form-group">
                        <label for="jns_dok_kepemilikan">jns_dok_kepemilikan:</label>
                        <input type="text" class="form-control" id="jns_dok_kepemilikan" name="jns_dok_kepemilikan" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="bangunanCheck">
                        <label class="form-check-label" for="bangunanCheck">Bangunan</label>
                    </div>
             
                    <!-- Dynamic Bangunan fields container -->
                    <div id="bangunanFields">
                        <div class="form-group">
                            <label for="idBangunan">ID Bangunan (GUID):</label>
                            <input type="text" class="form-control" id="idBangunan" name="id_bangunan">
                        </div>
                        <div class="form-group">
                            <label for="kdSatkerTanah">Kode Satker Tanah:</label>
                            <input type="text" class="form-control" id="kdSatkerTanah" name="kd_satker_tanah">
                        </div>
                        <div class="form-group">
                            <label for="nmSatkerTanah">Nama Satker Tanah:</label>
                            <input type="text" class="form-control" id="nmSatkerTanah" name="nm_satker_tanah">
                        </div>
                        <div class="form-group">
                            <label for="kdBrgTanah">Kode Barang Tanah:</label>
                            <input type="text" class="form-control" id="kdBrgTanah" name="kd_brg_tanah">
                        </div>
                        <div class="form-group">
                            <label for="nmBrgTanah">Nama Barang Tanah:</label>
                            <input type="text" class="form-control" id="nmBrgTanah" name="nm_brg_tanah">
                        </div>
                        <div class="form-group">
                            <label for="nupBrgTanah">NUP Barang Tanah:</label>
                            <input type="text" class="form-control" id="nupBrgTanah" name="nup_brg_tanah">
                        </div>
                        <div class="form-group">
                            <label for="tglSkPemakai">Tanggal SK Pemakai:</label>
                            <input type="date" class="form-control" id="tglSkPemakai" name="tgl_sk_pemakai">
                        </div>
                        <div class="form-group">
                            <label for="kapasitas">Kapasitas:</label>
                            <input type="number" class="form-control" id="kapasitas" name="kapasitas">
                        </div>
                        <div class="form-group">
                            <label for="tanggalHapusBuku">Tanggal Hapus Buku:</label>
                            <input type="date" class="form-control" id="tanggalHapusBuku" name="tanggal_hapus_buku">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan:</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
    .modal-content {
        /* background-color: blue; */
        width: fit-content;
    }


    #saranaContainer {
        /* background-color: orange; */
    }


    .card-body {
        display: flex;
        align-items: center;
        justify-content: start;
        gap: 5px;
    }
</style>