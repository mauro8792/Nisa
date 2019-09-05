@extends('layouts.app')

@section('title', 'Resumen')

@section('content')

<div class="container row">
    <div class="text-left">
        <form method="POST" action="/resumen/searchForDate" > 
            @csrf
            <div>
                <label for="inicial">Desde</label>
                <input type="date" name="init">
                <label for="inicial">Hasta</label>
                <input type="date" name="fin">
                <button type="submit">Buscar</button>
            </div>
            
        </form>
    </div>
    
    <div class="text-right"> 
        <form method="POST" action="/resumen/searchForMonth" >
            @csrf
            <div>
                <label for="inicial"> Buscar por mes</label>
                <select name="month" id="month">
                    <option value="1" class="form-control input-lg text-success">Enero</option>
                    <option value="2" class="form-control input-lg text-success">Febrero</option>
                    <option value="3" class="form-control input-lg text-success">Marzo</option>
                    <option value="4" class="form-control input-lg text-success">Abril</option>
                    <option value="5" class="form-control input-lg text-success">Mayo</option>
                    <option value="6" class="form-control input-lg text-success">Junio</option>
                    <option value="7" class="form-control input-lg text-success">Julio</option>
                    <option value="8" class="form-control input-lg text-success">Agosto</option>
                    <option value="9" class="form-control input-lg text-success">Septiembre</option>
                    <option value="10" class="form-control input-lg text-success">Octubre</option>
                    <option value="11" class="form-control input-lg text-success">Noviembre</option>
                    <option value="12" class="form-control input-lg text-success">Diciembre</option>

                </select>
                <label for="inicial">Año</label>
                <select name="age" id="age">
                    <option value="2019" class="form-control input-lg text-success">2019</option>
                    <option value="2020" class="form-control input-lg text-success">2020</option>
                    <option value="2021" class="form-control input-lg text-success">2021</option>
                    <option value="2022" class="form-control input-lg text-success">2022</option>
                    <option value="2023" class="form-control input-lg text-success">2023</option>
                    <option value="2024" class="form-control input-lg text-success">2024</option>
                </select>
                <button type="submit">Buscar</button>
            </div>
            
        </form>
    </div>
    
</div>

    <div>
            <p><h1 class="text-center my-3">Resumen</h1> </p>

        
        <table class="table">
            <thead>
                <th></th>
                <th>Montos</th>
            </thead>
            <tr >
                <td>Ventas</td>
            <td>{{$sumaVentas}}</td>
            </tr>
            <tr>
                <td>Ingresos</td>
            <td>{{$efectivoRecibido}}</td>
            </tr>
            <tr>
                <td>Gastos</td>
            <td>{{$sumaGastos}}</td>
            </tr>
            <tr>
                <td>
                    Total
                </td>
                <td>
                    @php
                        $total = $efectivoRecibido - $sumaGastos
                    @endphp
                    {{$total}}
                </td>
            </tr>
            
        </table>

    </div>
    
    
   

@endsection