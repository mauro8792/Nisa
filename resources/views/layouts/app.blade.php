<html>
    <head>
        <title>Tapiceria Nisa - @yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownClientes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Clientes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownClientes">
                            <a class="dropdown-item" href="{{route('clients.index')}}">Ver todos..</a>
                            <a class="dropdown-item" href="{{route('clients.create')}}">Nuevo Cliente</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownEmployee" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Empleados
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownEmployee">
                            <a class="dropdown-item" href="{{route('employees.index')}}">Ver todos..</a>
                            <a class="dropdown-item" href="{{route('employees.create')}}">Nuevo Empleado</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownGastos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gastos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownGastos">
                            <a class="dropdown-item" href="{{route('expenses.create')}}">Nuevo Gasto</a>
                            <a class="dropdown-item" href="{{route('categories.create')}}">Nueva Categoria</a>
                            <a class="dropdown-item" href="{{route('categories.index')}}">Ver Categorias</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Ver gasto por categoria</a>
                        </div>
                    </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownGastos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pagos/Ventas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownGastos">
                            <a class="dropdown-item" href="{{route('payments.create')}}">Nuevo Pago</a>
                            <a class="dropdown-item" href="{{route('payments.index')}}">Ver  Pago</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('sales.create')}}">Nueva Venta</a>
                            <a class="dropdown-item" href="{{route('sales.create')}}">Ver Pago</a>
                            
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>