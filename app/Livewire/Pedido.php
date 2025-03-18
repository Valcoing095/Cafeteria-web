<?php

namespace App\Livewire;

use Livewire\Component;

class Pedido extends Component
{
    public $productosRecibidos = [];

    // Definir el listener que escucha el evento 'productosSeleccionados'
    protected $listeners = ['productosSeleccionados' => 'recibirProductos'];

    public function recibirProductos($productos)
    {
        // Guardar el array recibido en la propiedad del componente
        $this->productosRecibidos = $productos;
    }
    
    public function render()
    {

        dd($this->productosRecibidos);
        return view('livewire.pedido');
    }
}
