<?php

namespace vendor\core;

class View
{
    public static function render($view, $layout, $vars = [])
    {
        if(is_array($vars)) extract($vars);

        $file_view = VIEWS . "$view";
        ob_start();
        if(is_file($file_view)){
            require $file_view;
        }else{
            echo "<h1>Не найдено представление {$file_view}</h1>";
        }
        $content = ob_get_clean();

        if (is_file($layout)) {
            require $layout;
        } else {
            echo "<h1>Не найден шаблон {$layout}</h1>";
        }
        
    }
}