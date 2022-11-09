<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/tienda_index.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">konecta</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('tienda.ventas') }}">ventas</a>
                  </li>
              </div>
            </div>
          </nav>
        <div class="container">
            <div class="row">
                @foreach ($productos as $producto)
                @if ($producto->stock>0)
                <div class="col-md-2">
                    <div class="card ">
                        <div class="card-body " style="text-align: center">
                            <form action="{{ route('tienda.update',$producto->id) }}"  method="POST">
                                @csrf
                                {{$producto->nombre_producto}}
                                <p>Disponible:{{$producto->stock}}</p>
                                <input name="stock" class="input-group mb-2" type="number">
                                <input type="submit" value="Vender">
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </body>
</html>
