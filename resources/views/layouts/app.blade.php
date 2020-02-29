<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Nisa Interiores - @yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
       
        <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
        <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.19/sorting/datetime-moment.js"></script>
    
       
       {{--  <script type = "text / javascript" src = " https: ////cdn.datatables.net/plug-ins/1.10.20/dataRender/datetime.js"> </script>
        
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script> --}}

        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>


        <!-- -->
        
        <script src="../../public/dataTable/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
        <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
        <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
        <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
        <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

        <script src="https://kit.fontawesome.com/994e7e9fc5.js"></script>
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
        
       
    </head>
    <style>
         footer {
      background: rgba(0, 0, 0, 0.8);
      color: white;
      position: fixed;
      left:0px;
      bottom:0px;
      height:30px;
      width:100%;
    }
    nav {
      color: white;  
    }
    </style>
    <body class="fondo2 "  >
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="  padding-right: 0px; padding-left: 15px;" >
            <a class="navbar-brand" href="https://nisainteriores.com.ar/">Inicio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav mr-auto">
                    @if(Route::has('login'))
                    @auth
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownClientes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Clientes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownClientes">
                            <a class="dropdown-item" href="{{route('clients.index')}}">Ver todos..</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('clients.create')}}">Nuevo Cliente</a>                            
                           
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownEmployee" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Empleados
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownEmployee">
                            <a class="dropdown-item" href="{{route('employees.index')}}">Ver todos..</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('employees.create')}}">Nuevo Empleado</a>                            
                            
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownGastos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gastos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownGastos">
                            <a class="dropdown-item" href="{{route('expenses.index')}}">Ver gastos</a>
                            <a class="dropdown-item" href="{{route('categories.index')}}">Ver Categorias</a>
                            <div class="dropdown-divider"></div>                            
                            <a class="dropdown-item" href="{{route('expenses.create')}}">Nuevo Gasto</a>
                            <a class="dropdown-item" href="{{route('categories.create')}}">Nueva Categoria</a>
                        </div>
                    </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPagos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pagos/Ventas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownPagos">
                            
                            <a class="dropdown-item" href="{{route('payments.index')}}">Ver  Pagos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('sales.create')}}">Nueva Venta</a>
                            
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPagos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Ordenes de Pedido
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownPagos">
                            <a class="dropdown-item" href="{{route('sales.index')}}">Ver Pedidos</a>
                            
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownResumen" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Resumen
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownResumen">
                            <a class="dropdown-item" href="{{route('summaries.index')}}">Resumen x mes</a>
                            
                            
                        </div>
                    </li>
                    @endauth
                        @endif
                </ul>
                <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link mr-4" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                           
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                         
                    </ul>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
        
    </body>
    
</html>