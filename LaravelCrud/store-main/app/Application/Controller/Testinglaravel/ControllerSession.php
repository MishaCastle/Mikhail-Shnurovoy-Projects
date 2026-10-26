<?php

namespace App\Application\Controller\Testinglaravel;

use App\Application\Controller\Controller;
Class ControllerSession extends Controller
{
    public function boot(){
        dd(session()->all());
        return view("testinglaravel");
    }
}