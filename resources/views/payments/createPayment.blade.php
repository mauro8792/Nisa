@extends('layouts.app')

@section('title', 'Create Payment')

@section('content')
    <h1 class="text-center my-lg-3">Nuevo pago</h1>
    <form class="form-group" method="POST" action="/payments">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Cliente</label>
                        <input type="text" name="description"  value="{{$cliente->name}}" class="form-control" disabled>
                        <input type="hidden" name="client_id"  value="{{$cliente->id}}" >
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Saldo total</label>
                        <input type="text" name="description"  value="{{$account->accountTotal}}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Forma de pago</label>
                        <select class="form-control text-success" name="paymentForm" id="payment_form">
                           <option value="Efectivo" class="form-control input-lg text-success">Efectivo</option>
                           <option value="Cheque" class="form-control input-lg text-success">Cheque</option>
                           
                        </select>
                    </div>
                </div>
                 <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Descripcion</label>
                        <input type="text" name="description" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Fecha</label>
                        <input type="date" name="date" class="form-control" value="<?php echo date("Y-m-d");?>" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Pago</label>
                        <input type="text" name="payment" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                </div>
                <div class="col-6">
                    <a href="/clients" class="btn btn-danger btn-block">Volver</a>
                </div>
            </div>
        </div>
    </form> 
@endsection