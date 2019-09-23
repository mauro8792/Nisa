@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg)) 
    
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Cuidado! </strong>{{ Session::get('alert-' . $msg) }} ×
    </div>
    @endif @endforeach
    <p><h1 class="text-center my-3">Lista de Categorias</h1> </p>

    <table class="table">
        <thead>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Editar</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->name}} </th>
                    <td scope="row">{{$category->description}}</td>

                    <td><a href="/categories/{{$category->slug}}/edit" class="btn btn-primary">Editar</a> </td>
                    
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    
   

@endsection