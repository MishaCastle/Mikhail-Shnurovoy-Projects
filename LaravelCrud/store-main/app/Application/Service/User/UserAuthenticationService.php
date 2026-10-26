<?php

namespace App\Application\Service\User;

use App\Application\Requests\User\UserAuthenticationRequest;
use Illuminate\Support\Facades\Auth;
use App\Infrastructure\Model\User;

class UserAuthenticationService
{
    public function authenticate(UserAuthenticationRequest $request): void
    {
        $credentials = $request->only('login', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
        } 
        else {
            throw new \Exception('Invalid credentials');
            
        }
    }
}