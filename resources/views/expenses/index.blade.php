@extends('layouts.app')

@section('title', 'Expenses')

@section('content')
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