<div class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
          </div>
        </div>
      </nav >
    <div class="container mt-7">
        <div class="row">
            <div class="col">
                <form  method="POST">
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
                              
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
