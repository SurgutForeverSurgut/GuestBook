<?php

namespace app\controllers;

use vendor\core\View;

class MainController extends BaseController
{

    public function index()
    {
        View::render('book/index.php', $this->layout, $this->vars);
    }
    
}