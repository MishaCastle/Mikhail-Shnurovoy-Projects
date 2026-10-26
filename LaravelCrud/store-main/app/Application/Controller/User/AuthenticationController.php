<?php

namespace App\Application\Controller\User;

use App\Application\Controller\Controller;  
use App\Application\Requests\User\UserAuthenticationRequest;
use App\Application\Service\User\UserAuthenticationService;
class AuthenticationController extends Controller
{
    public function boot(){
        return view("authentication");
    }
    public function authenticate(UserAuthenticationRequest $request){
        $service = new UserAuthenticationService();
        
        $service->authenticate($request);
        return redirect()->intended('');
    }
}