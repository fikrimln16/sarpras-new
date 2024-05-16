<!-- Form Edit PHLN -->
<div class="modal fade" id="modalEditPHLN" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="editModalLabel">Edit PHLN</h5>
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
                      <label for="singkatan_proyek_edit">Singkatan Proyek:</label>
                      <input type="text" class="form-control" id="singkatan_proyek_edit" name="singkatan_proyek">
                  </div>
                  <div class="form-group">
                      <label for="jenis_kontrak_edit">Jenis Kontrak:</label>
                      <select class="form-select" id="jenis_kontrak_edit" name="jenis_kontrak">
                          <option value="single_year">Single Year</option>
                          <option value="multi_year">Multi Year</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="sign_date_edit">Sign Date:</label>
                      <input type="date" class="form-control" id="sign_date_edit" name="sign_date">
                  </div>
                  <div class="form-group">
                      <label for="closed_date_edit">Closed Date:</label>
                      <input type="date" class="form-control" id="closed_date_edit" name="closed_date">
                  </div>
                  <div class="form-group">
                      <label for="pemberi_pinjaman_edit">Pemberi Pinjaman:</label>
                      <input type="text" class="form-control" id="pemberi_pinjaman_edit" name="pemberi_pinjaman">
                  </div>
                  <div class="form-group">
                      <label for="pagu_loan_edit">Pagu Loan:</label>
                      <input type="number" class="form-control" id="pagu_loan_edit" name="pagu_loan">
                  </div>
                  <div class="form-group">
                      <label for="mata_uang_pagu_loan_edit">Mata Uang Pagu Loan:</label>
                      <input type="text" class="form-control" id="mata_uang_pagu_loan_edit" name="mata_uang_pagu_loan">
                  </div>
                  <div class="form-group">
                      <label for="pagu_goi_edit">Pagu Goi:</label>
                      <input type="number" class="form-control" id="pagu_goi_edit" name="pagu_goi">
                  </div>
                  <div class="form-group">
                      <label for="mata_uang_pagu_goi_edit">Mata Uang Pagu Goi:</label>
                      <input type="text" class="form-control" id="mata_uang_pagu_goi_edit" name="mata_uang_pagu_goi">
                  </div>
                  <div class="form-group">
                      <label for="mata_uang_valas_edit">Mata Uang Valas:</label>
                      <input type="text" class="form-control" id="mata_uang_valas_edit" name="mata_uang_valas">
                  </div>
                  <div class="form-group">
                      <label for="kode_loan_edit">Kode LOAN:</label>
                      <input type="text" class="form-control" id="kode_loan_edit" name="kode_loan">
                  </div>
                  <div class="form-group">
                      <label for="no_registrasi_edit">No Registrasi:</label>
                      <input type="text" class="form-control" id="no_registrasi_edit" name="no_registrasi">
                  </div>
                     {{-- <div class="form-group">
                        <label for="tanggal_mulai_kontrak_edit">Tanggal Mulai Kontrak:</label>
                        <input type="date" class="form-control" id="tanggal_mulai_kontrak_edit" name="tanggal_mulai_kontrak">
                     </div>
                     <div class="form-group" id="tanggal_akhir_group_edit" style="display: none;">
                        <label for="tanggal_akhir_kontrak_edit">Tanggal Akhir Kontrak:</label>
                        <input type="date" class="form-control" id="tanggal_akhir_kontrak_edit" name="tanggal_akhir_kontrak">
                     </div> --}}
                  <input type="hidden" id="uuid_phln_edit" name="uuid_phln">
                  <input type="hidden" id="tahun_start_edit" name="tahun_start">
                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </form>                             
           </div>
       </div>
   </div>
</div>
