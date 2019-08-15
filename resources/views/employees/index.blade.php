@extends('layouts.app')

@section('title', 'Clients')

@section('content')
    <p><h1 class="text-center my-3">Lista de Empleados</h1> </p>

    <table class="table">
        <thead>
            <th scope="col">Name  </th>
            <th scope="col">LastName</th>
            <th scope="col">Adress</th>
            <th scope="col">Telephone</th>
            <th scope="col">Star Date</th>
            <th scope="col">Salary</th>
            <th scope="col">Edit</th>
            <th scope="col">Eliminar</th>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{$employee->name}} <i class="fas fa-camera-retro fa-lg"></i></th>
                    <td scope="row">{{$employee->lastname}}</td>
                    <td scope="row">{{$employee->adress}}</td>
                    <td scope="row">{{$employee->telephone}}</td>
                    <td scope="row">{{$employee->starDate}}</td>
                    <td scope="row">{{$employee->salary}}</td>
                    
                    <td><a href="/employees/{{$employee->id}}" class="btn btn-primary">Editar</a> </td>
                    <td> <form method="POST" action="/employees/{{$employee->id}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                     <button type="submit" class="btn btn-danger">Eliminar</button> </form>
                    </td>
                    
                    

                    
                </tr>
            @endforeach
        </tbody>
    </table>
    
   

@endsection