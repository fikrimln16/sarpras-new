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
                                <label for="panjang">Panjang (m):</label>
                                <input type="number" step="0.1" class="form-control" id="panjang" name="panjang" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lebar">Lebar (m):</label>
                                <input type="number" step="0.1" class="form-control" id="lebar" name="lebar" required>
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
                                <label for="lintang">Lintang:</label>
                                <input type="text" class="form-control" id="lintang" name="lintang" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bujur">Bujur:</label>
                                <input type="text" class="form-control" id="bujur" name="bujur" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bmnSatker">BMN Satker:</label>
                                <input type="text" class="form-control" id="bmnSatker" name="bmn_satker" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bmnKodeBarang">BMN Kode Barang:</label>
                                <input type="text" class="form-control" id="bmnKodeBarang" name="bmn_kode_barang" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bmnNup">BMN NUP:</label>
                                <input type="number" class="form-control" id="bmnNup" name="bmn_nup" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggalPerolehan">Tanggal Perolehan:</label>
                                <input type="date" class="form-control" id="tanggalPerolehan" name="tanggal_perolehan" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nilaiPerolehan">Nilai Perolehan (Rp):</label>
                                <input type="number" class="form-control" id="nilaiPerolehan" name="nilai_perolehan" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nilaiBuku">Nilai Buku (Rp):</label>
                                <input type="number" class="form-control" id="nilaiBuku" name="nilai_buku" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="merk">MERK:</label>
                                <input type="text" class="form-control" id="merk" name="merk" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="bangunanCheck">
                                <label class="form-check-label" for="bangunanCheck">Bangunan</label>
                            </div>
                        </div>
                    </div>

                    <!-- Dynamic Bangunan fields container -->
                    <div id="bangunanFields" class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idBangunan">ID Bangunan (GUID):</label>
                                <input type="text" class="form-control" id="idBangunan" name="id_bangunan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kdSatkerTanah">Kode Satker Tanah:</label>
                                <input type="text" class="form-control" id="kdSatkerTanah" name="kd_satker_tanah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nmSatkerTanah">Nama Satker Tanah:</label>
                                <input type="text" class="form-control" id="nmSatkerTanah" name="nm_satker_tanah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kdBrgTanah">Kode Barang Tanah:</label>
                                <input type="text" class="form-control" id="kdBrgTanah" name="kd_brg_tanah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nmBrgTanah">Nama Barang Tanah:</label>
                                <input type="text" class="form-control" id="nmBrgTanah" name="nm_brg_tanah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nupBrgTanah">NUP Barang Tanah:</label>
                                <input type="text" class="form-control" id="nupBrgTanah" name="nup_brg_tanah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tglSkPemakai">Tanggal SK Pemakai:</label>
                                <input type="date" class="form-control" id="tglSkPemakai" name="tgl_sk_pemakai">
                            </div>
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="prasaranaForm" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- <div>
            <label for="luas_bangunan">Luas Bangunan:</label>
            <input type="number" id="luas_bangunan" name="luas_bangunan" required>
        </div>
        <div>
            <label for="luas_tanah">Luas Tanah:</label>
            <input type="number" id="luas_tanah" name="luas_tanah" required>
        </div>
        <div>
            <label for="jumlah_lantai">Jumlah Lantai:</label>
            <input type="number" id="jumlah_lantai" name="jumlah_lantai" required>
        </div>
        <div>
            <label for="objek_infrastruktur">Objek Infrastruktur:</label>
            <input type="text" id="objek_infrastruktur" name="objek_infrastruktur" required>
        </div>
        <div>
            <label for="BMN_satker">BMN Satker:</label>
            <input type="text" id="BMN_satker" name="BMN_satker" required>
        </div>
        <div>
            <label for="BMN_kode_barang">BMN Kode Barang:</label>
            <input type="number" id="BMN_kode_barang" name="BMN_kode_barang" required>
        </div>
        <div>
            <label for="BMN_nup">BMN NUP:</label>
            <input type="text" id="BMN_nup" name="BMN_nup" required>
        </div>
        <div>
            <label for="tanggal_perolehan">Tanggal Perolehan:</label>
            <input type="date" id="tanggal_perolehan" name="tanggal_perolehan" required>
        </div>
        <div>
            <label for="nilai_perolehan">Nilai Perolehan:</label>
            <input type="number" id="nilai_perolehan" name="nilai_perolehan" required>
        </div>
        <div>
            <label for="nilai_buku">Nilai Buku:</label>
            <input type="number" id="nilai_buku" name="nilai_buku" required>
        </div>
        <div>
            <label for="merk">Merk:</label>
            <input type="text" id="merk" name="merk">
        </div>
        <div>
            <label for="KD_KAB_KOTA">Kode Kabupaten/Kota:</label>
            <input type="text" id="KD_KAB_KOTA" name="KD_KAB_KOTA" required>
        </div>
        <div>
            <label for="NM_KAB_KOTA">Nama Kabupaten/Kota:</label>
            <input type="text" id="NM_KAB_KOTA" name="NM_KAB_KOTA" required>
        </div>
        <div>
            <label for="KD_PROV">Kode Provinsi:</label>
            <input type="text" id="KD_PROV" name="KD_PROV" required>
        </div>
        <div>
            <label for="NM_PROV">Nama Provinsi:</label>
            <input type="text" id="NM_PROV" name="NM_PROV" required>
        </div>
        <div>
            <label for="penggunaan">Penggunaan:</label>
            <input type="text" id="penggunaan" name="penggunaan" required>
        </div>
        <div>
            <label for="kondisi">Kondisi:</label>
            <select id="kondisi" name="kondisi" required>
                <option value="baik">Baik</option>
                <option value="rusak">Rusak</option>
                <option value="perlu-perbaikan">Perlu Perbaikan</option>
            </select>
        </div>
        <div>
            <label for="NO_DOK_KEPEMILIKAN">Nomor Dokumen Kepemilikan:</label>
            <input type="text" id="NO_DOK_KEPEMILIKAN" name="NO_DOK_KEPEMILIKAN" required>
        </div>
        <div>
            <label for="DOK_KEPEMILIKAN">Dokumen Kepemilikan:</label>
            <input type="text" id="DOK_KEPEMILIKAN" name="DOK_KEPEMILIKAN">
        </div>
        <div>
            <label for="JNS_DOK_KEPEMILIKAN">Jenis Dokumen Kepemilikan:</label>
            <input type="text" id="JNS_DOK_KEPEMILIKAN" name="JNS_DOK_KEPEMILIKAN" required>
        </div>
        <div>
            <label for="KD_SATKER_TANAH">Kode Satuan Kerja Tanah:</label>
            <input type="text" id="KD_SATKER_TANAH" name="KD_SATKER_TANAH" required>
        </div>
        <div>
            <label for="NM_SATKER_TANAH">Nama Satuan Kerja Tanah:</label>
            <input type="text" id="NM_SATKER_TANAH" name="NM_SATKER_TANAH" required>
        </div>
        <div>
            <label for="KD_BRG_TANAH">Kode Barang Tanah:</label>
            <input type="number" id="KD_BRG_TANAH" name="KD_BRG_TANAH" required>
        </div>
        <div>
            <label for="NM_BRG_TANAH">Nama Barang Tanah:</label>
            <input type="text" id="NM_BRG_TANAH" name="NM_BRG_TANAH" required>
        </div>
        <div>
            <label for="NUP_BRG_TANAH">NUP Barang Tanah:</label>
            <input type="text" id="NUP_BRG_TANAH" name="NUP_BRG_TANAH" required>
        </div>
        <div>
            <label for="TGL_SK_PEMAKAIAN">Tanggal SK Pemakaian:</label>
            <input type="date" id="TGL_SK_PEMAKAIAN" name="TGL_SK_PEMAKAIAN" required>
        </div>
        <div>
            <label for="kapasitas">Kapasitas:</label>
            <input type="number" id="kapasitas" name="kapasitas" required>
        </div>
        <div>
            <label for="tanggal_hapus_buku">Tanggal Hapus Buku:</label>
            <input type="date" id="tanggal_hapus_buku" name="tanggal_hapus_buku">
        </div>
        <div>
            <label for="keterangan">Keterangan:</label>
            <input type="text" id="keterangan" name="keterangan" required>
        </div> -->
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
<script>
    document.getElementById('kocak').addEventListener('click', function() {
        console.log('Button kocak diklik!');
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Cek apakah ada data prasarana tersimpan di local storage
        if (localStorage.getItem('prasaranaData')) {
            // Jika ada, ambil data dari local storage dan tampilkan dalam form
            const prasaranaData = JSON.parse(localStorage.getItem('prasaranaData'));
            populateForm(prasaranaData);
        }
    });

    // Fungsi untuk menampilkan data prasarana dalam form
    function populateForm(prasaranaData) {
        document.getElementById('nama_prasarana').value = prasaranaData.nama_prasarana || '';
        document.getElementById('jenis_prasarana').value = prasaranaData.jenis_prasarana || '';
        document.getElementById('alamat').value = prasaranaData.alamat || '';
        document.getElementById('latitude').value = prasaranaData.latitude || '';
        document.getElementById('longitude').value = prasaranaData.longitude || '';
        document.getElementById('panjang').value = prasaranaData.panjang || '';
        document.getElementById('lebar').value = prasaranaData.lebar || '';
        // document.getElementById('luas_bangunan').value = prasaranaData.luas_bangunan || '';
        // document.getElementById('luas_tanah').value = prasaranaData.luas_tanah || '';
        // document.getElementById('jumlah_lantai').value = prasaranaData.jumlah_lantai || '';
        // document.getElementById('objek_infrastruktur').value = prasaranaData.objek_infrastruktur || '';
        // document.getElementById('BMN_satker').value = prasaranaData.BMN_satker || '';
        // document.getElementById('BMN_kode_barang').value = prasaranaData.BMN_kode_barang || '';
        // document.getElementById('BMN_nup').value = prasaranaData.BMN_nup || '';
        // document.getElementById('tanggal_perolehan').value = prasaranaData.tanggal_perolehan || '';
        // document.getElementById('nilai_perolehan').value = prasaranaData.nilai_perolehan || '';
        // document.getElementById('nilai_buku').value = prasaranaData.nilai_buku || '';
        // document.getElementById('merk').value = prasaranaData.merk || '';
        // document.getElementById('KD_KAB_KOTA').value = prasaranaData.KD_KAB_KOTA || '';
        // document.getElementById('NM_KAB_KOTA').value = prasaranaData.NM_KAB_KOTA || '';
        // document.getElementById('KD_PROV').value = prasaranaData.KD_PROV || '';
        // document.getElementById('NM_PROV').value = prasaranaData.NM_PROV || '';
        // document.getElementById('penggunaan').value = prasaranaData.penggunaan || '';
        // document.getElementById('kondisi').value = prasaranaData.kondisi || '';
        // document.getElementById('NO_DOK_KEPEMILIKAN').value = prasaranaData.NO_DOK_KEPEMILIKAN || '';
        // document.getElementById('DOK_KEPEMILIKAN').value = prasaranaData.DOK_KEPEMILIKAN || '';
        // document.getElementById('JNS_DOK_KEPEMILIKAN').value = prasaranaData.JNS_DOK_KEPEMILIKAN || '';
        // document.getElementById('KD_SATKER_TANAH').value = prasaranaData.KD_SATKER_TANAH || '';
        // document.getElementById('NM_SATKER_TANAH').value = prasaranaData.NM_SATKER_TANAH || '';
        // document.getElementById('KD_BRG_TANAH').value = prasaranaData.KD_BRG_TANAH || '';
        // document.getElementById('NM_BRG_TANAH').value = prasaranaData.NM_BRG_TANAH || '';
        // document.getElementById('NUP_BRG_TANAH').value = prasaranaData.NUP_BRG_TANAH || '';
        // document.getElementById('TGL_SK_PEMAKAIAN').value = prasaranaData.TGL_SK_PEMAKAIAN || '';
        // document.getElementById('kapasitas').value = prasaranaData.kapasitas || '';
        // document.getElementById('tanggal_hapus_buku').value = prasaranaData.tanggal_hapus_buku || '';
        // document.getElementById('keterangan').value = prasaranaData.keterangan || '';
    }

    document.getElementById('prasaranaForm').addEventListener('submit', function(event) {
        // Ambil nilai dari setiap input dalam formulir
        const prasaranaData = {
            nama_prasarana: document.getElementById('nama_prasarana').value,
            jenis_prasarana: document.getElementById('jenis_prasarana').value,
            alamat: document.getElementById('alamat').value,
            latitude: document.getElementById('latitude').value,
            longitude: document.getElementById('longitude').value,
            panjang: document.getElementById('panjang').value,
            lebar: document.getElementById('lebar').value,
            // Tambahkan sisa data prasarana yang ingin Anda simpan
        };

        // Ambil data prasarana yang tersimpan dalam local storage, atau gunakan array kosong jika belum ada
        let existingData = localStorage.getItem('prasaranaData');
        let prasaranaArray = existingData ? JSON.parse(existingData) : [];

        // Pastikan prasaranaArray adalah sebuah array
        if (!Array.isArray(prasaranaArray)) {
            prasaranaArray = [];
        }

        // Tambahkan data prasarana baru ke dalam array
        prasaranaArray.push(prasaranaData);

        // Simpan array data prasarana ke dalam local storage
        localStorage.setItem('prasaranaData', JSON.stringify(prasaranaArray));

        // Redirect ke halaman lain atau lakukan operasi lain sesuai kebutuhan
        console.log('Data prasarana berhasil disimpan: 1 deh', prasaranaData);
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