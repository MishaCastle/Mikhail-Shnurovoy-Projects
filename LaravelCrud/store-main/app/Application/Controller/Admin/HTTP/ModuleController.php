<?php
namespace App\Application\Controller\Admin\HTTP;
use App\Application\Controller\Controller;


use App\Application\Requests\Module\ModuleCreateRequest;
use App\Application\Requests\Module\ModuleCriteriaRequest;
use App\Application\Requests\Module\ModuleDeleteRequest;
use App\Application\Requests\Module\ModuleUpdateRequest;


use App\Application\Service\Module\ModuleCreateService;
use App\Application\Service\Module\ModuleUpdateService;
use App\Application\Service\Module\ModuleDeleteService;
use App\Application\Service\Module\ModuleReadService;


class ModuleController extends Controller
{
    public function boot(){
        $service = new ModuleReadService();
        $module = $service->readAll();
        return view("module",compact('module'));
    }
 
    public function filter(ModuleCriteriaRequest $request){
        $service = new ModuleReadService();
       $dto  = $request->toDto();
       $module = $service->read($dto);
       //return redirect('module',compact( 'module'));
       return view('module', compact('module'));
    }
    public function update(ModuleUpdateRequest $request){
        $service = new ModuleUpdateService();
        $dto = $request->toDto();
        $service->update($dto);
        return redirect('module');
    }
    public function delete(ModuleDeleteRequest $request){
        $service = new ModuleDeleteService();
        $id=$request->toID();
        $service->delete($id);
        return redirect('module');
    }
    public function create(ModuleCreateRequest $request){
        $service = new ModuleCreateService();
        $dto = $request->toDto();
        $service->create($dto);
        return redirect('module');
    }
}
