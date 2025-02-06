<?php

namespace Controllers;

use Controllers\BaseController;
use Models\UserModel;

class UserController extends BaseController
{
    public function registerUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = $_POST;

            $userModel = new UserModel();
            if ($userModel->isUsernameExists($post['reg_username'])) {
                $data['message'] = "A felhasználónév már szerepel az adatbázisban.";
            } else {
                $data['message'] = "A felhasználónév nem szerepel az adatbázisban.";
            }

            return $this->View('welcome', $data);
        } else {
            return $this->View('welcome');
        }
    }
}
