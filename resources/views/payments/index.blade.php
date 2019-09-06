@extends('layouts.app')

@section('title', 'Pagos')

@section('content')
    <p>Todos los Pagos</p>

    <table class="table">
        <thead>
            <th scope="col">Fecha  </th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Forma de Pago</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Pago</th>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
            <tr>
                
                <td scope="row">{{$payment->date}}</td>
                <th scope="row">{{$payment->name}}</th>
                <td scope="row">{{$payment->lastName}}</td>
                <td scope="row">{{$payment->paymentForm}}</td>
                <td scope="row">{{$payment->description}}</td>
                <td scope="row">{{$payment->payment}}</td> 
                
               
            </tr>
            @endforeach
        </tbody>
    </table>
   

@endsection