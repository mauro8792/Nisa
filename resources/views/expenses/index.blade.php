@extends('layouts.app')

@section('title', 'Expenses')

@section('content')

<nav class="navbar navbar-light bg-light" style="margin-top: 5%;">
  
  <div class="container row">
    <div class="container-row"> 
        <form method="POST" action="/gastos/searchForCategory" class="form-inline" style="display: -webkit-inline-box;" >
            @csrf
            <div >
                <div class="input-group mb-4 ">
                    <select class="form-control text-success" name="category" >
                        @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option> 
                        @endforeach
                    </select>

                </div>
            </div>
            <button style="margin-left: 2%;" class="btn btn-outline-success my-2 my-sm-0"     type="submit">Buscar</button>
            
        </form>
    </div>
  </div>
</nav>
    <p><h1 class="text-center my-3">Lista de Gastos</h1> </p>

    <table class="table">
        <thead>
            <th scope="col">Categoria </th>
            <th scope="col">descripcion</th>
            <th scope="col">Costo Total</th>
            
            <th scope="col">Fecha</th>
            
        </thead>
        <tbody>
            @foreach($expenses as $expense)
                <tr>
                    <th scope="row">{{$expense->name}} </th>
                    <td scope="row">{{$expense->description}}</td>
                    <td scope="row">{{$expense->totalPayment}}</td>
                    <td scope="row">{{$expense->created_at}}</td>
                    
                    
                    

                    
                </tr>
            @endforeach
        </tbody>
    </table>
    
   

@endsection