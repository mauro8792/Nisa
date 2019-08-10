@extends('layouts.app')

@section('title', 'Create Payment')

@section('content')
    <p>Payment: </p>
    <form class="form-group" method="POST" action="/payments">
        @csrf
        <div class="form-group">
            <label for="">Cliente</label>
            <input type="text" name="description"  value="{{$cliente->name}}" class="form-control" disabled>
            <input type="hidden" name="client_id"  value="{{$cliente->id}}" >
            
        </div>
        <div class="form-group">
            <label for="">Saldo total</label>
            <input type="text" name="description"  value="{{$account->accountTotal}}" class="form-control" disabled>
            
        </div>
        <div class="form-group">
            <label for="">Forma de pago</label>
            <select class="form-control text-success" name="paymentForm" id="payment_form">
               <option value="Efectivo" class="form-control input-lg text-success">Efectivo</option>
               <option value="Cheque" class="form-control input-lg text-success">Cheque</option>
               
            </select>
        </div>
        <div class="form-group">
            <label for="">Descripcion</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label for="">date</label>
            <input type="date" name="date" class="form-control" value="<?php echo date("Y-m-d");?>">
        </div>
        <div class="form-group">
            <label for="">payment</label>
            <input type="text" name="payment" class="form-control">
        </div>
        
        
        
        

        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form> 

@endsection