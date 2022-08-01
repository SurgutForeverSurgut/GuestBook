<?php
namespace app\controllers;

use core\Controller;

class BaseController extends Controller
{
    protected string $view;
    protected string $layout;

    public function __construct($route)
    {
        $this->route = $route;
        
    }
}