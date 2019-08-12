@extends('layouts.app')

@section('title', 'Create client')

@section('content')
    <p><h1 class="text-center my-3">Nuevo Cliente:</h1> </p>
    
    <form class="form-group mt-5"  method="POST" action="/clients">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
                
            </div>
            <div class="form-group col-md-6">
                <label for="lastname">Apellido</label>
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellido" required>
            </div>
        </div>
        <div class="form row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-group col-md-6">
                <label for="telephone">Telefono </label>
                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Teléfono" required>
            </div>
        </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a href="/clients" class="btn btn-danger">Volver</a>
    </form>
    
@endsection