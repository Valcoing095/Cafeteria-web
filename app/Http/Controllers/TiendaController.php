<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\ventaProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = producto::all();
        return view('tienda.index',compact('productos'));
    }

    public function ventas()
    {
        $ventas = DB::select(
            "SELECT
            *
            FROM venta_producto
            INNER JOIN productos ON
            productos.id = venta_producto.id_producto"
        );

        $vendido = DB::select(
            "SELECT MAX(stock_vendido) AS vendido FROM venta_producto"
        );

        $masVendido =$vendido[0]->vendido;
        $stock = DB::select(
            "SELECT MAX(stock) AS stock FROM productos"
        );
        $masStock= $stock[0]->stock;
        return view('tienda.ventas',compact('ventas','masVendido','masStock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $producto = producto::where('id',$id)->first();
        if($request->stock > $producto->stock){
            $request->stock = null;
        }else{
            $venta_producto = new ventaProducto();
            $venta_producto->id_producto = $id;
            $venta_producto->stock_vendido= $request->stock;
            $venta_producto->save();
        }

        $request->validate([
            'stock' => 'required',
        ]);



        $stock= ($producto->stock - $request->stock);
        producto::where('id',$id)
        ->update([
            'stock' => $stock,
        ]);


        return redirect()->route('tienda.index')->with('success','producto vendido satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
