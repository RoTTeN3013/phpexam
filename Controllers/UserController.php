<?php

namespace Controllers;

use Controllers\BaseController;

class UserController extends BaseController
{
    public function getAllUsers()
    {
        include(__DIR__ . "/../Views/navigation.php");
        include(__DIR__ . "/../Views/footer.php");
    }
}