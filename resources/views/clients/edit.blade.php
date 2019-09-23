@extends('layouts.app')

@section('title', 'Edit client')

@section('content')
    @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg)) 
    
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Cuidado! </strong>{{ Session::get('alert-' . $msg) }} ×
    </div>
    @endif @endforeach
    <p><h1 class="text-center my-3">Editar Cliente:</h1> </p>
    
<form class="form-group mt-5"  method="POST" action="/clients/{{$client->slug}}">
        @method('put')
        @csrf
        <div class="form-row">
            <div class="form-group col-lg-6">
                <label for="name" class="font-weight-bold">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$client->name}}" required>
                
            </div>
            <div class="form-group col-lg-6">
                <label for="lastname" class="font-weight-bold">Apellido</label>
                <input type="text" class="form-control" name="lastname" id="lastname" value="{{$client->lastname}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$client->email}}" >
            </div>
            <div class="form-group col-lg-6">
                <label for="telephone" class="font-weight-bold">Telefono</label>
                <input type="text" class="form-control" name="telephone" id="telephone" value="{{$client->telephone}}" >
            </div>
        </div>
        <input type="hidden" name="numberOfOrder" value="{{$client->numberOfOrder}}">
        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="/clients" class="btn btn-danger">Volver</a>
    </form>
    
@endsection