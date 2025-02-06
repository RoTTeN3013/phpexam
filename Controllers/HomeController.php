<?php

namespace Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $data['text'] = "Anyuka";
        $this->View('welcome', $data);
    }
}
