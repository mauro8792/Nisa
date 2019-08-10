@extends('layouts.app')

@section('title', 'Clients')

@section('content')
    <p>List of Clients</p>

    <table class="table">
        <thead>
           
            <th scope="row">Fecha</th>
            <th scope="col">id  </th>
            <th scope="col">id cliente</th>
            <th scope="col">id cuenta corriente</th>
            <th scope="col">Debe</th>
            <th scope="col">Haber</th>
            <th scope="col">Total</th>
        </thead>
        <tbody>
            @foreach($cuentaCorriente as $cuenta)
                
                <tr>
                   
                    <td scope="row">{{$cuenta->date}}</td>
                    <th scope="row">{{$cuenta->id}}</th>
                    <td scope="row">{{$cuenta->client_id}}</td>
                    <td scope="row">{{$cuenta->account_id}}</td>
                    <td scope="row">{{$cuenta->debit}}</td>
                    <td scope="row">{{$cuenta->assets}}</td>
                    <td scope="row">{{$cuenta->total}}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
   

@endsection