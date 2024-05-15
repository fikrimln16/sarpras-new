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
                <form id="ruanganForm" action="{{ route('manajemen_aset.ruangan.create') }}" method="POST">
                    @csrf
                    <div>
                        <label for="bangunan">Prasarana:</label>
                        <select class="form-control" id="bangunan" name="id_prasarana">
                            @foreach($prasarana as $b)
                                <option value="{{ $b->id }}">{{ $b->NM_BRG_TANAH }}</option> <!-- asumsikan kolom nama ada di tabel bangunan -->
                            @endforeach
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