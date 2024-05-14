<!-- Modal Tambah -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="tambahModalLabel">Tambah Sarana</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- Form Tambah -->
               <form action="" method="POST" id="formTambahSarana">
                  {{-- @csrf --}}
                  <div class="form-group">
                      <label for="nama_universitas">Nama Universitas:</label>
                      <select class="form-control" id="nama_universitas" name="nama_universitas">
                          <option value="universitas_a">Universitas A</option>
                          <option value="universitas_b">Universitas B</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="bangunan">Bangunan:</label>
                      <select class="form-control" id="bangunan" name="bangunan">
                          <option value="bangunan_a">Bangunan A</option>
                          <option value="bangunan_b">Bangunan B</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="ruangan">Ruangan:</label>
                      <select class="form-control" id="ruangan" name="ruangan">
                          <option value="ruangan_a">Ruangan A</option>
                          <option value="ruangan_b">Ruangan B</option>
                      </select>
                  </div>
                  <div class="form-group">
                     <label for="skema_biaya">Skema Biaya:</label>
                     <select class="form-control" id="skema_biaya" name="skema_biaya">
                         <option value="PHLN">PHLN</option>
                         <option value="SBSN">SBSN</option>
                     </select>
                 </div>
                  <div id="saranaContainer">
                      <!-- Sarana akan ditambahkan di sini -->
                  </div>
                  <button type="button" class="btn btn-success" id="btnTambahSarana">Tambah Sarana</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
           </div>
       </div>
   </div>
</div>

<script>
   $(document).ready(function() {
       var counter = 0;

       $('#btnTambahSarana').click(function() {
           counter++;

           var saranaHtml = `
               <div class="card mb-2" id="sarana${counter}">
                   <div class="card-body">
                       <div class="form-group">
                           <label for="nama_sarana${counter}">Nama Sarana:</label>
                           <input type="text" class="form-control" id="nama_sarana${counter}" name="nama_sarana[]">
                       </div>
                       <div class="form-group">
                           <label for="jenis_sarana${counter}">Jenis Sarana:</label>
                           <input type="text" class="form-control" id="jenis_sarana${counter}" name="jenis_sarana[]">
                       </div>
                       <div class="form-group">
                           <label for="tanggal_perolehan${counter}">Tanggal Perolehan:</label>
                           <input type="date" class="form-control" id="tanggal_perolehan${counter}" name="tanggal_perolehan[]">
                       </div>
                       <div class="form-group">
                           <label for="nilai_perolehan${counter}">Nilai Perolehan:</label>
                           <input type="text" class="form-control" id="nilai_perolehan${counter}" name="nilai_perolehan[]">
                       </div>
                       <div class="form-group">
                           <label for="kondisi${counter}">Kondisi:</label>
                           <input type="text" class="form-control" id="kondisi${counter}" name="kondisi[]">
                       </div>
                       <div class="form-group">
                           <label for="status${counter}">Status:</label>
                           <input type="text" class="form-control" id="status${counter}" name="status[]">
                       </div>
                       <div class="form-group">
                           <label for="jumlah_barang${counter}">Jumlah Barang:</label>
                           <input type="number" class="form-control" id="jumlah_barang${counter}" name="jumlah_barang[]">
                        </div>
                       <button type="button" class="btn btn-danger btnHapusSarana" data-counter="${counter}">Hapus Sarana</button>
                   </div>
               </div>
           `;

           $('#saranaContainer').append(saranaHtml);
       });

       $(document).on('click', '.btnHapusSarana', function() {
           var counter = $(this).data('counter');
           $('#sarana' + counter).remove();
       });
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