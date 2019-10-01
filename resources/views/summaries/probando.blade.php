@extends('layouts.app')

@section('title', 'probando')

@section('content')
    <script>
        $(document).ready(function() {
             $('#example').DataTable();
            
        } );
    </script>

    <h1 class="my-4 text-center">Listado de Clientes</h1>
    <div class="table-responsive">
        <table id="example" class="table">
            <thead>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Editar</th>
                <th scope="col">Estado de cuenta </th>
                <th scope="col">Realizar pago</th>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        @if ($client->name == null)
                            <td>-</td>
                        @else
                            <th scope="row">{{$client->name}} </th>
                                                    
                        @endif

                        @if ($client->lastname == null)
                            <td>-</td>
                        @else
                            <td scope="row">{{$client->lastname}}</td>
                                                    
                        @endif

                        @if ($client->email == null)
                            <td>-</td>
                        @else
                            <th scope="row">{{$client->email}} </th>
                                                    
                        @endif

                        @if ($client->telephone == null)
                            <td>-</td>
                        @else
                            <td scope="row">{{$client->telephone}}</td>
                                                    
                        @endif
                        
                        
                        
                        
                        <td><a href="/clients/{{$client->slug}}/edit" class="btn btn-primary">Editar</a> </td>
                        <td><a href="/accounts/{{$client->id}}" class="btn btn-info">Ver más..</a> </td>
                        
                        @if ($client->accountTotal != 0)
                            <td><a href="/pagos/newPayment/{{$client->id}}"  class="btn btn-success">Realizar pago</a> </td>
                        
                        @else
                            <td>-</td>
                        
                        @endif

                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
        