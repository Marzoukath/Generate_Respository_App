@extends('layouts.app')

@section('any')

@if(\Request::is('accueil'))
    @auth
        @include('layouts.navbars.auth.sidebar')
        <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg overflow-hidden">
            @include('layouts.navbars.auth.nav')
            <div class="container-fluid py-4">
                @yield('content')
            </div>
        </main>
    @endauth
    @guest
        @include('layouts.navbars.guest.nav')
            @yield('content')
        @include('layouts.footers.guest.footer')
    @endguest
    
@elseif(\Request::is('insert_citizens')) 
    @include('layouts.navbars.guest.nav')
    @yield('content')
    @include('layouts.footers.guest.footer')
@endif

@endsection
