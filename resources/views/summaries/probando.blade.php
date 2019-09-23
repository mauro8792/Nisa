@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <script>
        $(document).ready(function() {
             $('#example').DataTable();
            
        } );
    </script>
    @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg)) 
    
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Cuidado! </strong>{{ Session::get('alert-' . $msg) }} ×
    </div>
    @endif @endforeach
    <h1 class="my-4 text-center">Listado de Clientes</h1>
    <table id="example" class="display table" style="width:100%">
        <thead>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Editar</th>
            
            <th scope="col">Realizar pago</th>
            <th scope="col">Estado de cuenta </th>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <th scope="row">{{$client->name}} </th>
                    <td scope="row">{{$client->lastname}}</td>
                    <td scope="row">{{$client->email}}</td>
                    <td scope="row">{{$client->telephone}}</td>
                    
                    <td><a href="/clients/{{$client->slug}}/edit" class="btn btn-primary">Editar</a> </td>
                    
                    @if ($client->accountTotal != 0)
                        <td><a href="/pagos/newPayment/{{$client->id}}"  class="btn btn-success">Realizar pago</a> </td>
                                          
                    @else
                        <td></td>
                   
                    @endif
                    
                    <td><a href="/accounts/{{$client->id}}" class="btn btn-info">Ver más..</a> </td>

                    
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
        