<!-- Form Edit SBSN -->
<div class="modal fade" id="modalEditSBSN" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="editModalLabel">Edit SBSN</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- Form Edit -->
               <form id="editForm" action="" method="POST">
                   @csrf
                   @method('PUT')
                   <div class="form-group">
                       <label for="nama_proyek_edit">Nama Proyek:</label>
                       <input type="text" class="form-control" id="nama_proyek_edit" name="nama_proyek">
                   </div>
                   <div class="form-group">
                     <label for="jenis_kontrak_edit">Jenis Kontrak:</label>
                     <select class="form-select" id="jenis_kontrak_edit" name="jenis_kontrak">
                         <option value="single_year">Single Year</option>
                         <option value="multi_year">Multi Year</option>
                     </select>
                 </div>                 
                   <div class="form-group">
                       <label for="perguruan_tinggi_edit">Perguruan Tinggi:</label>
                       <select class="form-select" id="perguruan_tinggi_edit" name="perguruan_tinggi">
                           <option value="pt1">Perguruan Tinggi 1</option>
                           <option value="pt2">Perguruan Tinggi 2</option>
                       </select>
                   </div>
                   <div class="form-group">
                       <label for="penanda_aset_edit">Penanda Aset:</label>
                       <select class="form-select" id="penanda_aset_edit" name="penanda_aset">
                           <option value="ada">Ada</option>
                           <option value="tidak">Tidak</option>
                       </select>
                   </div>
                   <div class="form-group">
                       <label for="nilai_dpp_edit">Nilai DPP:</label>
                       <input type="number" class="form-control" id="nilai_dpp_edit" name="nilai_dpp">
                   </div>
                   <div class="form-group">
                       <label for="no_registrasi_edit">No Registrasi:</label>
                       <input type="text" class="form-control" id="no_registrasi_edit" name="no_registrasi">
                   </div>
                   <div class="form-group">
                       <label for="tanggal_mulai_kontrak_edit">Tanggal Mulai Kontrak:</label>
                       <input type="date" class="form-control" id="tanggal_mulai_kontrak_edit" name="tanggal_mulai_kontrak">
                   </div>
                   <div class="form-group" id="tanggal_akhir_group_edit" style="display: none;">
                       <label for="tanggal_akhir_kontrak_edit">Tanggal Akhir Kontrak:</label>
                       <input type="date" class="form-control" id="tanggal_akhir_kontrak_edit" name="tanggal_akhir_kontrak">
                   </div>
                   <input type="hidden" id="uuid_sbsn_edit" name="uuid_sbsn">
                   <input type="hidden" id="tahun_start_edit" name="tahun_start">
                   <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
               </form>                
           </div>
       </div>
   </div>
</div>
