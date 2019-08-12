@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
   <div class="flex-center position-ref full-height fondo">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                
            </div>
        </div>
   

@endsection
