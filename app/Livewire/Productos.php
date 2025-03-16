<?php

namespace App\Livewire;
use App\Models\producto;
use Livewire\Component;

class Productos extends Component
{

    
    public $productos;
    public function getProductos(){
        $this->productos =  Producto::with('categoriaProducto')->get();
        // dd($this->productos);
    }
    public function render()
    {
        $this->getProductos();
        return view('livewire.productos')
        ->layout('layouts.app');
    }
}
