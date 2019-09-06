@extends('layouts.app')

@section('title', 'Sales')

@section('content')
<script>
        $(document).ready(function() {
             $('#example').DataTable();
        } );
    </script>
    <p><h1 class="text-center my-3">Ordenes de Pedido</h1> </p>
   <section>
   
    <table  id="example"class="display table text-center">
        <thead>
            <th scope="col">Fecha</th>
            <th scope="col">Cliente </th>
            <th scope="col">N° orden</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Estado</th>
            
            
            
        </thead>
        <tbody>
            @foreach($sales as $sale)

                <tr
                    @if ($sale->state=="Finalizado")
                        style="background: yellow"
                    @endif
                >
                    <td scope="row">{{date('d-m-Y',strtotime($sale->created_at))}}</td>
                    <th scope="row"
                    @if ($sale->state == "En Proceso")
                        style="background: yellow"
                    @endif
                    >
                        {{$sale->name}}
                    </th>
                     
                    <td scope="row">
                        <a href="/ventas/forOrder/{{$sale->id}}" > {{$sale->numberOfOrder}} </a></td>
                    <td scope="row">{{$sale->shortDescription}}</td>
                    <td scope="row">
                        <a href="/sales/{{$sale->id}}/edit" class="btn btn-success btn-block" style="color: white" role="button">
                            @if ($sale->state!='Finalizado')
                                {{$sale->state}}
                            
                           @else
                                {{ "✓" }}
                           @endif
                        </a> 
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    
   

@endsection