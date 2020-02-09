@extends('layouts.app')

@section('title', 'Create Expenses')

@section('content')

    <p><h1 class="text-center mt-5 mb-3">Nuevo Gasto</h1> </p>
    <form class="form-group" method="POST" action="/expenses">
        @csrf
        <div class="form-row">
            <div class="form-group col-lg-6 offset-lg-3">
                <label for="" class="font-weight-bold">Seleccione la categoria</label>
                <select class="form-control text-success" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" class="form-control input-lg text-success">{{$category->name}}</option>
                    @endforeach
                 </select>
            </div>
            <div class="form-group col-lg-3 offset-lg-3">
                <label for="" class="font-weight-bold">Numero de factura</label>
                <input type="text" name="numberOfTicket" class="form-control" required>
            </div>
            <div class="form-group col-lg-3 ">
                <label for="" class="font-weight-bold">Fecha</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="form-group col-lg-6 offset-lg-3">
                <label for="" class="font-weight-bold">Descripcion del Gasto:</label>
                <input type="text" name="description" class="form-control" required>
                
            </div>
            
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 offset-lg-3">
                <label for="" class="font-weight-bold">Pago Total $</label>
                <input type="number" step="any" name="totalPayment" class="form-control" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-6 offset-lg-3">
                <button type="submit" class="btn btn-primary btn-block">Guardar</button>        
            </div>
        </div>
        
    </form> 

@endsection