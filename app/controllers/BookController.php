<?php
namespace app\controllers;

use app\Models\Book;
use core\Router;

class BookController extends MainController
{
    protected string $layout = LAYOUT;
    protected string $view = 'book/index.php';

    public function index()
    {
        $data = (new Book)->getLastByCount();
        $this->vars = ['data' => $data];
        $this->loadView();
    }

    public function add()
    {
        if($this->isAjax() && $this->isPost()){
            $res = Book::add(Router::post());
            echo json_encode($res);
            return;
        }
        return false;
    }

    public function getTable()
    {
        if($this->isAjax() && $this->isGet()){
            $this->layout = '';
            $this->view = 'book/table.php';
            $data = (new Book)->getLastByCount();
            $this->vars = ['data' => $data];
            $this->loadView();
            return;
        }
        return false;
    }
    
}