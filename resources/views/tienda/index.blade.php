<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/tienda_index.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                @foreach ($productos as $producto)
                <div class="col-md-2">
                    <div class="card ">
                        <div class="card-body " style="text-align: center">
                            <form action="{{ route('tienda.update',$producto->id) }}"  method="POST">
                                @csrf
                                {{$producto->nombre_producto}}
                                <p>Disponible:{{$producto->stock}}</p>
                                <input name="stock" class="input-group mb-2" type="number">
                                <a class="btn btn-primary" type="submit">Vender</a>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
