<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    // POST [name, email, password]
    public function register(StoreAuthRequest $request)
    {
        try {
            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password)
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Usuário criado com sucesso!'
            ], 201)->header('Access-Control-Allow-Origin', '*');
        } catch (\Exception $e) {
            // Log with details
            Log::channel('error_file')->error('Error: ' . $e->getMessage());

            return response()->json([
                "status" => false,
                "message" => "Ocorreu um erro ao registrar o usuário, tente novamente mais tarde!",
            ], 500)->header('Access-Control-Allow-Origin', '*');
        }
    }

    // POST [email, password]
    public function login(LoginRequest $request)
    {
        try {
            // email check
            $user = User::where("email", $request->email)->first();

            if (!empty($user)) {
                // User check
                if (Hash::check($request->password, $user->password)) {
                    // Password matched
                    $token = $user->createToken('token')->plainTextToken;
                    return response()->json([
                        'status' => true,
                        'message' => 'Sessão iniciada com sucesso!',
                        'token' => $token,
                        'data' => []
                    ], 200)->header('Access-Control-Allow-Origin', '*');
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Endereço de e-mail ou senha incorreto!',
                        'data' => []
                    ], 200)->header('Access-Control-Allow-Origin', '*');
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Endereço de e-mail ou senha incorreto!',
                    'data' => []
                ], 200)->header('Access-Control-Allow-Origin', '*');
            }
        } catch (\Exception $e) {
            // Log with details
            Log::channel('error_file')->error('Error: ' . $e->getMessage());

            return response()->json([
                "status" => false,
                "message" => "Ocorreu um erro no login, tente novamente mais tarde!",
            ], 500)->header('Access-Control-Allow-Origin', '*');
        }
    }

    // GET [Auth: Token]
    public function profile()
    {
        // Check auth instance
        $userData = auth()->user();

        // Find profile related
        $profile = $userData->profile;

        return response()->json([
            'status' => true,
            'message' => 'Informações do perfil',
            'id' => auth()->user()->id,
            'data' => $userData
        ]);
    }

    // GET [Auth: Token]
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'message' => 'Sessão finalizada!',
            'data' => []
        ]);
    }
}
