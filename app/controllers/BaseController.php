<?php
namespace app\controllers;

use vendor\core\Controller;

class BaseController extends Controller
{
    public function __construct($route)
    {
        $this->route = $route;
        $this->layout = LAYOUT;
    }
}