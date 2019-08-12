@extends('layouts.app')

@section('title', 'Show Payment')

@section('content')
    <p>Payment: </p>
        @csrf
        <div class="form-group">
            <label for="">Descripcion</label>
        <input type="text" name="description" class="form-control0" value="{{$pago->description}}" disabled>
        </div>
        <div class="form-group">
            <label for="">date</label>
        <input type="text" name="date" class="form-control" value={{date('d-m-Y',strtotime($pago->created_at))}} disabled>
        
        </div>
        <div class="form-group">
            <label for="">payment</label>
            <input type="text" name="payment" class="form-control" value="{{$pago->payment}}" disabled>
        </div>
        
        
        
        

        <a href="/accounts/{{$pago->client_id}}">
            <input type="button" value="Volver" class="btn btn-danger btn-block" style="color: white" name="Volver">
        </a>
        
     

@endsection