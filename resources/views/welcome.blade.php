@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
   <div class="flex-center position-ref full-height fondo">
            @if (Route::has('login'))
              {{-- si esta logeado va aqui --}}
            @endif

            <div class="content">
                {{-- si no  esta logeado va aqui --}}
            </div>
        </div>
   

@endsection
