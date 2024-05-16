<!-- Form SBSN -->
<div class="modal fade" id="modalSBSN" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah SBSN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah -->
                <form id="myForm" action="{{ route('perolehan_aset.tambah_sbsn') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_proyek">Nama Proyek:</label>
                        <input type="text" class="form-control" id="nama_proyek" name="nama_proyek">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kontrak">Jenis Kontrak:</label>
                        <select class="form-select" id="jenis_kontrak" name="jenis_kontrak"
                            onchange="toggleTanggalAkhir()">
                            <option value="single_year">Single Year</option>
                            <option value="multi_year">Multi Year</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_mulai_kontrak">Tanggal Mulai Kontrak:</label>
                        <input type="date" class="form-control" id="tanggal_mulai_kontrak"
                            name="tanggal_mulai_kontrak">
                    </div>
                    <div class="form-group" id="tanggal_akhir_group" style="display: none;">
                        <label for="tanggal_akhir_kontrak">Tanggal Akhir Kontrak:</label>
                        <input type="date" class="form-control" id="tanggal_akhir_kontrak"
                            name="tanggal_akhir_kontrak">
                    </div>
                    <div class="form-group">
                        <label for="perguruan_tinggi">Perguruan Tinggi:</label>
                        <select class="form-select" id="perguruan_tinggi" name="id_data_lokasi_kampus">
                            <option value="" disabled>Pilih Perguruan Tinggi:</option>
                            @foreach ( $data_lokasi_kampus as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_kampus }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penanda_aset">Penanda Aset:</label>
                        <select class="form-select" id="penanda_aset" name="penanda_aset">
                            <option value="ada">Ada</option>
                            <option value="tidak">Tidak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nilai_dpp">Nilai DPP:</label>
                        <input type="number" class="form-control" id="nilai_dpp" name="nilai_dpp">
                    </div>
                    <div class="form-group">
                        <label for="no_registrasi">No Registrasi:</label>
                        <input type="text" class="form-control" id="no_registrasi" name="no_registrasi">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
