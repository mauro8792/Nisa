@extends('layouts.app')

@section('title', 'Resumen')

@section('content')

<nav class="navbar navbar-light bg-light" style="margin-top: 5%;">
  
  <div class="container">
    <div class="row">
        <form method="POST" action="/resumen/searchForDate" class="form-inline" > 
            @csrf
            <div style="display: flex">
                <label for="inicial" class="text-dark mr-2">Desde</label>
                <input class="form-control mr-sm-2" type="date" name="init">
                <label for="inicial" class="text-dark mr-2">Hasta</label>
                <input class="form-control mr-sm-2" type="date" name="fin">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </div>            
        </form>
    </div>
    <div class="row"> 
        <form method="POST" action="/resumen/searchForMonth" class="form-inline" style="display: -webkit-inline-box;" >
            @csrf
            <div style="display: flex; margin-top: 6%;">
                <div class="input-group mb-4 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inicial">Mes</label>
                    </div>
                    
                    <select  class="custom-select" name="month" id="month">
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
                </div>
                <div class="input-group mb-4 mx-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inicial">Año</label>
                    </div>
                    <select class="custom-select" name="age" id="age">
                        <option value="2019" class="form-control input-lg text-success">2019</option>
                        <option value="2020" class="form-control input-lg text-success">2020</option>
                        <option value="2021" class="form-control input-lg text-success">2021</option>
                        <option value="2022" class="form-control input-lg text-success">2022</option>
                        <option value="2023" class="form-control input-lg text-success">2023</option>
                        <option value="2024" class="form-control input-lg text-success">2024</option>
                    </select>
                </div>  
            </div>
            <button style="margin-left: 2%;" class="btn btn-outline-success my-2 my-sm-0"     type="submit">Buscar</button>
            
        </form>
    </div>
  </div>
</nav>


    <div>
            <p><h1 class="text-center my-3">Resumen</h1> </p>

        <div class="table-responsive">
            <table class="table mx-auto" style="text-align: center;">
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
            @php
                        $total = $efectivoRecibido - $sumaGastos
            @endphp
            <tr @if ($total<0) style="color:red" @else style="color:green" @endif>
                <td> Total</td>
                <td>{{$total}}</td>
            </tr>
            
            </table>
        </div>
    </div>
    
    
   

@endsection