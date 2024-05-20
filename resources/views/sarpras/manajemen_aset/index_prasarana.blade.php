@extends('layout')

@section('title', 'Prasarana')

@section('content')

<div class="content">
   
    <ul class="nav nav-underline">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('manajemen_aset.tanah') ? 'active' : '' }}" aria-current="page" href="{{ route('manajemen_aset.tanah') }}">Tanah</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('manajemen_aset.prasarana') ? 'active' : '' }}" aria-current="page" href="{{ route('manajemen_aset.prasarana') }}">Bangunan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('manajemen_aset.ruangan') ? 'active' : '' }}" href="{{ route('manajemen_aset.ruangan') }}">Ruangan</a>
        </li>
    </ul>
    <!-- Isi tab -->
    <div>
        @yield('prasarana_table')
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