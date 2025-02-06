<?php

namespace Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $this->View('welcome');
    }
}
