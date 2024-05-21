@extends('layout')

@section('title', 'Inventaris')

@section('content')
<div class="content">
   
    <ul class="nav nav-underline">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('manajemen_aset.inventaris') ? 'active' : '' }}" aria-current="page" href="{{ route('manajemen_aset.inventaris') }}">Ruang-Dosen</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('manajemen.aset.inventaris.index_ruang_sarana') ? 'active' : '' }}" aria-current="page" href="{{ route('manajemen.aset.inventaris.index_ruang_sarana') }}">Ruang-Sarana</a>
        </li>
    </ul>
    <!-- Isi tab -->
    <div>
        @yield('inventaris_table')
    </div>
</div>

<style>
   .nav-link {
        color: black !important; /* Ensures the text color is black */
    }
    .nav-link.active {
        font-weight: bold; /* Optional: Makes the active link bold */
        border-bottom: 2px solid black; /* Optional: Adds an underline to the active link */
    }
    .nav-link:hover {
        color: black !important; /* Ensures the text color remains black on hover */
    }
</style>
@endsection