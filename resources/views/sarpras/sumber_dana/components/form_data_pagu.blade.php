<!-- Form Data Pagu -->
<div class="modal fade" id="editDataPagu" tabindex="-1" aria-labelledby="editDataPaguLabel" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="editDataPaguLabel">Tambah Data Pagu</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
               <form id="editForm">
                   <div class="mb-3">
                       <label for="editPaguAkhir" class="form-label">Nilai Pagu Akhir:</label>
                       <input type="text" class="form-control" id="editPaguAkhir" readonly>
                   </div>
                   <div class="mb-3">
                       <label for="editNilaiRealisasikan" class="form-label">Nilai Realisasi:</label>
                       <input type="text" class="form-control" id="editNilaiRealisasikan">
                   </div>
                   <button type="button" class="btn btn-primary" onclick="updateData()">Update</button>
               </form>
           </div>
       </div>
   </div>
</div>