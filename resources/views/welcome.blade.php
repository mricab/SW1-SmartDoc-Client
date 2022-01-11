<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <br>
            
            <main class="container">
                <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
                  <div class="col-md-12 px-0">
                    <h1 class="display-2 fst-italic tw-bold text-center">SmartDoc</h1>
                    <p class="lead my-3">Ofrecemos la gestión documental con almacenamiento en la nube, para cualquier entidad que necesite la facilidad de almacenar y buscar documentos con una busqueda inteligente (IA - Inteligencia Artificial).</p>
                  </div>
                </div>
              
                <div class="row mb-2">
                  <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                      <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Cloud Storage</strong>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">En el mundo el almacenamiento en una nube se ha demostrado ser eficiente y seguro, que cualquier entidad puede acceder desde cualquier parte del mundo con el unico requisito de tener acceso a internet.</p>
                      </div>
                      <div class="col-auto d-none d-lg-block text-center">
                        <img style='width:50%; height:80%' src="/storage/World.jpeg" class="img-thumbnail">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                      <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Busqueda Inteligente</strong>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="mb-auto">Hoy en dia, la inteligencia artificial arrasa en todas las herramientas existentes que facilita las tareas evitando la perdida de grandes cantidades de tiempo, es por eso que contamos con una busqueda inteliegente que permite realizar busqueda de manera mas detallada y rapida.</p>
                      </div>
                      <div class="col-auto d-none d-lg-block text-center">
                        <img style='width:50%; height:80%' src="/storage/AI.jpeg" class="img-thumbnail">
                      </div>
                    </div>
                  </div>
                </div>
            </main>
            

            {{--<div class="content">
                <div class="title m-b-md">
                    SmartDoc
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>--}}
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
