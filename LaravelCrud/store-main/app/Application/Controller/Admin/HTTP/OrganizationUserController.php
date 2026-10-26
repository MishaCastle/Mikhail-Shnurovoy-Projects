<?php

namespace App\Application\Controller\Admin\HTTP;

use App\Application\Controller\Controller;

use App\Application\Requests\OrganizationUser\OrganizationUserCreateRequest;
use App\Application\Requests\OrganizationUser\OrganizationUserCriteriaRequest;
use App\Application\Requests\OrganizationUser\OrganizationUserDeleteRequest;
use App\Application\Requests\OrganizationUser\OrganizationUserUpdateRequest;

use App\Application\Service\OrganizationUser\OrganizationUserCreateService;
use App\Application\Service\OrganizationUser\OrganizationUserDeleteService;
use App\Application\Service\OrganizationUser\OrganizationUserReadService;
use App\Application\Service\OrganizationUser\OrganizationUserUpdateService;

class OrganizationUserController extends Controller
{
    public function boot()
    {
        $service = new OrganizationUserReadService();
        $organizationUsers = $service->readAll();
        return view('organizationUser', compact('organizationUsers'));
    }

    public function filter(OrganizationUserCriteriaRequest $request)
    {
        $service = new OrganizationUserReadService();
        $dto = $request->toDto();
        $organizationUsers = $service->read($dto);
        return view('organizationUser', compact('organizationUsers'));
    }
    public function update(OrganizationUserUpdateRequest $request)
    {
        $service = new OrganizationUserUpdateService();
        $dto = $request->toDto();
        $service->update($dto);
        return redirect('organizationUser');
    }

    public function delete(OrganizationUserDeleteRequest $request)
    {
        $service = new OrganizationUserDeleteService();
        $id = $request->toID();
        $service->delete($id);
        return redirect('organizationUser');
    }

    public function create(OrganizationUserCreateRequest $request)
    {
        $service = new OrganizationUserCreateService();
        $dto = $request->toDto();
        $service->create($dto);
        return redirect('organizationUser');
    }
}