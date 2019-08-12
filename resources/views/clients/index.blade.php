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
            <th scope="col">Estado de cuenta</th>
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
                    <td><a href="/accounts/{{$client->id}}" class="btn btn-info">Ver más..</a> </td>
                    
                    @if ($client->accountTotal != 0)
                        <td><a href="/pagos/newPayment/{{$client->id}}"  class="btn btn-success">Realizar pago</a> </td>
                    @endif

                    
                </tr>
            @endforeach
        </tbody>
    </table>
    
   

@endsection