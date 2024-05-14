<div class="container mt-5">
   <h2>Create New Prasarana</h2>
   <form action="{{ route('manajemen_aset.prasarana.create') }}" method="POST">
       @csrf
       <div class="form-group">
           <label for="namaPrasarana">Nama Prasarana:</label>
           <input type="text" class="form-control" id="namaPrasarana" name="nama_prasarana" required>
       </div>
       <div class="form-group">
           <label for="panjang">Panjang (m):</label>
           <input type="number" step="0.1" class="form-control" id="panjang" name="panjang" required>
       </div>
       <div class="form-group">
           <label for="lebar">Lebar (m):</label>
           <input type="number" step="0.1" class="form-control" id="lebar" name="lebar" required>
       </div>
       <div class="form-group">
           <label for="luas_bangunan">Luas (m²):</label>
           <input type="number" step="0.1" class="form-control" id="luas_bangunan" name="luas_bangunan" required>
       </div>
       <div class="form-group">
           <label for="alamat">Alamat:</label>
           <input type="text" class="form-control" id="alamat" name="alamat" required>
       </div>
       <div class="form-group">
           <label for="lintang">Lintang:</label>
           <input type="text" class="form-control" id="latitude" name="latitude" required>
       </div>
       <div class="form-group">
           <label for="bujur">Bujur:</label>
           <input type="text" class="form-control" id="longitude" name="longitude" required>
       </div>
       <div class="form-group">
           <label for="bmnSatker">BMN Satker:</label>
           <input type="text" class="form-control" id="BMN_satker" name="BMN_satker" required>
       </div>
       <div class="form-group">
           <label for="bmnKodeBarang">BMN Kode Barang:</label>
           <input type="text" class="form-control" id="BMN_kode_barang" name="BMN_kode_barang" required>
       </div>
       <div class="form-group">
           <label for="bmnNup">BMN NUP:</label>
           <input type="number" class="form-control" id="BMN_nup" name="BMN_nup" required>
       </div>
       <div class="form-group">
           <label for="tanggalPerolehan">Tanggal Perolehan:</label>
           <input type="date" class="form-control" id="tanggal_perolehan" name="tanggal_perolehan" required>
       </div>
       <div class="form-group">
           <label for="nilaiPerolehan">Nilai Perolehan (Rp):</label>
           <input type="number" class="form-control" id="nilai_perolehan" name="nilai_perolehan" required>
       </div>
       <div class="form-group">
           <label for="nilaiBuku">Nilai Buku (Rp):</label>
           <input type="number" class="form-control" id="nilai_buku" name="nilai_buku" required>
       </div>
       <div class="form-group">
           <label for="merk">MERK:</label>
           <input type="text" class="form-control" id="merk" name="merk" required>
       </div>
       <button type="submit" class="btn btn-primary">Submit</button>
   </form>
</div>