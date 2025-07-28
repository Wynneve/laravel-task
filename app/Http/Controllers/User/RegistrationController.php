<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegistrationController extends Controller {
    public function __invoke(Request $request) {
        // валидация
        $data = $request->validate([
            'email' => ['required', 'email', "unique:users,email"],
            'password' => ['required', Password::defaults()],
            'gender' => ['required', 'in:male,female']
        ]);

        // создание пользователя
        $user = User::create([
            'name' => explode('@', $data['email'])[0],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender']
        ]);

        // генерация токена
        $token = $user->createToken('api-token')->plainTextToken;

        // ответ с пользователем и токеном
        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }
}