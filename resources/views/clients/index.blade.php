@extends('layouts.app')

@section('title', 'Clients')

@section('content')
    <p>List of Clients</p>

    <table class="table">
        <thead>
            <th scope="col">Name  </th>
            <th scope="col">LastName</th>
            <th scope="col">Email</th>
            <th scope="col">Telephone</th>
            <th scope="col">Edit</th>
            <th scope="col">Ver más...</th>
            <th scope="col">Realizar pago</th>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <th scope="row">{{$client->name}}</th>
                    <td scope="row">{{$client->lastname}}</td>
                    <td scope="row">{{$client->email}}</td>
                    <td scope="row">{{$client->telephone}}</td>
                    
                    <td><a href="/clients/{{$client->id}}" class="btn btn-primary">Editar</a> </td>
                    <td><a href="/accounts/{{$client->id}}" class="btn btn-primary">Ver más..</a> </td>
                    <td><a href="/pagos/newPayment/{{$client->id}}"  class="btn btn-primary">Realizar pago</a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   

@endsection