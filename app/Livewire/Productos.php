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
    public function actionProducto($producto_id,$action)
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
            if($action =="add"){
                $productoPedido->increment('cantidad'); // Aumenta en 1
                $productoPedido->increment('subTotal', $productoPedido->producto->valor_bruto);
            }else{
                if ($productoPedido->cantidad >1){
                    $productoPedido->decrement('cantidad'); // Aumenta en 1
                    $productoPedido->decrement('subTotal', $productoPedido->producto->valor_bruto);
                }else{
                    // Si la cantidad es 1, eliminar el producto del pedido
                     $productoPedido->delete();
                }
            }
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
        if($action=="add"){
            $this->pedido->total += Producto::find($producto_id)->valor_bruto;
        }else{
            $this->pedido->total -= Producto::find($producto_id)->valor_bruto;
        }
        $this->pedido->save();

        $this->actualizarPedido();

        session()->flash('message', 'Producto añadido correctamente');
    }

    # Obtener productos del pedido y actualizar el total


    private function obtenerProductosPedido()
{
    return pedido_producto::with('producto')
        ->where('pedido_productos.pedido_id', $this->pedido->id)
        ->get();
}
    public function actualizarPedido()
    {
        if ($this->pedido) {

            $this->productosEnPedido = $this->obtenerProductosPedido();
            $this->totalPedido = $this->pedido->total;
        }
    }

    public function facturar_pedido(){
        $pedido = $this->obtenerProductosPedido();
        // return redirect()->route('pedido.detalle', ['pedido' => $pedido->id]);
        $this->emit('productosSeleccionados', $pedido);
        
    }

    public function render()
    {
        return view('livewire.productos')->layout('layouts.app');
    }
}