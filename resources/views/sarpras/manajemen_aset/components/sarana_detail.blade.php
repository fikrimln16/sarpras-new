@extends('layout')

@section('content')
<div class="wrapper">
    <div>
        <a href="{{ route('manajemen_aset.sarana') }}" class="btn btn-secondary mb-3">
            Kembali
        </a>
    </div>
    <div class='details'>
    <p><strong>ID:</strong> {{ $sarana->id }}</p>
        <p><strong>Nama Sarana:</strong> {{ $sarana->nama_sarana }}</p>
        <p><strong>Kategori:</strong> {{ $sarana->kategori }}</p>
        <p><strong>Jenis Sarana:</strong> {{ $sarana->jenis_sarana }}</p>
        <p><strong>Spesifikasi:</strong> {{ $sarana->spesifikasi }}</p>
        <p><strong>Tanggal Perolehan:</strong> {{ $sarana->tanggal_perolehan }}</p>
        <p><strong>Tahun Produksi:</strong> {{ $sarana->tahun_produksi }}</p>
        <p><strong>Nilai Perolehan:</strong> {{ $sarana->nilai_perolehan }}</p>
        <p><strong>Nilai Buku:</strong> {{ $sarana->nilai_buku }}</p>
        <p><strong>Tanggal Hapus Buku:</strong> {{ $sarana->tanggal_hapus_buku }}</p>

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