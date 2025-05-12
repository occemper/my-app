<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request)
    {
        $request->validate(
            [
                "email" => "required|email",
                "password" => "required"
            ]
        );

        $user = \App\Models\User::where("email", $request->email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                "email" => "The provided credentials are incorrect"
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                "email" => "The provided credentials are incorrect"
            ]);
        }

        $token = $user->createToken("api-token")->plainTextToken;

        return response()->json([
            "token" => $token,
        ]);
    }
}
