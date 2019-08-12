@extends('layouts.app')

@section('title', 'Create Sale')

@section('content')
    <form class="form-group" method="POST" action="/sales">
        @csrf
        <div class="form-group">
            <label for="">Seleccione el Cliente</label>
            <select class="form-control text-success" name="client" id="client">
                @foreach($clients as $client)
                    <option value="{{$client->id}}" class="form-control input-lg text-success">{{$client->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Descripcion del Producto:</label>
                <input type="text" name="description" class="form-control" required>
                <i class=”fa fa-camera-retro fa-lg“></i> 
            </div>
            <div class="form-group col-md-6">
                <label for="">Fecha:</label>
                <input type="date" name="date" class="form-control" value="<?php echo date("Y-m-d");?>" required>
            </div>
        </div>
        
        <div class="form row">
            <div class="form-group col-md-6">
                <label for="">Adelanto $</label>
                <input type="text" name="senia" class="form-control" required>
            </div>
        
            <div class="form-group col-md-6">
                <label for="">Total $</label>
                <input type="text" name="total" class="form-control" required>
            </div>
        </div>

       
        
        

        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form> 

@endsection