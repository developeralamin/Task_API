<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param LoginRequest $request
     *
     * @return JsonResponse|Response
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return $this->fail('Incorrect email address. Please use correct email');
        }

        if ($user && Hash::check($request->password, $user->password)) {
            $token    = $user->createToken('authToken')->plainTextToken;
            $response = [
                'user'  => new AuthResource($user),
                'token' => $token
            ];
            return $this->success($response);
        }

        return $this->fail('Invalid credentials.');
    }


    /**
     * Creating  a new User.
     *
     * @param RegisterRequest $request
     */
    public function register(RegisterRequest $request)
    {
        User::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return $this->success('User Created Successfull');
    }
}
