<?php

namespace App\Application\Controller\Admin\HTTP;

use App\Application\Controller\Controller;

use App\Application\Requests\Organization\OrganizationCreateRequest;
use App\Application\Requests\Organization\OrganizationCriteriaRequest;
use App\Application\Requests\Organization\OrganizationDeleteRequest;
use App\Application\Requests\Organization\OrganizationUpdateRequest;

use App\Application\Service\Organization\OrganizationCreateService;
use App\Application\Service\Organization\OrganizationDeleteService;
use App\Application\Service\Organization\OrganizationReadService;
use App\Application\Service\Organization\OrganizationUpdateService;

class OrganizationController extends Controller
{
    

    public function boot(){
        $service = new OrganizationReadService();
        $organizations = $service->readAll();
        return view("organization",compact('organizations'));
    }
 
    public function filter(OrganizationCriteriaRequest $request){
        $service = new OrganizationReadService();
       $dto  = $request->toDto();
       $organizations = $service->read($dto);
       //return redirect('module',compact( 'module'));
       return view('organization', compact('organizations'));
    }
    public function update(OrganizationUpdateRequest $request){
        $service = new OrganizationUpdateService();
        $dto = $request->toDto();
        $service->update($dto);
        return redirect('organization');
    }
    public function delete(OrganizationDeleteRequest $request){
        $service = new OrganizationDeleteService();
        $id=$request->toID();
        $service->delete($id);
        return redirect('organization');
    }
    public function create(OrganizationCreateRequest $request){
        $service = new OrganizationCreateService();
        $dto = $request->toDto();
        $service->create($dto);
        return redirect('organization');
    }
}