@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
    <p><h1 class="text-center my-3">Nuevo Categoria</h1> </p>
    
    <form class="form-group mt-5"  method="POST" action="/categories">
        @csrf
        <div class="form-row">
            <div class="form-group col-lg-6 offset-lg-3">
                <label for="name" class="font-weight-bold">Nombre de la Categoria </label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 offset-lg-3">
                <label for="description" class="font-weight-bold">Descripcion</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Descripcion" required >
            </div>
        </div>
        <div class="form-row">
            <div class="col-6 col-lg-3 offset-lg-3">
                <button type="submit" class="btn btn-primary btn-block">Guardar</button>          
            </div>
            <div class="col-6 col-lg-3">
                <a href="/categories" class="btn btn-danger btn-block">Volver</a>                        
            </div>
  
  
        </div>
        
  
    </form>
    
@endsection