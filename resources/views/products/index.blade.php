<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
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
          </div>
        </div>
      </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route("producto.store") }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="referencia" class="form-label">Referencia</label>
                                <input type="text" class="form-control" name="referencia" id="referencia">
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="number" class="form-control" name="precio" id="precio" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="peso" class="form-label">Peso</label>
                                <input type="number" class="form-control" name="peso" id="peso">
                            </div>
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoria</label>
                                <select type="text" class="form-control" name="categoria" id="categoria" aria-describedby="emailHelp">
                                    <option>Dulce</option>
                                    <option>Cafe</option>
                                    <option>Lacteo</option>
                                    <option>Capuccino</option>
                                    <option>Late</option>
                                    <option>Te</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" name="stock" id="stock" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table  class="table table-striped">
                          <thead>
                              <tr>
                                  <th>Nombre</th>
                                  <th>Referencia</th>
                                  <th>Stock</th>
                                  <th>Opciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($productos as $producto)
                              <tr class="table-active">
                                  <td>{{$producto->nombre_producto}}</td>
                                  <td>{{$producto->referencia}}</td>
                                  <td>{{$producto->stock}}</td>
                                  <td>
                                      <form action="{{ route('producto.destroy',$producto->id) }}" method="POST">
                                      {{-- <a class="btn btn-primary" href="{{ route('/product') }}">Edit</a> --}}
                                      <a class="btn btn-primary" href="{{ route('producto.edit',$producto->id) }}">Editar</a>

                                      @csrf
                                      <button type="submit" class="btn btn-danger">Eliminar</button>
                                      </form>
                            </td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


  <!-- Modal -->
  {{-- <div class="modal fade" id="editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editar">Editar Producto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if ($producto!='')
            <form action="{{ route('producto.index',$producto->id ?? '') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nombre Producto:</strong>
                            <input type="text" name="name" value="{{ $producto->nombre_producto??''}}" class="form-control"
                                placeholder="Company name">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Referencia:</strong>
                            <input type="email" name="email" class="form-control" placeholder="Company Email"
                                value="{{ $producto->email }}">
                            @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Precio:</strong>
                            <input type="text" name="address" value="{{ $producto->address }}" class="form-control"
                                placeholder="Company Address">
                            @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Peso:</strong>
                            <input type="text" name="address" value="{{ $producto->address }}" class="form-control"
                                placeholder="Company Address">
                            @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary">Understood</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </form>
            @endif
        </div>
      </div>
    </div>
  </div> --}}

</body>
</html>
