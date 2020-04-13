<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Sistema Ventas Laravel Vue Js- IncanatoIT">
      <meta name="author" content="Incanatoit.com">
      <meta name="keyword" content="Sistema ventas Laravel Vue Js, Sistema compras Laravel Vue Js">
      <link rel="shortcut icon" href="img/favicon.png">
      <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : ''}}">
      <title>Sistema Ventas - JamesGiraldo</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Icons -->
      <link href="css/plantilla.css" rel="stylesheet"> 
         
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
      <div id="app">
      <header class="app-header navbar">
          <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
            <img src="/img/logojames.jpeg" class="navbar-brand" href="#" alt="LOGO">
            <span class="navbar-toggler-icon"></span>
          </button>
          <ul class="nav navbar-nav d-md-down-none">             
              <li class="nav-item px-3">
                    <a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">                    
                      <span style="color:red;" class="d-md-down-none">{{Auth::user()->usuario}} </span>
                    </a>
              </li>
          </ul>                        
          <ul class="nav navbar-nav ml-auto">                        
              <notification :notifications="notifications"></notification>                         
              <li class="nav-item dropdown">                 
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i style="color:red;" class="fa fa-sign-out"></i> Cerrar sesión
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form></a>                                    
              </li>                          
          </ul>
               
      </header>
      <div class="app-body">
          @if(Auth::check())
              @if (Auth::user()->idrol == 1)
                  @include('plantilla.sidebaradministrador')
              @elseif (Auth::user()->idrol == 2)
                  @include('plantilla.sidebarvendedor')
              @elseif (Auth::user()->idrol == 3)
                  @include('plantilla.sidebaralmacenero')
              @else

              @endif

          @endif
          <!-- Contenido Principal -->
          @yield('contenido')
          <!-- /Fin del contenido principal -->
      </div>
      </div>
          @yield('footer')     
      <script src="js/app.js"></script>
      <script src="js/plantilla.js"></script>
  </body>
</html>
