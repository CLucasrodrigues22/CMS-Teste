<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthRequest;
use App\Http\Requests\UpdateAuthRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // POST [name, email, password]
    public function register(StoreAuthRequest $request)
    {
        try {
            User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password)
            ]);
            return response()->json([
                'status' => true,
                'message' => 'User created successfully!'
            ], 201);
        } catch (\Exception $e) {
            // Log with details
            Log::channel('error_file')->error('Error: ' . $e->getMessage());

            return response()->json([
                "status" => false,
                "message" => "Ocorreu um erro ao registrar o usuário, tente novamente mais tarde!",
            ], 500);
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
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Endereço de e-mail ou senha incorreto!',
                        'data' => []
                    ], 200);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Endereço de e-mail ou senha incorreto!',
                    'data' => []
                ], 200);
            }
        } catch (\Exception $e) {
            // Log with details
            Log::channel('error_file')->error('Error: ' . $e->getMessage());

            return response()->json([
                "status" => false,
                "message" => "Ocorreu um erro no login, tente novamente mais tarde!",
            ], 500);
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
            'message' => 'Profile information',
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
            'message' => 'User logged out!',
            'data' => []
        ]);
    }
}
