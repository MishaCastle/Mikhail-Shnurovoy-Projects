<?php

use Illuminate\Support\Facades\Route;
use App\Application\Controller\Admin\HTTP\ModuleController;
use App\Application\Controller\Admin\HTTP\UserController;
use Illuminate\Http\Request;
use App\Application\Controller\Admin\HTTP\OrganizationController;
use App\Application\Controller\Admin\HTTP\SubscriptionController;
Route::get('/', function () {
    return view('welcome');

});

//Route::get('/module', [ModuleController::class,'boot']);


Route::prefix('module')->group(function () {
    Route::get('/', [ModuleController::class,'boot']);
    Route::post('/read',[ModuleController::class, 'filter']);
    Route::post('/update', [ModuleController::class, 'update']);
    Route::post('/create', [ModuleController::class, 'create']);
    Route::post('/delete', [ModuleController::class, 'delete']);
});

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class,'boot']);
    Route::post('/read',[UserController::class, 'filter']);
    Route::post('/update', [UserController::class, 'update']);
    Route::post('/create', [UserController::class, 'create']);
    Route::post('/delete', [UserController::class, 'delete']);
});
Route::prefix('organization')->group(function () {
    Route::get('/', [OrganizationController::class,'boot']);
    Route::post('/read',[OrganizationController::class, 'filter']);
    Route::post('/update', [OrganizationController::class, 'update']);
    Route::post('/create', [OrganizationController::class, 'create']);
    Route::post('/delete', [OrganizationController::class, 'delete']);
});
Route::prefix('subscription')->group(function () {
    Route::get('/', [SubscriptionController::class,'boot']);
    Route::post('/read',[SubscriptionController::class, 'filter']);
    Route::post('/update', [SubscriptionController::class, 'update']);
    Route::post('/create', [SubscriptionController::class, 'create']);
    Route::post('/delete', [SubscriptionController::class, 'delete']);
});
Route::prefix('organizationUser')->group(function () {
    Route::get('/', [\App\Application\Controller\Admin\HTTP\OrganizationUserController::class,'boot']);
    Route::post('/read',[\App\Application\Controller\Admin\HTTP\OrganizationUserController::class, 'filter']);
    Route::post('/update', [\App\Application\Controller\Admin\HTTP\OrganizationUserController::class, 'update']);
    Route::post('/create', [\App\Application\Controller\Admin\HTTP\OrganizationUserController::class, 'create']);
    Route::post('/delete', [\App\Application\Controller\Admin\HTTP\OrganizationUserController::class, 'delete']);
});
Route::get('/registration', [\App\Application\Controller\User\RegistrationController::class,'boot']);
Route::post('/registration', [\App\Application\Controller\User\RegistrationController::class,'create']);
Route::get('/login', [\App\Application\Controller\User\AuthenticationController::class,'boot']);
Route::post('/login', [\App\Application\Controller\User\AuthenticationController::class,'authenticate']);
Route::middleware('auth')->group(function () {
    Route::get('/testinglaravel', [\App\Application\Controller\Testinglaravel\ControllerSession::class,'boot']);
});
