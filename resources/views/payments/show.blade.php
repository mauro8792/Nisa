@extends('layouts.app')

@section('title', 'Show Payment')

@section('content')
    <h1 class="text-center my-4">Informacion De Pago</h1> 
        @csrf
        <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3">
                <div class="form-group">
                    <label for="" class="font-weight-bold">Descripcion:</label>
                    <input type="text" name="description" class="form-control" value="{{$pago->description}}" disabled>
                </div>
                <div class="form-group">
                    <label for="" class="font-weight-bold">Fecha:</label>
                    <input type="text" name="date" class="form-control" value={{date('d-m-Y',strtotime($pago->created_at))}} disabled> 
                </div>
                <div class="form-group">
                    <label for=""  class="font-weight-bold">Importe de pago:</label>
                    <input type="text" name="payment" class="form-control" value="{{$pago->payment}}" disabled>
                </div>
                
                <a href="/accounts/{{$pago->client_id}}">
                    <input type="button" value="Volver" class="btn btn-danger btn-block mt-4 mt-lg-5" style="color: white" name="Volver">
                </a>        
            </div>
        </div> 
@endsection