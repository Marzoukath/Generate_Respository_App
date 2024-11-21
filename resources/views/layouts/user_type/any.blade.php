@extends('layouts.app')

@section('any')

@if(\Request::is('accueil')) 
    @include('layouts.navbars.guest.nav')
    @yield('content')
    @include('layouts.footers.guest.footer')
@elseif(\Request::is('insert_citizens')) 
    @include('layouts.navbars.guest.nav')
    @yield('content')
    @include('layouts.footers.guest.footer')
@endif

@endsection
