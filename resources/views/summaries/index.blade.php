@extends('layouts.app')

@section('title', 'Resumen')

@section('content')

<nav class="navbar navbar-light bg-light mt-4">
  
  <div class="container">
    <div class="row">
        <div class="col-lg-6">
             <form method="POST" action="/resumen/searchForDate" class="form-inline" > 
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <label for="inicial" class="text-dark mr-2">Desde</label>
                            <input class="form-control mr-sm-2" type="date" name="init">
                        </div>
                        <div class="col-lg-5">
                            <label for="inicial" class="text-dark mr-2">Hasta</label>
                            <input class="form-control mr-sm-2" type="date" name="fin">
                        </div>
                        <div class="col-lg-2 mt-3 mt-lg-0 text-center-sm">
                             <button class="btn btn-outline-success mt-lg-4 btn-block-sm" type="submit">Buscar</button>
                        </div>
                    </div>
        
                    
                   
                </div>            
            </form>
        </div>
        <div class="col-lg-6">
           <form method="POST" action="/resumen/searchForMonth" class="form-inline">
            @csrf
            <div class="container">
                <div class="row  mt-lg-4">
                    <div class="col-lg-5">
                        <div class="input-group mb-4">
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
                    </div>
                    <div class="col-lg-5">
                        <div class="input-group mb-4">
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
                    <div class="col-lg-2 text-center-sm">
                         <button class="btn btn-outline-success btn-block-sm" type="submit">Buscar</button>
                    </div>
                </div>
            </div>
        </form> 
        </div>
    </div>
  </div>
</nav>


    <div class="mb-4">
        <h1 class="text-center my-3">Resumen</h1>

        <div class="table-responsive">
            <table class="table mx-auto text-center">
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