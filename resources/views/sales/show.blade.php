@extends('layouts.app')

@section('title', 'Show for  Number of Order')

@section('content')
    <h1 class="text-center mt-3 mb-4">Pedido</h1>
    <form class="form-group" method="POST" action="/sales" >
        @csrf
        
        <div class="form-row">
            <div class="form-group col-lg-3 offset-lg-3">
                <label for="" class="font-weight-bold">Cliente:  {{$client->name}},       N° de Orden: {{$sale->numberOfOrder}}  </label>
            </div>
            <div class="form-group col-lg-3">
                <label for="" class="font-weight-bold"> Fecha: {{date('d-m-Y',strtotime($sale->created_at))}}  </label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-3 offset-lg-3">
                <label for="" class="font-weight-bold">Adelanto: $ {{$sale->senia}}</label>
            </div>
            <div class="form-group col-lg-3">
            <label for="" class="font-weight-bold">Total: ${{$sale->total}}</label>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-lg-6 offset-lg-3">
                <label for="" class="font-weight-bold">Descripcion del Producto:</label>
                <br>
                <textarea name="description" class="form-control form-control-lg n-resize" rows="5" value="" disabled> {{$sale->description}}</textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 offset-lg-3">
            <a href="/accounts/{{$sale->client_id}}">
             <input type="button" value="Volver" class="btn btn-danger btn-block" name="Volver">
            </a>
        </div>
        </div>
        
    </form>
@endsection