<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/tienda_index.css">
    </head>
    <body>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tienda.index') }}" enctype="multipart/form-data">Volver</a>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-left">
                            <h5>Mas stock</h5>
                            <hr>
                            {{$masStock}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-left">
                            <h5>Mas vendido</h5>
                            <hr>
                            {{$masVendido}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Ventas realizadas</h2>
                </div>
            </div>
        </div>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Referencia</th>
                    <th>Peso</th>
                    <th>Cantidad vendida</th>
                    <th>Cantidad actual</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $producto)
                <tr>
                    <td>{{$producto->nombre_producto}}</td>
                    <td>{{$producto->referencia}}</td>
                    <td>{{$producto->peso}}</td>
                    <td>{{$producto->stock_vendido}}</td>
                    <td>{{$producto->stock}}</td>
                    <td>{{$producto->precio}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
