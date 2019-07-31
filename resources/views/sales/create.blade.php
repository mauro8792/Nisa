@extends('layouts.app')

@section('title', 'Create Sale')

@section('content')
    <p>Client: </p>
    <form class="form-group" method="POST" action="/sales">
        @csrf
        <div class="form-group">
            <label for="">descripcion</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label for="">date</label>
            <input type="date" name="date" class="form-control">
        </div>
        <div class="form-group">
            <label for="">senia</label>
            <input type="text" name="senia" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="">total</label>
            <input type="text" name="total" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Cliente</label>
            <select class="form-control text-success" name="client" id="distributor">
                @foreach($clients as $client)
                    <option value="{{$client->id}}" class="form-control input-lg text-success">{{$client->name}}</option>
                @endforeach
            </select>
        </div>
        

        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form> 

@endsection