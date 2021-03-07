<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponder;
use Illuminate\Support\Facades\Password;


class AuthController extends Controller
{
    use ApiResponder;

    public function register(Request $request)
    {
        $attr = $request->validate([
            'deviceId' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

        return $this->success([
            'user' => $user,
            'token' => $user->createToken($request->deviceId)->plainTextToken
        ]);
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'deviceId' => 'required|string',
            'email' => 'required|string|email|',
            'password' => 'required|string|min:8'
        ]);

        $userCredentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!Auth::attempt($userCredentials)) {
            return $this->error('Credentials not match', 401);
        }

        return $this->success([
            'token' => auth()->user()->createToken($request->deviceId)->plainTextToken
        ]);
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? $this->success([], 'Password reset link sent')
                    : $this->error('Password reset request failed', 401);
    }

}
