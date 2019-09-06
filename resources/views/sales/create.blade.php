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
    
    <p><h2 class="text-center my-3">Nueva Venta</h2> </p>
    <form onSubmit="return verificarTotal()" class="form-group" method="POST" action="/sales">
        @csrf
        <div class="form-group">
            <label for="">Seleccione el Cliente:</label>
            <select class="form-control text-success" name="client" id="client">
                @foreach($clients as $client)
                    <option value="{{$client->id}}" class="form-control input-lg text-success">{{$client->name}} - Número de Orden: {{$client->numberOfOrder}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            
            <div class="form-group col-md-6">
                <label for="">Fecha:</label>
                <input type="date" min="2019-01-01" name="date" class="form-control" value="<?php echo date("Y-m-d");?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="shortDescription"> Producto:</label>
                <input type="text" name="shortDescription" class="form-control" required>
                
            </div>
            
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Adelanto $</label>
                <input type="text" id="senia" name="senia" class="form-control" >
            </div>
        
            <div class="form-group col-md-6">
                <label for="">Total $</label>
                <input type="text" name="total" id="total" class="form-control" onBlur="verificarTotal()" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Descripcion del Producto:</label>
                <textarea name="description" id="description" style="resize: none; width: 100%;" rows="10" required></textarea>                
            </div>
        </div>
        <button type="submit"  class="btn btn-primary" >Guardar</button>
        <button type="reset" class="btn btn-secondary">Reset</button> 
    </form> 

    

@endsection