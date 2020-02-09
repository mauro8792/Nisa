@extends('layouts.app')

@section('title', 'Edit Sale')

@section('content')
    
<form class="form-group" method="POST" action="/sales/{{$sale->id}}" >
        @method('put')
        @csrf
        <div class="container">
            
        
        <h1 class="text-center my-4">Estado de Pedido</h1>
        
        <div class="form-row">

            <div class="form-group col-md-3 offset-md-3">
                <label for="" class="font-weight-bold">Cliente: {{$client->name}} N° de Orden: {{$sale->numberOfOrder}}  </label>
            </div>
            <div class="form-group col-md-3">
                <label for=""  class="font-weight-bold"> Fecha: {{date('d-m-Y',strtotime($sale->created_at))}}  </label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3 offset-md-3">
                <label for="" class="font-weight-bold">Adelanto: $ {{$sale->senia}}</label>
            </div>
            <div class="form-group col-md-3">
                <label for="" class="font-weight-bold">Total: ${{$sale->total}}</label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3  offset-md-3">
                <label for=""  class="font-weight-bold">Estado del Pedido: {{$sale->state}} </label>
                <select class="custom-select" name="state" id="state" >
                    <option value="Solicitado"> Solicitado</option>
                    <option value="En Proceso"> En Proceso</option>
                    <option value="Finalizado"> Finalizado</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for=""  class="font-weight-bold">Producto: {{$sale->shortDescription}}</label>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6  offset-md-3">
                <label for=""  class="font-weight-bold">Descripcion del Producto:</label>
                <br>
                <textarea class="form-control n-resize"   name="description" rows="5" value="" disabled> {{$sale->description}}</textarea>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-3  offset-md-3">
                <a href="/sales">
                <input type="button" value="Volver" class="btn btn-danger btn-block" name="button">
                </a>
            </div>
            <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
            </div>
        </div>
        </div>
    </form>
@endsection