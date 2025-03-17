<?php
namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;
use App\Models\Pedido;
use App\Models\pedido_producto;
use Illuminate\Support\Facades\Auth;

class Productos extends Component
{
    public $productos;
    public $pedido; // Pedido actual del usuario
    public $productosEnPedido = [];
    public $totalPedido = 0;
    
    public function mount()
    {
        $this->getProductos();
        $this->getPedido();
        $this->actualizarPedido();
    }

    # Obtener todos los productos con su categoría
    public function getProductos()
    {
        $this->productos = Producto::with('categoriaProducto')->get();
    }

    # Buscar si el usuario tiene un pedido activo, sino crearlo
    public function getPedido()
    {
        $this->pedido = Pedido::where('user_id', 1) // Cambia 1 por Auth::id() si usas autenticación
                              ->where('estado', 'Pendiente')
                              ->first();

        if (!$this->pedido) {
            $this->pedido = Pedido::create([
                'user_id' => 1, // Cambia por Auth::id() si usas autenticación
                'total' => 0,
                'estado' => 'Pendiente',
            ]);
        }
    }

    # Agregar un producto al pedido
    public function addProducto($producto_id)
    {
        // Verificar que haya un pedido activo
        if (!$this->pedido) {
            $this->getPedido();
        }

        // Validar si el producto ya está en el pedido
        $productoPedido = pedido_producto::where('pedido_id', $this->pedido->id)
            ->where('producto_id', $producto_id)
            ->first();

        if ($productoPedido) {
            $productoPedido->increment('cantidad'); // Aumenta en 1
            $productoPedido->increment('subTotal', $productoPedido->producto->valor_bruto);
        }else{
            // Crear el registro en pedido_producto
            pedido_producto::create([
                'pedido_id' => $this->pedido->id,
                'producto_id' => $producto_id,
                'cantidad' => 1, // Puedes permitir al usuario cambiar la cantidad
                'subTotal' => Producto::find($producto_id)->valor_bruto
            ]);
        }


        // Actualizar el total del pedido
        $this->pedido->total += Producto::find($producto_id)->valor_bruto;
        $this->pedido->save();

        $this->actualizarPedido();

        session()->flash('message', 'Producto añadido correctamente');
    }

    # Obtener productos del pedido y actualizar el total
    public function actualizarPedido()
    {
        if ($this->pedido) {
            // $this->productosEnPedido = pedido_producto::where('pedido_id', $this->pedido->id)
            //     ->with('producto')
            //     // ->groupBy('producto_id')
            //     ->get();
            $this->productosEnPedido = pedido_producto::selectRaw('
                pedido_productos.producto_id, 
                COUNT(pedido_productos.producto_id) as cantidad, 
                productos.nombre, 
                productos.valor_bruto, 
                productos.iva, 
                productos.descuento
            ')
            ->join('productos', 'pedido_productos.producto_id', '=', 'productos.id') // Unir con productos
            ->where('pedido_productos.pedido_id', 6)
            ->groupBy('pedido_productos.producto_id', 'productos.nombre', 'productos.valor_bruto', 'productos.iva', 'productos.descuento') // Agrupar por todos los campos seleccionados
            ->get();
            dd($this->productosEnPedido);
            $this->totalPedido = $this->pedido->total;
        }
    }

    public function render()
    {
        return view('livewire.productos')->layout('layouts.app');
    }
}