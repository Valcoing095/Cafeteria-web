<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{


    public function register(Request $request){
        $validateRequest = $request->validate([
            'name' => 'required|string|max|255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'require|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $validateRequest['name'],
            'email' => $validateRequest['email'],
            'password' => $validateRequest['password']
        ]);

        return response()->json([
            'Message' => 'Successful user registration',
            'User' => $user,        
            ],201);

    }


    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!Auth::attempt($credentials)){
            return response()->json(['message' => 'Invalid Credentials'],401
        );

        $user = Auth::user();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'Message' => 'Login success',
            'user' => $user,
            'token' => $token
        ]);

        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
