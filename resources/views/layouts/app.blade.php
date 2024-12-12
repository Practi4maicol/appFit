<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Estilos -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="path/to/your/style.css" rel="stylesheet">    <!-- Enlazar el archivo CSS -->

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Cargar Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
           
            <div class="container" >
                 <!-- imagen de logotipo -->
                <a class="navbar-brand" href="{{ url('/') }}"  >
                   
                        <img src="img/home.jpg" alt="link index" style= "width:3cm ; border-radius: 50%; " > 
                  
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                     <!--menu de cada ruta para acceso al index de cada una -->
                     @if(auth::check())
                     <li class="nav-item">
                        <h5><a class="nav-link" href="{{ route('personas.index') }}">{{ __('Mis Datos') }}</a></h5>
                     </li>

                     <li class="nav-item">
                        <h5><a class="nav-link" href="{{ route('wods.index') }}">{{ __('Wods') }}</a></h5>
                     </li>

                     <li class="nav-item">
                        <h5><a class="nav-link" href="{{ route('weighliftings.index') }}">{{ __('Weighliftings') }}</a></h5>
                     </li>

                     <li class="nav-item">
                        <h5><a class="nav-link" href="{{ route('runs.index') }}">{{ __('Run') }}</a></h5>
                     </li>

                     <li class="nav-item">
                        <h5><a class="nav-link" href="{{ route('benchmarks.index') }}">{{ __('Benchmark') }}</a></h5>
                     </li>

                     <li class="nav-item">
                        <h5><a class="nav-link" href="{{ route('otros.index') }}">{{ __('Otros') }}</a></h5>
                     </li>

                     <li class="nav-item">
                        <h5><a class="nav-link" href="{{ route('cuerpos.index') }}">{{ __('Body') }}</a></h5>
                     </li>

                     @endif


                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
