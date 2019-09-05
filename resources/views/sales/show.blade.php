@extends('layouts.app')

@section('title', 'Show for  Number of Order')

@section('content')
    <br>
    <form class="form-group" method="POST" action="/sales" >
        @csrf
        
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">CLiente:  {{$client->name}},       N° de Orden: {{$sale->numberOfOrder}}  </label>
            </div>
            <div class="form-group col-md-3">
                <label for=""> Fecha: {{date('d-m-Y',strtotime($sale->created_at))}}  </label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">Adelanto: $ {{$sale->senia}}</label>
            </div>
            <div class="form-group col-md-3">
            <label for="">Total: ${{$sale->total}}</label>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="" >Descripcion del Producto:</label>
                <br>
                <textarea name="description"  cols="75" rows="10" value="" disabled> {{$sale->description}}</textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <a href="/accounts/{{$sale->client_id}}">
             <input type="button" value="Volver" class="btn btn-danger btn-block" style="color: white" name="Volver">
            </a>
        </div>
        </div>
        
    </form>
@endsection