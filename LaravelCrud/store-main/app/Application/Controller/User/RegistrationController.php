<?php

namespace App\Application\Controller\User;

use App\Application\Controller\Controller;  
use App\Application\Requests\User\UserRegistrationRequest;
use App\Application\Service\User\UserCreateService;
class RegistrationController extends Controller
{
    public function boot(){
        return view("registration");
    }
    public function create(UserRegistrationRequest $request){
        $service = new UserCreateService();
        $dto = $request->toDto();
        $service->create($dto);
        return redirect('registration');
    }
}