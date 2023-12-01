<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //
    public function signUp(SignUpRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return response()->json([
            'message' => 'Usuario registrado!'
        ], 201);
    }
    
    // public function login(LoginRequest $request)
    // {
    //     $credentials = request(['email', 'password']);

    //     if (!Auth::attempt($credentials))
    //         return response()->json([
    //             'message' => 'Unauthorized'
    //         ], 401);

    //     $user = $request->user();
    //     $tokenResult = $user->createToken('Personal Access Token');

    //     // $token = $tokenResult->token;
    //     // if ($request->remember_me)
    //     //     $token->expires_at = Carbon::now()->addWeeks(1);
    //     // else{
    //     //     $token->expires_at = Carbon::now()->addDays(2);

    //     // }
    //     // $token->save();

    //     return response()->json([
    //         'access_token' => $tokenResult->plainTextToken,
    //         'token_type' => 'Bearer',
    //         //'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
    //     ]);
    // }
   public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }
  
    /**
     * Cierre de sesión (anular el token)
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'sesion finalizada'
        ]);
    }
  
    /**
     * Obtener el objeto User como json
     */
    public function user(Request $request)
    {   
        $user = $request->user()->only(['name', 'email', 'perro_id']);

        return response()->json($user);
    }

    public function actualizarUsuario(Request $request)
    {
        $user = $request->user();
        // $user->name = $request->name;
        $user->perro_id = $request->perro_id;
        $user->save();
        return response()->json([
            'message' => 'Usuario actualizado!'
        ], 201);
    }

}
