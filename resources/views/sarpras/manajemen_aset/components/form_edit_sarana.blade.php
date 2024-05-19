<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="POST" action="{{ route('manajemen_aset.sarana.update') }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Sarana</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit-id" name="id">
                    <div class="mb-3">
                        <label for="edit-kode-unik" class="form-label">Kode Unik</label>
                        <input type="text" class="form-control" id="edit-kode-unik" name="kode_unik" disabled>
                    </div>
                    {{-- <div class="mb-3">
                       <label for="edit-nama-prasarana" class="form-label">Nama Prasarana</label>
                       <input type="text" class="form-control" id="edit-nama-prasarana" name="nama_prasarana"
                           disabled>
                   </div>
                   <div class="mb-3">
                       <label for="edit-nama-ruangan" class="form-label">Nama Ruangan</label>
                       <input type="text" class="form-control" id="edit-nama-ruangan" name="nama_ruangan" disabled>
                   </div> --}}
                    <div class="mb-3">
                        <label for="edit-nama-sarana" class="form-label">Nama Sarana</label>
                        <input type="text" class="form-control" id="edit-nama-sarana" name="nama_sarana" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="edit-penggunaan" class="form-label">Penggunaan</label>
                        <input type="text" class="form-control" id="edit-penggunaan" name="penggunaan">
                    </div>
                    <div class="mb-3">
                        <label for="edit-kondisi" class="form-label">Kondisi</label>
                        <input type="text" class="form-control" id="edit-kondisi" name="kondisi">
                    </div>
                    <div class="mb-3">
                        <label for="edit-status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="edit-status" name="status">
                    </div>
                    {{-- <div class="mb-3">
                       <label for="edit-nilai-perolehan" class="form-label">Nilai Perolehan</label>
                       <input type="text" class="form-control" id="edit-nilai-perolehan" name="nilai_perolehan"
                           disabled>
                   </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var kodeUnik = button.getAttribute('data-kode-unik');
            var namaSarana = button.getAttribute('data-nama-sarana');
            var penggunaan = button.getAttribute('data-penggunaan');
            var kondisi = button.getAttribute('data-kondisi');
            var status = button.getAttribute('data-status');

            var modalTitle = editModal.querySelector('.modal-title');
            var idInput = editModal.querySelector('#edit-id');
            var namaKodeUnik = editModal.querySelector('#edit-kode-unik');
            var namaSaranaInput = editModal.querySelector('#edit-nama-sarana');
            var penggunaanInput = editModal.querySelector('#edit-penggunaan');
            var kondisiInput = editModal.querySelector('#edit-kondisi');
            var statusInput = editModal.querySelector('#edit-status');

            modalTitle.textContent = 'Edit Data Sarana: ' + kodeUnik;
            idInput.value = id;
            namaKodeUnik.value = kodeUnik;
            namaSaranaInput.value = namaSarana;
            penggunaanInput.value = penggunaan;
            kondisiInput.value = kondisi;
            statusInput.value = status;
        });
    });
</script>
