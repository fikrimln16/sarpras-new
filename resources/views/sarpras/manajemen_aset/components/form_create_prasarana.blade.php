<!-- Modal Tambah -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Prasarana</h5>
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
                                <label for="jenisPrasarana">Jenis Prasarana:</label>
                                <select class="form-control" id="jenisPrasarana" name="jenis_prasarana">
                                    <option value="" disabled selected>Pilih Salah Satu</option>
                                    <option value="Gedung Kuliah">Gedung Kuliah</option>
                                    <option value="Laboratorium">Laboratorium</option>
                                    <option value="Gedung STP">Gedung STP</option>
                                    <option value="Gedung Perpustakaan">Gedung Perpustakaan</option>
                                    <option value="Gedung Layanan Akademik dan Rektorat">Gedung Layanan Akademik dan Rektorat</option>
                                    <option value="Gedung Auditorium">Auditorium</option>
                                    <option value="Gedung Asrama">Gedung Asrama</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>



                        <div id="dropdownTerpaduProdi" class="col-md-6 d-none">
                            <div class="form-group">
                                <label for="jenisTerpaduProdi">Jenis Terpadu / Prodi:</label>
                                <select class="form-control" id="jenisTerpaduProdi" name="jenis_terpadu_prodi">
                                    <option value="" disabled selected>Pilih Salah Satu</option>
                                    <option value="Terpadu">Terpadu</option>
                                    <option value="Prodi">Prodi/Fakultas</option>
                                </select>
                            </div>
                        </div>

                        <div id="dropdownJenisLaboratorium" class="col-md-6 d-none">
                            <div class="form-group">
                                <label for="jenisLaboratorium">Jenis Laboratorium</label>
                                <select class="form-control" id="jenisLaboratorium" name="jenis_laboratorium">
                                    <option value="" disabled selected>Pilih Salah Satu</option>
                                    <option value="Dasar">Dasar</option>
                                    <option value="Riset">Riset</option>
                                </select>
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

                        <div class="col-md-6 p-2">
                            <div class="form-group">
                                <label for="luasBangunan">Luas Bangunan:</label>
                                <input type="text" class="form-control" id="luasBangunan" name="luas_bangunan" required>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="form-group">
                                <label for="luasTanah">Luas Tanah:</label>
                                <input type="text" class="form-control" id="luasTanah" name="luas_tanah" required>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="form-group">
                                <label for="jumlahLantai">Jumlah Lantai:</label>
                                <input type="number" class="form-control" id="jumlahLantai" name="jumlah_lantai" required>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="form-group">
                                <label for="objekInfrastruktur">Objek Infrastruktur:</label>
                                <input type="text" class="form-control" id="objekInfrastruktur" name="objek_infrastruktur" required>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="form-group">
                                <label for="kdCabKota">Kd Cab Kota:</label>
                                <input type="text" class="form-control" id="kdCabKota" name="KD_CAB_KOTA" required>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="form-group">
                                <label for="nmKabKota">Nm Kab Kota:</label>
                                <input type="text" class="form-control" id="nmKabKota" name="NM_KAB_KOTA" required>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="form-group">
                                <label for="kdKabKota">Kd Kab Kota:</label>
                                <input type="text" class="form-control" id="kdKabKota" name="KD_KAB_KOTA" required>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="form-group">
                                <label for="kdProv">Kd Prov:</label>
                                <input type="text" class="form-control" id="kdProv" name="KD_PROV" required>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="form-group">
                                <label for="nmProv">Nm Prov:</label>
                                <input type="text" class="form-control" id="nmProv" name="NM_PROV" required>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="form-group">
                                <label for="penggunaan">Penggunaan:</label>
                                <input type="text" class="form-control" id="penggunaan" name="penggunaan" required>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="form-group">
                                <label for="kondisi">Kondisi:</label>
                                <input type="text" class="form-control" id="kondisi" name="kondisi" required>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="form-group">
                                <label for="noDokKepemilikan">No Dok Kepemilikan:</label>
                                <input type="text" class="form-control" id="noDokKepemilikan" name="NO_DOK_KEPEMILIKAN" required>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="form-group">
                                <label for="jnsDokKepemilikan">Jns Dok Kepemilikan:</label>
                                <input type="text" class="form-control" id="jnsDokKepemilikan" name="JNS_DOK_KEPEMILIKAN" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="bangunanCheck">
                                <label class="form-check-label" for="bangunanCheck">Bangunan</label>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.getElementById('bangunanCheck').addEventListener('change', function() {
        var bangunanContainer = document.getElementById('bangunanFields');
        bangunanContainer.style.display = this.checked ? 'block' : 'none';
    });

    $(document).ready(function() {
        $('#jenisPrasarana').change(function() {
            var selectedOption = $(this).val();
            if (selectedOption == 'Gedung Kuliah') {
                $('#dropdownTerpaduProdi').removeClass('d-none');
            } else {
                $('#dropdownTerpaduProdi').addClass('d-none');
            }
            console.log(selectedOption);
        });

        $('#prasaranaForm').submit(function(e) {
            var jenisPrasarana = $('#jenisPrasarana').val();
            var jenisTerpaduProdi = $('#jenisTerpaduProdi').val();

            if (jenisPrasarana === 'Gedung Kuliah' && jenisTerpaduProdi) {
                var gabungan = jenisPrasarana + ' ' + jenisTerpaduProdi;
                $('<input>').attr({
                    type: 'hidden',
                    name: 'jenis_prasarana',
                    value: gabungan
                }).appendTo('#prasaranaForm');
            }

            console.log('Form submitted with values:', {
                namaPrasarana: $('#namaPrasarana').val(),
                jenisPrasarana: jenisPrasarana,
                jenisTerpaduProdi: jenisTerpaduProdi,
                gabungan: gabungan
            });
        });
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