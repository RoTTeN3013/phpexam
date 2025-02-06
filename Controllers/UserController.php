<?php

namespace Controllers;

use Models\UserModel;

class UserController extends BaseController
{
    public function registerUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = $_POST;

            $userModel = new UserModel();

            $errors = array();

            if (mb_strlen($post['reg_first_name']) == 0 || mb_strlen($post['reg_last_name']) == 0) {
                $errors[] = "Kereszt és vezetéknév megadása kötelező.";
            }

            if ($userModel->isUsernameExists($post['reg_username'])) {
                $errors[] = "A felhasználónév már szerepel az adatbázisban.";
            }

            if (mb_strlen($post['reg_username']) < 3 || mb_strlen($post['reg_username']) > 25) {
                $errors[] = "A felhasználónév minimum 3 és maximum 25 karakterből állhat.";
            }

            if (!filter_var($post['reg_email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Nem megfelelő email cím.";
            }

            if ($userModel->isEmailExists($post['reg_email'])) {
                $errors[] = "Az email cím már szerepel az adatbázisban.";
            }

            if (mb_strlen($post['reg_password']) < 3 || mb_strlen($post['reg_password']) > 25) {
                $errors[] = "A jelszó minimum 3 és maximum 25 karakterből állhat.";
            }

            if ($post['reg_password'] !== $post['reg_password_confirm']) {
                $errors[] = "A jelszó megerősítése sikertelen (beírt jelszavak nem egyeznek).";
            }

            //Amennyiben nincs hiba, a felhasználót regisztráljuk
            if (empty($errors)) {
                if ($userModel->insertUserDatas($post['reg_username'], $post['reg_password'], $post['reg_email'], $post['reg_first_name'], $post['reg_last_name'])) {
                    $_SESSION['success'] = 'Sikeres regisztráció! Most már bejelentkezhetsz!';
                } else {
                    $errors[] = "Hiba a mentés során. Kérlek próbáld újra.";
                }
            }

            if (!empty($errors)) { //Mivel a mentés során még keletlezhetett error, ellenőrizni kell
                $_SESSION['errors'] = $errors;
            }

            header("Location: /");
        } else {
            header("Location: /");
        }

        exit;
    }

    public function LogUserIn()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = $_POST;

            $userModel = new UserModel();
            $errors = array();

            //Megnézzük az adatok helyesk-e (modelben lévő metódussal)
            $result = $userModel->checkCredentials($post['username'], $post['password']);

            //Amennyiben a visszakapott érték tömb, tudjuk, hogy a check sikeres (visszakpajuk a user adatait)
            if (is_array($result)) {
                $user = $result; //A könnyebb átláthatóság miatt
                $_SESSION['success'] = 'Sikeres bejelentkezés!';
                $_SESSION['user_id'] = $user['id']; //Userid mentése session-ben
                header("Location: /profile");
            } else {
                $errors[] = $result;
                $_SESSION['errors'] = $errors;
                header("Location: /");
            }
        } else {
            header("Location: /");
        }

        exit;
    }

    public function logUserOut()
    {
        if (isset($_SESSION['user_id'])) {
            unset($_SESSION['user_id']);
        }

        header("Location: /");

        exit;
    }

    public function showProfile()
    {
        //Amennyiben nincs bejelentkezve visszairányítjuk
        if (!isset($_SESSION['user_id'])) {
            header("Location: /");
        } else {
            $userModel = new UserModel();
            $result = $userModel->fetchUserDatas($_SESSION['user_id']);

            if (is_array($result)) {
                $user = $result;
                $data['user'] = $user;
                return $this->View('profile', $data);
            } else {
                $data['errors'][] = $result;
                return $this->View('welcome', $data);
            }
        }
    }

    public function getUsersList()
    {
        if (isset($_SESSION['user_id'])) {
            $userModel = new UserModel();
            $users = $userModel->getAllUsers();

            $data['users'] = $users;

            return $this->View('users', $data);
        } else {
            header('location: /');
        }
    }

    public function deleteUser()
    {
        if (isset($_SESSION['user_id'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $post = $_POST;

                $userModel = new UserModel();
                $errors = array();

                if ($post['delete_id'] == 0) {
                    $errors[] = 'Nem található azonosító';
                    $_SESSION['errors'] = $errors;
                    header("Location: /users");
                    exit;
                }

                if ($post['delete_id'] == $_SESSION['user_id']) {
                    $errors[] = 'Saját magadat nem törölheted!';
                    $_SESSION['errors'] = $errors;
                    header("Location: /users");
                    exit;
                }

                if (!$userModel->deleteUser($post['delete_id'])) {
                    $errors[] = 'Nem található azonosító';
                } else {
                    $_SESSION['success'] = 'A felhasználó sikeresen törölve!';
                }

                if (!empty($errors)) {
                    $_SESSION['errors'] = $errors;
                }

                header("Location: /users");
            } else {
                header("Location: /users");
            }
        } else {
            header("Location: /");
        }
        exit;
    }

    public function editUserProfile()
    {
        if (isset($_SESSION['user_id'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $post = $_POST;
                $errors = array();
                $update_data = array();

                $userModel = new UserModel();

                $current_datas = $userModel->fetchUserDatas($_SESSION['user_id']);

                if (!is_array($current_datas)) {
                    $errors[] = 'Hiba a mentés közben.';
                    $_SESSION['errors'] = $errors;
                    header('location: /users');
                    exit;
                }

                //Amennyiben lett megadva username és az nem egyezik a jelenlegi username-el
                if (mb_strlen($post['mod_username'] > 0 && $post['mod_username'] != $current_datas['username'])) {
                    if ($userModel->isUsernameExists($post['mod_username'])) {
                        $errors[] = "A felhasználónév már szerepel az adatbázisban.";
                    }

                    if (mb_strlen($post['mod_username']) < 3 || mb_strlen($post['mod_username']) > 25) {
                        $errors[] = "A felhasználónév minimum 3 és maximum 25 karakterből állhat.";
                    }

                    $update_data['username'] = $post['mod_username']; //Adat átadása a tömbnek az update-hez
                }

                //Amennyiben lett megadva email és az nem egyezik a jelenlegi email-el
                if (mb_strlen($post['mod_email'] > 0 && $post['mod_email'] != $current_datas['email'])) {
                    if ($userModel->isEmailExists($post['mod_email'])) {
                        $errors[] = "Az email már szerepel az adatbázisban.";
                    }

                    if (!filter_var($post['mod_email'], FILTER_VALIDATE_EMAIL)) {
                        $errors[] = "Nem megfelelő email cím.";
                    }

                    $update_data['email'] = $post['mod_email'];
                }

                if (mb_strlen($post['mod_password']) > 0) {
                    if (mb_strlen($post['mod_password']) < 3 || mb_strlen($post['mod_password']) > 25) {
                        $errors[] = "A jelszó minimum 3 és maximum 25 karakterből állhat.";
                    }

                    if ($post['mod_password'] !== $post['mod_password_confirm']) {
                        $errors[] = "A jelszó megerősítése sikertelen (beírt jelszavak nem egyeznek).";
                    }

                    $update_data['password'] = $post['mod_password'];
                }

                //Amennyiben nincs hiba, a felhasználót módosítjuk
                if (empty($errors)) {
                    if ($userModel->updateUserDatas($_SESSION['user_id'], $update_data)) {
                        $_SESSION['success'] = 'Sikeres módosítás!';
                    } else {
                        $errors[] = "Hiba a mentés során. Kérlek próbáld újra.";
                    }
                }

                if (!empty($errors)) { //Mivel a mentés során még keletlezhetett error, ellenőrizni kell
                    $_SESSION['errors'] = $errors;
                }

                header("Location: /profile");
            } else {
                header("Location: /profile");
            }
        } else {
            header("Location: /");
        }
        exit;
    }

    public function __destruct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_SESSION['errors'])) {
                unset($_SESSION['errors']);
            }
            if (isset($_SESSION['success'])) {
                unset($_SESSION['success']);
            }
        }
    }
}
