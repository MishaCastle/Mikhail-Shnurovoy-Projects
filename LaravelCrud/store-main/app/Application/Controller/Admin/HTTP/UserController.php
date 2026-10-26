<?php
namespace App\Application\Controller\Admin\HTTP;
use App\Application\Controller\Controller;

use App\Application\Requests\User\UserCreateRequest;
use App\Application\Requests\User\UserCriteriaRequest;
use App\Application\Requests\User\UserDeleteRequest;
use App\Application\Requests\User\UserUpdateRequest;


use App\Application\Service\User\UserCreateService;
use App\Application\Service\User\UserUpdateService;
use App\Application\Service\User\UserDeleteService;
use App\Application\Service\User\UserReadService;
class UserController extends Controller
{
    public function boot(){
        $service = new UserReadService();
        $users = $service->readAll();
        return view("user",compact('users'));
    }
 
    public function filter(UserCriteriaRequest $request){
        $service = new UserReadService();
       $dto  = $request->toDto();
       $users = $service->read($dto);
       //return redirect('module',compact( 'module'));
       return view('user', compact('users'));
    }
    public function update(UserUpdateRequest $request){
        $service = new UserUpdateService();
        $dto = $request->toDto();
        $service->update($dto);
        return redirect('user');
    }
    public function delete(UserDeleteRequest $request){
        $service = new UserDeleteService();
        $id=$request->toID();
        $service->delete($id);
        return redirect('user');
    }
    public function create(UserCreateRequest $request){
        $service = new UserCreateService();
        $dto = $request->toDto();
        $service->create($dto);
        return redirect('user');
    }

}