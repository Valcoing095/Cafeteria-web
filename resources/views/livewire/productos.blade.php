<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2 class="fw-bold">Productos</h2>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 mt-3">
            @foreach ($productos as $producto)
            <div class="col">
                <div class="card shadow border-0 text-center p-3 h-100 d-flex flex-column">
                    <div class="card-body d-flex flex-column flex-grow-1">
                        <h5 class="text-muted text-truncate">{{ $producto->nombre }}</h5>
                        <h6 class="text-primary fw-bold">{{ $producto->categoriaProducto->categoria }}</h6>
                        <p class="card-text text-truncate">{{ $producto->descripcion }}</p>
                        <h4 class="text-success fw-bold mt-auto">${{ number_format($producto->valor_bruto, 2) }}</h4>
                    </div>
                    <div class="card-footer bg-white border-top pt-3">
                        <button wire:click="actionProducto({{ $producto->id }},'add')" class="btn btn-outline-danger w-100">
                            ➕ Añadir
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Botón flotante para ver el pedido -->
    <button class="btn btn-primary btn-lg rounded-pill shadow-lg" 
        style="position: fixed; bottom: 80px; right: 20px; z-index: 1000; padding: 15px 25px; font-size: 18px;"
        data-bs-toggle="modal" data-bs-target="#pedidoModal">
        🛒 Ver Pedido (${{ number_format($totalPedido, 2) }})
    </button>

    <!-- Modal para ver el pedido actual -->
    <div wire:ignore.self class="modal fade" id="pedidoModal" tabindex="-1" aria-labelledby="pedidoModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="pedidoModalLabel">🛒 Pedido Actual</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h5>Productos en el Pedido:</h5>
            @if (count($productosEnPedido) > 0)
                <ul class="list-group">
                    @foreach ($productosEnPedido as $item)
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            <!-- Nombre del producto -->
                            <span class="text-truncate flex-grow-1 fw-semibold">{{ $item->producto->nombre }}</span>

                            <!-- Cantidad -->
                            <div class="d-flex align-items-center">
                                <button class="btn btn-sm btn-outline-danger me-2" wire:click="actionProducto({{ $item->producto_id }},'delete')">
                                    ➖
                                </button>
                                <span class="badge bg-primary rounded-pill px-3 py-2">{{ $item->cantidad }}</span>
                                <button class="btn btn-sm btn-outline-success ms-2" wire:click="actionProducto({{ $item->producto_id }},'add')">
                                    ➕
                                </button>
                            </div>

                            <!-- Precio -->
                            <span class="fw-bold text-success text-end ms-3">
                                ${{ number_format($item->producto->valor_bruto * $item->cantidad, 2) }}
                            </span>
                        </li>
                    @endforeach
                </ul>
                <h4 class="mt-3 text-end fw-bold">Total: ${{ number_format($totalPedido, 2) }}</h4>
            @else
                <p class="text-muted text-center">No hay productos en el pedido.</p>
            @endif
          </div>
          <div class="modal-footer d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            @if (count($productosEnPedido) > 0)
                <button wire:click="facturar_pedido" class="btn btn-success">🛍️ Comprar</button>
            @endif
          </div>
        </div>
      </div>
    </div>

    <!-- Mensaje de éxito -->
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
