@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <p><h1 class="text-center my-3">Lista de Categorias</h1> </p>

    <table class="table">
        <thead>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->name}} </th>
                    <td scope="row">{{$category->description}}</td>

                    <td><a href="/categories/{{$category->id}}" class="btn btn-primary">Editar</a> </td>
                    <td> <form method="POST" action="/categories/{{$category->id}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                     <button type="submit" class="btn btn-danger">Eliminar</button> </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    
   

@endsection