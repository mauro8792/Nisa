@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
<script>
    $(document).ready(function() {
         $('#example').DataTable({
            "aoColumns":[
                    //{"bSortable": false},
                    {"bSortable": false},
                    {"bSortable": false},
                    {"bSortable": false},
                    {"bSortable": false},
                    {"bSortable": false},
                    {"bSortable": false},
                    {"bSortable": false, 'searchable': false}
                ],
                "aaSorting": [],            
        } );
        
    } );
</script>
    <h1 class="text-center my-5">Cuenta Corriente Clientes: {{$client->name}}</h1>

    <div class="table-responsive">
    <table id="example" class="table">
        <thead>
            {{-- <th scope="row" WIDTH="20px">#</th> --}}
            <th scope="row" WIDTH="120px">Fecha</th>
            <th scope="row" WIDTH="150px">N° de Orden</th>
            <th scope="col">Forma de Pago</th>
            <th scope="col">Debe</th>
            <th scope="col">Haber</th>
            <th scope="col">Total</th>
            <th scope="col">Accion</th>
        </thead>
        <tbody>
                @php
                    $total=0;
                @endphp
            @foreach($cuentaCorriente as $cuenta)
                <tr>
                    
                    {{-- <td></td> --}}
                    <td scope="row" id="dateShow">{{date('d-m-Y',strtotime($cuenta->date))}}</td>
                    <td scope="row"  >
                        <a href="/ventas/forOrder/{{$cuenta->sale_id}}" >
                        @if (isset($cuenta->sale->numberOfOrder))
                            {{$cuenta->sale->numberOfOrder}}
                        @endif
                             </a>
                    </td>
                    <td scope="row">
                        <a href="/payments/{{$cuenta->payment_id}}" >
                            @if (isset($cuenta->payment->paymentForm))
                            {{$cuenta->payment['paymentForm']}}
                            
                            @endif
                             </a>
                    </td>
                    <td scope="row">
                        @if ($cuenta->debit!=0)
                            ${{$cuenta->debit}}
                            @php
                                $total = $total + $cuenta->debit
                            @endphp
                        @endif
                    </td>
                    <td scope="row">
                         @if ($cuenta->assets!=0)
                            ${{$cuenta->assets}}
                            @php
                                $total = $total - $cuenta->assets
                            @endphp
                        @endif
                    </td>
                    <td scope="row">${{$total}}</td>
                    <td scope="row">
                       
                        @if ($loop->last)
                            @if ($cuenta->debit!=0)
                                <form method="post" action="/sales/{{$cuenta->sale_id}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="sale_id" value="{{$cuenta->sale_id}}">
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            @endif
                        @endif
                        
                    </td>
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