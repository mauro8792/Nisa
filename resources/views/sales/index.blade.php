@extends('layouts.app')

@section('title', 'Sales')

@section('content')
    <p><h1 class="text-center my-3">Lista de Ventas</h1> </p>
   <section>
        







    </section>                





























    <table class="table">
        <thead>
            <th scope="col">Cliente </th>
            <th scope="col">Descripcion</th>
            <th scope="col">Total</th>
            <th scope="col">Fecha</th>
            
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <th scope="row">{{$sale->name}} </th>
                    <td scope="row">{{$sale->description}}</td>
                    <td scope="row">{{$sale->total}}</td>
                    <td scope="row">{{date('d-m-Y',strtotime($sale->created_at))}}</td>
                    
                    
                    

                    
                </tr>
            @endforeach
        </tbody>
    </table>
    
   

@endsection