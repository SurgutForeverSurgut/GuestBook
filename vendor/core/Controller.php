<?php
namespace vendor\core;

abstract class Controller
{
    protected array $vars = ['q' => 123];
    protected array $route = [];
    protected string $view;
    protected string $layout;    

    public function __get($property) 
    {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
    }
    
    public function __set($property, $value) 
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }
}
