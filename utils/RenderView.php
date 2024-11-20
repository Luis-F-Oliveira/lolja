<?php

namespace Utils;

class RenderView
{
    public function loadView($view, $args)
    {
        extract($args);

        require_once __DIR__."../../resource/Views/$view.php";
    }
}
