<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/ventas.css">
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
                                <header>
                                    <img class='pequeña' src="{{$producto->img}}" alt="">
                                </header>
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

{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Card Perfil</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/ventas.css">

</head>
<body>
    dd($prod)
    @foreach ($productos as $producto)
        @if ($producto->stock>0)
        <div class="container">
            <div class="row">
                <div class="col">
                    <header>
                      <img src="/images/2.png" alt="">
                    </header>

                    <section>
                      <h2>{{$producto->nombre_producto}}</h2>
                      <h3>{{$producto->categoria}}</h3>
                      <ul>
                        <li><p>Peso {{$producto->peso}}kg</p></a></li>
                        <li><p>Valor ${{number_format($producto->precio)}}</p></li>
                        <li><p">Stock {{$producto->stock}}</a></li>
                      </ul>
                    </section>

                    <footer>
                      <input type:"submit" value="Vender">
                    </footer>
                </div>
            </div>
        </div>
        @endif
    @endforeach

</body>
</html> --}}
