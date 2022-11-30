<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Falha na validação',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        return response()->json([
            'message' => 'Registro bem-sucedido',
            'data' => $user
        ], 200);
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Falha na validação',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {

            if (Hash::check($request->password, $user->password)) {

                $token = $user->createToken('auth-token')->plainTextToken;

                return response()->json([
                    'message' => 'Logado com Sucesso!!!',
                    'token' => $token,
                    'data' => $user
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Credenciais incorretas',
                ], 400);
            }
        } else {

            return response()->json([
                'message' => 'Credenciais incorretas',
            ], 400);
        }
    }

    public function user(Request $request)
    {
        return response()->json([
            'message' => 'Usuário obtido com sucesso',
            'data' => $request->user()
        ], 200);
    }

    public function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Usuário desconectado com sucesso, Volte Sempre',
        ], 200);
    }
}
