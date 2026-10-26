<?php

namespace App\Application\Controller\Admin\HTTP;

use App\Application\Controller\Controller;

use App\Application\Requests\Subscription\SubscriptionCreateRequest;
use App\Application\Requests\Subscription\SubscriptionCriteriaRequest;
use App\Application\Requests\Subscription\SubscriptionDeleteRequest;
use App\Application\Requests\Subscription\SubscriptionUpdateRequest;

use App\Application\Service\Subscription\SubscriptionCreateService;
use App\Application\Service\Subscription\SubscriptionDeleteService;
use App\Application\Service\Subscription\SubscriptionReadService;
use App\Application\Service\Subscription\SubscriptionUpdateService;

class SubscriptionController extends Controller
{
    public function boot(){
        $service = new SubscriptionReadService();
        $subscriptions = $service->readAll();
        return view("subscription",compact('subscriptions'));
    }
 
    public function filter(SubscriptionCriteriaRequest $request){
        $service = new SubscriptionReadService();
       $dto  = $request->toDto();
       $subscriptions = $service->read($dto);
       //return redirect('module',compact( 'module'));
       return view('subscription', compact('subscriptions'));
    }
    public function update(SubscriptionUpdateRequest $request){
        $service = new SubscriptionUpdateService();
        $dto = $request->toDto();
        $service->update($dto);
        return redirect('subscription');
    }
    public function delete(SubscriptionDeleteRequest $request){
        $service = new SubscriptionDeleteService();
        $id=$request->toID();
        $service->delete($id);
        return redirect('subscription');
    }
    public function create(SubscriptionCreateRequest $request){
        $service = new SubscriptionCreateService();
        $dto = $request->toDto();
        $service->create($dto);
        return redirect('subscription');
    }
}