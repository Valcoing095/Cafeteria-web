<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Usuario;

class AuthController extends Controller
{


    public function register(Request $request)
    {
        try{
            // Validar request
            $validateRequest = $request->validate([
                'nombre'   => 'required|string',
                'apellido' => 'required|string',
                'email'    => 'required|string|email|unique:usuarios,email',
                'password' => 'required|string|min:6',
            ]);
        
            // Crear usuario con contraseña encriptada
            $usuario = Usuario::create([
                'nombre'   => $validateRequest['nombre'],
                'apellido' => $validateRequest['apellido'],
                'email'    => $validateRequest['email'],
                'password' => bcrypt($validateRequest['password']), // 🔹 Se encripta la contraseña
                'id_rol'   => 1, // 🔹 Se cambia 'i_rol' por 'id_rol'
            ]);
        
            return response()->json([
                'message' => 'Usuario registrado exitosamente',
                'user'    => $usuario,
            ], 201);

        }catch (ValidationException $e) {
            // Captura los errores de validación y los devuelve en formato JSON
            return response()->json([
                'message' => 'Error en el registro',
                'errors'  => $e->errors(),
            ], 422);
        }
    }


    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!Auth::attempt($credentials)){
            return response()->json(['message' => 'Invalid Credentials'],401);
        }

        $user = Auth::user();

        // $payload = [
        //     'sub' => $user->id,
        //     'email' => $user->email,
        //     'exp' => now()->addHours(4)->timestamp, // Expira en 2 horas
        // ];

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'Message' => 'Login success',
            'user' => ["email"=>$user->email,"id"=>$user->id,'token' => $token]
        ]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = Usuario::with('rolingroles')->get();
       
        return response()->json($users) ;
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
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auth $auth)
    {
        //
    }
}
