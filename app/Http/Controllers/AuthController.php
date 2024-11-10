<?php

namespace App\Http\Controllers;

use App\Http\Library\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function __construct(private readonly UserRepositoryInterface $userRepository){}


    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if ($token = JWTAuth::attempt($credentials)) {
                return response()->json(['token' => $token]);
            }

            return response()->json(['error' => 'Unauthorized'], 401);
        } catch (\Throwable $th) {
            Log::error('There is an error occured in login method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured in login method!'
            ],422);
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            $request->merge(['password' => Hash::make($request->get('password'))]);

            $this->userRepository->create($request);
    
            return response()->json(['message' => 'User created successfully'], 201);
        } catch (\Throwable $th) {
            Log::error('There is an error occured in register method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured in register process!'
            ],422);
        }
    }

    public function logout(Request $request)
    {
        try {
            $token = $request->bearerToken();

            JWTAuth::invalidate($token);

            return response()->json(['message' => 'Successfully logged out']);
        } catch (\Throwable $th) {
            Log::error('There is an error occured in logout method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured in logout process!'
            ],422);
        }
    }
}

