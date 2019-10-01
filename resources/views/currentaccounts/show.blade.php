@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <h1 class="text-center my-5">Cuenta Corriente Cliente: {{$client->name}}</h1>

    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
           
            <th scope="row" WIDTH="120px">Fecha</th>
            <th scope="row" WIDTH="150px">N° de Orden</th>
            <th scope="col">Forma de Pago</th>
            <th scope="col">Debe</th>
            <th scope="col">Haber</th>
            <th scope="col">Total</th>
        </thead>
        <tbody>
            @foreach($cuentaCorriente as $cuenta)
                <tr>
                    <td scope="row">{{date('d-m-Y',strtotime($cuenta->date))}}</td>
                    <td scope="row"  >
                        <a href="/ventas/forOrder/{{$cuenta->sale_id}}" > {{$cuenta->sale['numberOfOrder']}} </a>
                    </td>
                    <td scope="row">
                        <a href="/payments/{{$cuenta->payment_id}}" > {{$cuenta->payment['paymentForm']}} </a>
                    </td>
                    <td scope="row">
                        @if ($cuenta->debit!=0)
                            ${{$cuenta->debit}}
                        @endif
                    </td>
                    <td scope="row">
                         @if ($cuenta->assets!=0)
                            ${{$cuenta->assets}}
                        @endif
                    </td>
                    <td scope="row">${{$cuenta->total}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>    
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
            <a href="/clients">
                <input type="button" value="Volver" class="btn btn-danger btn-block" name="Volver">
            </a>        
        </div>
    </div>   
@endsection