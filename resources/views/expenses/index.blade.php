@extends('layouts.app')

@section('title', 'Expenses')

@section('content')
<script>
        $(document).ready(function() {
             $('#tableExpenses').DataTable();
            
        } );
    </script>

<nav class="navbar navbar-light bg-light mt-5 py-4">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-6">
                <form method="POST" action="/gastos/searchForCategory" class="form-inline">
                    @csrf
                    <div>
                        <div class="input-group">
                            <select class="form-control text-success" name="category" >
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option> 
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-outline-success ml-3"     type="submit">Buscar</button>
                </form>
            </div>
            <div class="col-lg-6">
                <form method="POST" action="/gastos/searchForDate" class="form-inline" > 
                    @csrf
                    <div style="display: flex">
                        <label for="inicial" class="text-dark mr-2">Desde</label>
                        <input class="form-control mr-sm-2" type="date" name="init">
                        <label for="inicial" class="text-dark mr-2">Hasta</label>
                        <input class="form-control mr-sm-2" type="date" name="fin">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </div>            
                </form>      
            </div>
        </div>
    </div>
</nav>
    <h1 class="text-center my-3">Lista de Gastos</h1>
    <div class="table-responsive">
            <table class="table" id='tableExpenses'>
                <thead>
                    <th scope="col">Fecha </th>
                    <th scope="col">Categoria </th>
                    <th scope="col">Numero de Factura </th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Costo Total</th>
                    
                </thead>
                <tbody>
                    @foreach($expenses as $expense)
                        <tr>
                            <td scope="row">{{date('d-m-Y',strtotime($expense->date))}}</td>
                            <th scope="row">{{$expense->name}} </th>
                            <th scope="row">{{$expense->numberOfTicket}} </th>
                            <td scope="row">{{$expense->description}}</td>
                            <td scope="row">{{$expense->totalPayment}}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection