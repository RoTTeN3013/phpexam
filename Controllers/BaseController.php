<?php

namespace Controllers;

class BaseController
{
    public function View($view, $data = [])
    {
        extract($data);
        require_once(__DIR__ . "/../Views/navigation.php");
        require_once(__DIR__ . "/../Views/$view.php");
        require_once(__DIR__ . "/../Views/footer.php");
    }
}
