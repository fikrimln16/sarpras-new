@extends('layout')

@section('content')
<div class="wrapper">
   <div>
      <a href="{{ route('manajemen_aset.prasarana') }}">
         Kembali
      </a>
   </div>
   <div>
      <p><strong>ID:</strong> {{ $prasarana->id }}</p>
      <p><strong>Nama Prasarana:</strong> {{ $prasarana->nama_prasarana }}</p>
      <p><strong>Jenis Prasarana:</strong> {{ $prasarana->jenis_prasarana }}</p>
      <p><strong>Alamat:</strong> {{ $prasarana->alamat }}</p>
      <p><strong>Latitude:</strong> {{ $prasarana->latitude }}</p>
      <p><strong>Longitude:</strong> {{ $prasarana->longitude }}</p>
      <p><strong>Panjang:</strong> {{ $prasarana->panjang }}</p>
      <p><strong>Lebar:</strong> {{ $prasarana->lebar }}</p>
      <p><strong>Luas Bangunan:</strong> {{ $prasarana->luas_bangunan }}</p>
      <p><strong>Luas Tanah:</strong> {{ $prasarana->luas_tanah }}</p>
      <p><strong>Jumlah Lantai:</strong> {{ $prasarana->jumlah_lantai }}</p>
      <p><strong>Objek Infrastruktur:</strong> {{ $prasarana->objek_infrastruktur }}</p>
      <p><strong>BMN Satker:</strong> {{ $prasarana->BMN_satker }}</p>
      <p><strong>BMN Kode Barang:</strong> {{ $prasarana->BMN_kode_barang }}</p>
      <p><strong>BMN NUP:</strong> {{ $prasarana->BMN_nup }}</p>
      <p><strong>Tanggal Perolehan:</strong> {{ $prasarana->tanggal_perolehan }}</p>
      <p><strong>Nilai Perolehan:</strong> {{ $prasarana->nilai_perolehan }}</p>
      <p><strong>Nilai Buku:</strong> {{ $prasarana->nilai_buku }}</p>
      <p><strong>Merk:</strong> {{ $prasarana->merk }}</p>
      <p><strong>KD KAB KOTA:</strong> {{ $prasarana->KD_KAB_KOTA }}</p>
      <p><strong>NM KAB KOTA:</strong> {{ $prasarana->NM_KAB_KOTA }}</p>
      <p><strong>KD PROV:</strong> {{ $prasarana->KD_PROV }}</p>
      <p><strong>NM PROV:</strong> {{ $prasarana->NM_PROV }}</p>
      <p><strong>Penggunaan:</strong> {{ $prasarana->penggunaan }}</p>
      <p><strong>Kondisi:</strong> {{ $prasarana->kondisi }}</p>
      <p><strong>NO DOK KEPEMILIKAN:</strong> {{ $prasarana->NO_DOK_KEPEMILIKAN }}</p>
      <p><strong>DOK KEPEMILIKAN:</strong> {{ $prasarana->DOK_KEPEMILIKAN }}</p>
      <p><strong>JNS DOK KEPEMILIKAN:</strong> {{ $prasarana->JNS_DOK_KEPEMILIKAN }}</p>
      <p><strong>KD SATKER TANAH:</strong> {{ $prasarana->KD_SATKER_TANAH }}</p>
      <p><strong>NM SATKER TANAH:</strong> {{ $prasarana->NM_SATKER_TANAH }}</p>
      <p><strong>KD BRG TANAH:</strong> {{ $prasarana->KD_BRG_TANAH }}</p>
      <p><strong>NM BRG TANAH:</strong> {{ $prasarana->NM_BRG_TANAH }}</p>
      <p><strong>NUP BRG TANAH:</strong> {{ $prasarana->NUP_BRG_TANAH }}</p>
      <p><strong>TGL SK PEMAKAIAN:</strong> {{ $prasarana->TGL_SK_PEMAKAIAN }}</p>
      <p><strong>Kapasitas:</strong> {{ $prasarana->kapasitas }}</p>
      <p><strong>Tanggal Hapus Buku:</strong> {{ $prasarana->tanggal_hapus_buku }}</p>
      <p><strong>Keterangan:</strong> {{ $prasarana->keterangan }}</p>
   </div>
</div>



<style>
   .wrapper {
      display: flex;
      flex-direction: column;
   }
</style>


@endsection