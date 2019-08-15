@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
    <p><h1 class="text-center my-3">Nuevo Categoria</h1> </p>
    
    <form class="form-group mt-5 "  method="POST" action="/categories">
        @csrf
        <div class="form row">
            <div class="form-group col-md-6">
                <label for="name">Nombre de la Categoria </label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
                
            </div>
            
        </div>
        <div class="form row">
            <div class="form-group col-md-6">
                <label for="description">Descripcion</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Descripcion" >
            </div>
            
        </div>
        
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a href="/categories" class="btn btn-danger">Volver</a>
    </form>
    
@endsection