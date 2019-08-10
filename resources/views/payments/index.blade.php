@extends('layouts.app')

@section('title', 'Clients')

@section('content')
    <p>List of Clients</p>

    <table class="table">
        <thead>
            <th scope="col">Name  </th>
            <th scope="col">LastName</th>
            <th scope="col">Total</th>
            <th scope="col">Realizar pago</th>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <th scope="row">{{$client->name}}</th>
                    <td scope="row">{{$client->lastname}}</td>
                    
                    
                    <td><a href="/payments/{{$client->id}}"  class="btn btn-primary">Realizar pago</a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   

@endsection