<?php

namespace App\Http\Controllers;

use App\Models\pedido;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PedidoController extends Controller
{


    public function crearPedido(Request $request){
        try{

            dd($request);
            
            #Validar que si llegue el usuario en el request
              // Validar request
            $validarRequest = $request->validate([
                'user_id' => 'required|exists:usuarios,id',
            ]);
            
            #Instanciar el modelo pedido y crear uno
            // $pedido = new Pedido();
            // $pedido->total = 0;
            // $pedido->estado = "Pendiente";
            // $pedido->save();

            if (!isset($validarRequest["user_id"])) {
                return response()->json(['error' => 'El user_id es requerido'], 422);
            }

            $pedido = Pedido::create([
                'user_id' => $validarRequest["user_id"],
                'total'      => 0,
                'estado'     => 'Pendiente'
            ]);

            return response()->json([
                'message' => 'Su pedido ha cido creado existosamente',
                'user'    => $pedido,
            ], 201);



        }catch(\Exception $e) {
            return response()->json([
                "error"=>$e->getMessage()
            ]);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pedido $pedido)
    {
        //
    }
}
