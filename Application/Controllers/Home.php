<?php

use MVC\Controller;

class ControllersHome extends Controller
{

    public function index()
    {
        $this->view->show('index');
    }
}
