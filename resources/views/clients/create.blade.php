@extends('layouts.app')

@section('title', 'Create client')

@section('content')
    @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg)) 
    
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Cuidado! </strong>{{ Session::get('alert-' . $msg) }} ×
    </div>
    @endif @endforeach
    <p><h1 class="text-center my-3">Nuevo Cliente:</h1> </p>
    
    <form class="form-group mt-5"  method="POST" action="/clients">
        @csrf
        <div class="form-row">
            <div class="form-group col-lg-6">
                <label for="name" class="font-weight-bold">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
                
            </div>
            <div class="form-group col-lg-6">
                <label for="lastname" class="font-weight-bold">Apellido</label>
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellido">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" >
            </div>
            <div class="form-group col-lg-6">
                <label for="telephone" class="font-weight-bold">Telefono</label>
                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Teléfono" >
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="/clients" class="btn btn-danger">Volver</a>
    </form>
    
@endsection