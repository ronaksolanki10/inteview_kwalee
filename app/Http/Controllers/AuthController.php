<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login;
use App\Http\Resources\Auth\Login as LoginResource;
use App\Interfaces\User as UserInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private UserInterface $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;    
    }

    /**
     * Valid login credentials
     * 
     * @param  \App\Http\Requests\Auth\Login $request
     * @return \App\Http\Resources\Auth\Login
     */
    public function login(Login $request)
    {
        $user = $this->user->findByEmail($request->email);
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => trans('auth.invalid_credential'),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        if (!empty($user->tokens)) {
            foreach ($user->tokens as $token) {
                $token->delete();
            }
        }
        $accessToken = $user->createToken('ADMIN ACCESS')->plainTextToken;
        
        return new LoginResource(['access_token' => $accessToken]);
    }
}
