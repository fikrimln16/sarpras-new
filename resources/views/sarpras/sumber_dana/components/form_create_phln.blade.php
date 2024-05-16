<!-- Form PHLN -->
<div class="modal fade" id="modalPHLN" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="tambahModalLabel">Tambah PHLN</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- Form Tambah -->
               <form id="myForm" action="{{ route('perolehan_aset.tambah_phln') }}" method="POST">
                @csrf   
                <div class="form-group">
                       <label for="nama_proyek">Nama Proyek:</label>
                       <input type="text" class="form-control" id="nama_proyek" name="nama_proyek">
                   </div>
                   <div class="form-group">
                       <label for="singkatan_proyek">Singkatan Proyek:</label>
                       <input type="text" class="form-control" id="singkatan_proyek" name="singkatan_proyek">
                   </div>
                   <div class="form-group">
                       <label for="pemberi_pinjaman">Pemberi Pinjaman:</label>
                       <input type="text" class="form-control" id="pemberi_pinjaman" name="pemberi_pinjaman">
                   </div>
                   <div class="form-group">
                       <label for="jenis_kontrak_phln">Jenis Kontrak:</label>
                       <select class="form-select" id="jenis_kontrak_phln" name="jenis_kontrak" onchange="toggleTanggalAkhirPHLN()">
                           <option value="single_year">Single Year</option>
                           <option value="multi_year">Multi Year</option>
                       </select>
                   </div>
                   <div class="form-group">
                       <label for="tanggal_mulai_kontrak">Tanggal Mulai Kontrak:</label>
                       <input type="date" class="form-control" id="tanggal_mulai_kontrak" name="sign_date">
                   </div>
                   <div class="form-group" id="tanggal_akhir_group_phln" style="display: none;">
                       <label for="tanggal_akhir_kontrak">Tanggal Akhir Kontrak:</label>
                       <input type="date" class="form-control" id="tanggal_akhir_kontrak" name="closed_date">
                   </div>
                   <div class="form-group">
                       <label for="currency">Currency:</label>
                       <select class="form-select" id="currency" name="mata_uang_pagu_loan">
                           <option value="IDR">IDR</option>
                           <option value="USD">USD</option>
                           <option value="EUR">EUR</option>
                       </select>
                   </div>
                   <div class="form-group">
                       <label for="nilai_pagu_loan">Nilai Pagu Loan:</label>
                       <input type="number" class="form-control" id="nilai_pagu_loan" name="pagu_loan">
                   </div>
                   <div class="form-check">
                       <input class="form-check-input" type="checkbox" value="" id="showAdditionalForm">
                       <label class="form-check-label" for="showAdditionalForm">
                           Nilai Pagu GOI:
                       </label>
                   </div>
                   <div id="additionalForm" style="display: none;">
                       <!-- Form tambahan -->
                       <div class="form-group">
                           <label for="currency">Currency:</label>
                           <select class="form-select" id="currency" name="mata_uang_pagu_goi">
                               <option value="IDR">IDR</option>
                               <option value="USD">USD</option>
                               <option value="EUR">EUR</option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="nilai_pagu_goi">Nilai Pagu GOI:</label>
                           <input type="number" class="form-control" id="nilai_pagu_goi" name="pagu_goi">
                       </div>
                   </div>
                   <div id="universitasContainer"></div>
                  <button type="button" class="btn btn-warning" id="tambahUniversitasBtn">Tambah Universitas</button>
                 <button type="submit" class="btn btn-primary">Simpan</button>
               </form>                
           </div>
       </div>
   </div>
</div>
<script>
   // Hapus elemen pertama
   $('.universitas-group').first().remove();

   // Tambah universitas
   $('#tambahUniversitasBtn').click(function () {
       var newUniversitasGroup = $('<div class="form-group universitas-group">' +
           '<label for="universitas">Universitas:</label>' +
           '<select class="form-select" id="universitas" name="universitas[]">' +
           '<option value="UI">Universitas Indonesia</option>' +
           '<option value="UGM">Universitas Gadjah Mada</option>' +
           '</select>' +
           '<label for="pagu_loan">Pagu Loan:</label>' +
           '<input type="number" class="form-control" id="pagu_loan" name="pagu_loan[]">' +
           '<label for="mata_uang">Mata Uang:</label>' +
           '<select class="form-select" id="mata_uang" name="mata_uang[]">' +
           '<option value="IDR">IDR</option>' +
           '<option value="USD">USD</option>' +
           '</select>' +
           '<button type="button" class="btn btn-danger btn-sm delete-btn">Delete</button>' +
           '</div>');
       $('#universitasContainer').append(newUniversitasGroup);
   });

   // Hapus universitas
   $(document).on('click', '.delete-btn', function () {
       $(this).closest('.universitas-group').remove();
   });

   // Batalkan penambahan
   $('#cancelBtn').click(function () {
       $('.universitas-group:not(:first-child)').remove();
   });
</script>