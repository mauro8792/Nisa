@extends('layouts.app')

@section('title', 'Create client')

@section('content')
    <p>Client: </p>
    <form class="form-group" method="POST" action="/clients">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Last Name</label>
            <input type="text" name="lastname" class="form-control">
        </div>
        <div class="form-group">
            <label for="">email</label>
            <input type="text" name="email" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="">Telephone</label>
            <input type="text" name="telephone" class="form-control">
        </div>
        

        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form> 

@endsection