<?php

class View
{
    public static function render($view, $data = [])
    {
        extract($data);
        require_once "../views/{$view}.php";
        return ob_get_clean();
    }
}

