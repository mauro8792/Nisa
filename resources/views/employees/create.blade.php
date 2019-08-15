@extends('layouts.app')

@section('title', 'Create Employee')

@section('content')
    <p><h1 class="text-center my-3">Nuevo Empleado:</h1> </p>
    
    <form class="form-group mt-5"  method="POST" action="/employees">
        @csrf
        <div class="form row">
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
                <label for="adress">Dirección</label>
                <input type="text" class="form-control" name="adress" id="adress" placeholder="Direccion" >
            </div>
            <div class="form-group col-md-6">
                <label for="telephone">Telefono </label>
                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Teléfono" required>
            </div>
        </div>
        <div class="form row">
            <div class="form-group col-md-6">
                <label for="starDate">Fecha de inicio</label>
                <input type="date" class="form-control" name="starDate" id="starDate" placeholder="Fecha de Inicio" >
            </div>
            <div class="form-group col-md-6">
                <label for="salary">Salario </label>
                <input type="number" class="form-control" name="salary" id="salary" placeholder="Salario" required>
            </div>
        </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
  <a href="/clients" class="btn btn-danger">Volver</a>
    </form>
    
@endsection