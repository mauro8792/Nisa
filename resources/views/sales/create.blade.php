@extends('layouts.app')

@section('title', 'Create Sale')

@section('content')
    <script>
        function verificarTotal() {
            var sw=true;
            senia = parseInt(document.getElementsByName("senia")[0].value);
            total = parseInt(document.getElementsByName('total')[0].value);
           
            if(senia>total){
                alert("La Senia no puede ser más que el Total");
                document.getElementById("senia").focus();
                sw=false;
            }
            
            return (sw);
            
        }
       
    </script>
    
    <p><h2 class="text-center my-2">Nueva Venta</h2> </p>
    <form onSubmit="return verificarTotal()" class="form-group" method="POST" action="/sales">
        @csrf
        <div class="form-group">
            <label for="" class="font-weight-bold">Seleccione el Cliente:</label>
            <select class="form-control text-success" name="client" id="client">
                @foreach($clients as $client)
                    <option value="{{$client->id}}" class="form-control input-lg text-success">{{$client->name}} - Número de Orden: {{$client->numberOfOrder}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6">
                <label for="" class="font-weight-bold">Fecha:</label>
                <input type="date" min="2019-01-01" name="date" class="form-control" value="<?php echo date("Y-m-d");?>" required>
            </div>
            <div class="form-group col-lg-6">
                <label for="shortDescription" class="font-weight-bold"> Producto:</label>
                <input type="text" name="shortDescription" class="form-control" required>
                
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6">
                <label for="" class="font-weight-bold">Adelanto $</label>
                <input type="text" id="senia" name="senia" class="form-control" >
            </div>
            <div class="form-group col-lg-6">
                <label for="" class="font-weight-bold">Total $</label>
                <input type="text" name="total" id="total" class="form-control" onBlur="verificarTotal()" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6">
                <label for="" class="font-weight-bold">Descripcion del Producto:</label>
                <textarea name="description" id="description" class="form-control form-control-lg n-resize"  rows="3" required></textarea>                
            </div>
        </div>
        <div class="form-row">
            <div class="col-6">
                <button type="submit"  class="btn btn-primary btn-block">Guardar</button>
            </div>
            <div class="col-6">
                <button type="reset" class="btn btn-secondary btn-block">Reset</button> 
            </div>
        </div>
        
        
    </form> 

    

@endsection