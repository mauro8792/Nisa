@extends('layouts.app')

@section('title', 'Create Expenses')

@section('content')

    <p><h1 class="text-center my-5">Nuevo Gasto</h1> </p>
    <form class="form-group" method="POST" action="/expenses">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Seleccione la categoria</label>
                <select class="form-control text-success" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" class="form-control input-lg text-success">{{$category->name}}</option>
                    @endforeach
                 </select>
            </div>
            <div class="form-group col-md-6">
                <label for="">Descripcion del Gasto:</label>
                <input type="text" name="description" class="form-control" required>
                
            </div>
            
        </div>
        <div class="form-row">
            
            <div class="form-group col-md-6">
                <label for="">Pago parcial: $</label>
                <input type="number" name="totalAmount" class="form-control"  required>
            </div>
            <div class="form-group col-md-6">
                <label for="">Pago Total $</label>
                <input type="number" name="totalPayment" class="form-control" required>
            </div>
        </div>

       
        
        

        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form> 

@endsection