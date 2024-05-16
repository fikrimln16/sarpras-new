@extends('layout')

@section('content')

<div class="content">
    <!-- Tab navigasi -->
    <!-- <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item">
            <a href="{{route('manajemen_aset.prasarana')}}" role="tab" aria-controls="bangunan" aria-selected="true">Bangunan</a>
        </li>
        <li class="nav-item">
            <a href="{{route('manajemen_aset.ruangan')}}" role="tab" aria-controls="ruang" aria-selected="false">Ruang</a>
        </li>
    </ul> -->
    <ul class="nav nav-underline">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('manajemen_aset.prasarana') ? 'active' : '' }}" aria-current="page" href="{{ route('manajemen_aset.prasarana') }}">Prasarana</a>
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


@endsection