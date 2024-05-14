@extends('layout')

@section('content')
<div class="container">
    <!-- Tab navigasi -->
    {{-- <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'kuliah' ? 'active' : '' }}" id="bangunan-tab" data-toggle="tab" href="{{ route('manajemen_aset.bangunan', ['tab' => 'kuliah']) }}" role="tab" aria-controls="kuliah" aria-selected="true">Kuliah</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'laboratorium' ? 'active' : '' }}" id="ruang-tab" data-toggle="tab" href="{{ route('manajemen_aset.bangunan', ['tab' => 'laboratorium']) }}" role="tab" aria-controls="laboratorium" aria-selected="false">Laboratorium</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'stp' ? 'active' : '' }}" id="stp-tab" data-toggle="tab" href="{{ route('manajemen_aset.bangunan', ['tab' => 'stp']) }}" role="tab" aria-controls="stp" aria-selected="false">STP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'perpustakaan' ? 'active' : '' }}" id="perpustakaan-tab" data-toggle="tab" href="{{ route('manajemen_aset.bangunan', ['tab' => 'perpustakaan']) }}" role="tab" aria-controls="perpustakaan" aria-selected="false">Perpustakaan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'layanan_akademik' ? 'active' : '' }}" id="layanan_akademik-tab" data-toggle="tab" href="{{ route('manajemen_aset.bangunan', ['tab' => 'layanan_akademik']) }}" role="tab" aria-controls="layanan_akademik" aria-selected="false">Layanan Akademik</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'auditorium' ? 'active' : '' }}" id="auditorium-tab" data-toggle="tab" href="{{ route('manajemen_aset.bangunan', ['tab' => 'auditorium']) }}" role="tab" aria-controls="auditorium" aria-selected="false">Auditorium</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'asrama' ? 'active' : '' }}" id="asrama-tab" data-toggle="tab" href="{{ route('manajemen_aset.bangunan', ['tab' => 'asrama']) }}" role="tab" aria-controls="asrama" aria-selected="false">Asrama</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'lainnya' ? 'active' : '' }}" id="lainnya-tab" data-toggle="tab" href="{{ route('manajemen_aset.bangunan', ['tab' => 'lainnya']) }}" role="tab" aria-controls="lainnya" aria-selected="false">Lainnya</a>
        </li>
    </ul> --}}

    <!-- Isi tab -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="content" role="tabpanel" aria-labelledby="content-tab">
            <h1>Prasarana</h1>
            @yield('bangunan_table')
        </div>
    </div>
</div>
@endsection

{{-- @section('content')
<div class="container">
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item">
            <a href="" role="tab" aria-controls="bangunan" aria-selected="true">Bangunan</a>
        </li>
        <li class="nav-item">
            <a href="" role="tab" aria-controls="ruang" aria-selected="false">Ruang</a>
        </li>
    </ul>
   <div>    
    <h1>TAB DISINI</h1>
    @yield('prasarana_table')
   </div>
</div>


@endsection --}}