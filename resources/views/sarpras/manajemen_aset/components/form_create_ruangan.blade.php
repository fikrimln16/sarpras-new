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
                <form id="ruanganForm">
                    @csrf
                    <div>
                        <label for="bangunan">Bangunan:</label>
                        <select class="form-control" id="bangunan" name="bangunan">
                            <option value="bangunan_a">Bangunan A</option>
                            <option value="bangunan_b">Bangunan B</option>
                        </select>
                    </div>
                    <div>
                        <label for="kode_ruang">Kode Ruang:</label>
                        <input type="text" id="kode_ruang" name="kode_ruang" required>
                    </div>
                    <div>
                        <label for="nama_ruangan">Nama Ruangan:</label>
                        <input type="text" id="nama_ruangan" name="nama_ruangan" required>
                    </div>
                    <div>
                        <label for="luas_ruang">Luas Ruang:</label>
                        <input type="number" id="luas_ruang" name="luas_ruang" required>
                    </div>
                    <div>
                        <label for="lantai">Lantai:</label>
                        <input type="number" id="lantai" name="lantai" required>
                    </div>
                    <div>
                        <label for="kapasitas">Kapasitas:</label>
                        <input type="number" id="kapasitas" name="kapasitas" required>
                    </div>
                    <div>
                        <label for="tahun_perolehan">Tahun Perolehan:</label>
                        <input type="number" id="tahun_perolehan" name="tahun_perolehan" required>
                    </div>
                    <div>
                        <label for="kelompok_ruangan">Kelompok Ruangan:</label>
                        <input type="text" id="kelompok_ruangan" name="kelompok_ruangan" required>
                    </div>
                    <div>
                        <label for="tgl_mulai_kontrak">Tanggal Mulai Kontrak:</label>
                        <input type="date" id="tgl_mulai_kontrak" name="tgl_mulai_kontrak" required>
                    </div>
                    <div>
                        <label for="tgl_selesai_kontrak">Tanggal Selesai Kontrak:</label>
                        <input type="date" id="tgl_selesai_kontrak" name="tgl_selesai_kontrak">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cek apakah ada data prasarana tersimpan di local storage
        if (localStorage.getItem('ruanganData')) {
            // Jika ada, ambil data dari local storage dan tampilkan dalam form
            const ruanganData = JSON.parse(localStorage.getItem('ruanganData'));
            populateForm(ruanganData);
        }
    });

    // Fungsi untuk menampilkan data prasarana dalam form
    function populateForm(ruanganData) {
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

    document.getElementById('ruanganForm').addEventListener('submit', function(event) {
        // Ambil nilai dari setiap input dalam formulir
        const ruanganData = {
                kode_ruang: document.getElementById('kode_ruang').value,
                nama_ruangan: document.getElementById('nama_ruangan').value,
                luas_ruang: document.getElementById('luas_ruang').value,
                lantai: document.getElementById('lantai').value,
                kapasitas: document.getElementById('kapasitas').value,
                tahun_perolehan: document.getElementById('tahun_perolehan').value,
                kelompok_ruangan: document.getElementById('kelompok_ruangan').value,
                tgl_mulai_kontrak: document.getElementById('tgl_mulai_kontrak').value,
                tgl_selesai_kontrak: document.getElementById('tgl_selesai_kontrak').value
            };

        // Ambil data prasarana yang tersimpan dalam local storage, atau gunakan array kosong jika belum ada
        let existingData = localStorage.getItem('ruanganData');
        let ruanganArray = existingData ? JSON.parse(existingData) : [];

        // Pastikan ruanganArray adalah sebuah array
        if (!Array.isArray(ruanganArray)) {
            ruanganaArray = [];
        }

        // Tambahkan data prasarana baru ke dalam array
        ruanganArray.push(ruanganData);

        // Simpan array data prasarana ke dalam local storage
        localStorage.setItem('ruanganData', JSON.stringify(ruanganArray));

        // Redirect ke halaman lain atau lakukan operasi lain sesuai kebutuhan
        console.log('Data prasarana berhasil disimpan: 1 deh', ruanganData);
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