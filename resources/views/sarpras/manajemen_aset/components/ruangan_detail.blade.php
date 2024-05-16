@extends('layout')

@section('content')
<div class="wrapper">
   <div>
      <a href="{{ route('manajemen_aset.ruangan') }}" class="btn btn-secondary mb-3">
         Kembali
      </a>
   </div>
   <div class="details">
      <p><strong>ID:</strong> {{ $ruangan->kode_ruang }}</p>
      <p><strong>Nama Ruangan:</strong> {{ $ruangan->nama_ruangan }}</p>
      <p><strong>Luas Ruang:</strong> {{ $ruangan->luas_ruang }} m²</p>
      <p><strong>Lantai:</strong> {{ $ruangan->lantai }}</p>
      <p><strong>Kapasitas:</strong> {{ $ruangan->kapasitas }}</p>
      <p><strong>Tahun Perolehan:</strong> {{ $ruangan->tahun_perolehan }}</p>
      <p><strong>Kelompok Ruangan:</strong> {{ $ruangan->kelompok_ruangan }}</p>
      <p><strong>Tanggal Mulai Kontrak:</strong> {{ $ruangan->tgl_mulai_kontrak }}</p>
      <p><strong>Tanggal Selesai Kontrak:</strong> {{ $ruangan->tgl_selesai_kontrak }}</p>
      <p><strong>Nama Prasarana:</strong> {{ $ruangan->prasarana->nama_prasarana }}</p>
      <p><strong>Jenis Prasarana:</strong> {{ $ruangan->prasarana->jenis_prasarana }}</p>


   </div>
</div>

<style>
   .wrapper {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      padding: 1rem;
      background-color: #f8f9fa;
      border: 1px solid #dee2e6;
      border-radius: 0.25rem;
   }

   .btn-secondary {
      color: #fff;
      background-color: #6c757d;
      border-color: #6c757d;
      text-decoration: none;
      padding: 0.375rem 0.75rem;
      border-radius: 0.25rem;
      display: inline-block;
   }

   .btn-secondary:hover {
      background-color: #5a6268;
      border-color: #545b62;
   }

   .details p {
      margin: 0.5rem 0;
      font-size: 1rem;
   }

   .details strong {
      display: inline-block;
      width: 180px;
      color: #343a40;
   }
</style>
@endsection
