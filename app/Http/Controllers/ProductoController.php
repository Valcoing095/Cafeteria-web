<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use function PHPUnit\Framework\containsEqual;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = producto::all();
        return view('products.index',compact('productos'));

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
        $producto = new producto();
        $producto->nombre_producto= $request->nombre;
        $producto->referencia= $request->referencia;
        $producto->precio= $request->precio;
        $producto->peso= $request->peso;
        $producto->categoria= $request->categoria;
        $producto->stock= $request->stock;
        $producto->fechadecreacion= Carbon::now();
        $producto->save();

        $productos = producto::all();
        return redirect()->route('producto.index')->with('success','Company Has Been updated successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = producto::where('id',$id)
        ->get();

        return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = producto::where('id',$id)
        ->first();
        return view('products.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id )
    {

        $request->validate([
            'nombre' => 'required',
            'referencia' => 'required',
            'peso' => 'required',
        ]);
        producto::where('id',$id)
                ->update([
                    'nombre_producto' => $request->nombre,
                    'referencia' => $request->referencia,
                    'peso' => $request->peso,
                    'stock' => $request->stock,
                ]);

        return redirect()->route('producto.index')->with('success','Company Has Been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=producto::find($id)->delete();
        if ($res){
            $data=[
            'status'=>'1',
            'msg'=>'success'
        ];
        }else{
            $data=[
            'status'=>'0',
            'msg'=>'fail'
        ];
        }

        $productos = producto::all();
        return redirect()->route('producto.index')->with('success','Company Has Been updated successfully');
    }
}
