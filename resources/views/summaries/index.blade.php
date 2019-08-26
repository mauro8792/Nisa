@extends('layouts.app')

@section('title', 'Resumen')

@section('content')
    <p><h1 class="text-center my-3">Resumen</h1> </p>

    <table class="table">
        <thead>
            <th colspan="3" scope="col">Ventas</th>
        </thead>
        <tbody>
            <tr>
                <td>Fecha</td>
                <td>Cliente</td>
                <td>Descripcion</td>
                <td>Total</td>
            </tr>
            @php
                 $total = 0;
            @endphp
            @foreach($sales as $sale)
            <tr>
                <td scope="row">{{date('d-m-Y',strtotime($sale->created_at))}}</td>
                <th scope="row">{{$sale->name}} </th>
                <td scope="row">{{$sale->description}}</td>
                <td scope="row">{{$sale->total}}</td>   
                @php
                 $total = $total + $sale->total;
                @endphp                 
            </tr>
            @endforeach
            
            
        </tbody>
        <tfoot> 
            <tr >
                <th  colspan="3" class="text-right text-success" alig>Total</th>
                <td >@php
                    echo($total);
                @endphp</td>
            </tr>
        </tfoot>
        
    </table>
    <table class="table">
        <thead class="bg-light">
            <th   colspan="3">Gastos</th>
            <td  data-toggle="collapse" href="#gastos" role="button" aria-expanded="false" aria-controls="gastos" >Ver Gastos</td>
        </thead>
        <thead>
            <tr >
                <td  style="width:180px">Fecha</td>
                <td  style="width:350px">Categoria</td>
                <td  style="width:350px">Descripcion</td>
                <td  style="width:250px">Total</td>
            </tr>
        </thead>
        <tbody class="collapse multi-collapse" id="gastos">
            
            @php
                 $total = 0;
            @endphp
            @foreach($expenses as $expense)
            <tr>
                <td scope="row">{{date('d-m-Y',strtotime($expense->created_at))}}</td>
                <th scope="row">{{$expense->name}} </th>
                <td scope="row">{{$expense->description}}</td>
                <td scope="row">{{$expense->totalAmount}}</td>
                  
                @php
                 $total = $total + $expense->totalAmount;
                @endphp                 
            </tr>
            @endforeach
            
            
        </tbody>
        <tfoot> 
            <tr>
                <th colspan="3" class="text-right text-danger" alig>Total</th>
                <td>@php
                    echo($total);
                @endphp</td>
            </tr>
        </tfoot>
        
    </table>
    
   

@endsection