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
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <th scope="row">{{$client->name}}</th>
                    <th scope="row">{{$client->lastname}}</th>
                    <th scope="row">{{$client->email}}</th>
                    <th scope="row">{{$client->telephone}}</th>

                    
                   
                <td> edit</td>
                </tr>
            @endforeach
        </tbody>
    </table>
   

@endsection