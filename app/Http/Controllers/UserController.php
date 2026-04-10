<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser (Request $request) {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'second_surname' => $request->second_surname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return response()->json(['status' => true, 
        'message' => 'usuario creado con éxito',
        'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }

    public function loginUser(Request $request){
        if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json(['status' => false, 'message'=> 'Credenciales inválidas'], 401);
        };

        $user = User::where('email', $request->email)->first();
        return response()->json([
            'status' => true,
            'message' => 'Usuario autenticado correctamente',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }

    public function userLogout () {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'message' => 'sesión cerrada correctamente'
        ]);
    }

    public function index () {
        $users = User::all();
        return response()->json($users, 200);
    }
}
