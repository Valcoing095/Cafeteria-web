<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach ($productos as $producto)
        <div class="col mb-4"> <!-- Espaciado entre filas -->
            <div class="card shadow-lg border-0 text-center p-3 h-100 d-flex flex-column">
                <!-- <img src="https://via.placeholder.com/150" class="card-img-top mx-auto d-block" alt="Imagen del producto"> -->
                <div class="card-body d-flex flex-column flex-grow-1">
                    <h3 class="text-muted">{{ $producto->nombre }}</h3>
                    <h5 class="card-title text-primary fw-bold">{{ $producto->categoriaProducto->categoria }}</h5>
                    <p class="card-text flex-grow-1">{{ $producto->descripcion }}</p>
                </div>
                <div class="card-footer bg-white border-0 mt-auto">
                    <button class="btn btn-danger w-100">Ver productos</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
