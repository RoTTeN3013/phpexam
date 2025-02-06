<?php

namespace Models;

class UserModel extends BaseModel
{
    public function isUsernameExists($username)
    {
        $query = "SELECT username FROM users WHERE username = '$username'";
        $result = $this->connection->query($query);

        if (!$result->num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function isEmailExists($email)
    {
        $query = "SELECT email FROM users WHERE email = '$email'";
        $result = $this->connection->query($query);

        if (!$result->num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function insertUserDatas($username, $password, $email, $first_name, $last_name)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $full_name = $last_name . ' ' . $first_name;
        $query = "INSERT INTO users (username, email, password, fullname) VALUES ('$username', '$email', '$hashedPassword', '$full_name')";
        $insertResult = $this->connection->query($query);

        return $insertResult;
    }

    public function checkCredentials($username, $password)
    {
        $query = "SELECT id, username, password FROM users WHERE username = '$username'";
        $result = $this->connection->query($query);

        // Létezik-e a felhasználó
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                $error = 'A megadott jelszó helytelen.';
                return $error;
            }
        } else {
            $error = 'A felhasználónév nem létezik.';
            return $error;
        }
    }

    public function fetchUserDatas($userid = 0)
    {
        if ($userid !== 0) {
            $query = "SELECT* FROM users WHERE id = '$userid'";
            $result = $this->connection->query($query);

            // Létezik-e a felhasználó
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                return $user;
            } else {
                $error = 'Hiba az adatok betöltése közben.';
                return $error;
            }
        } else {
            $error = 'Nem található azonosító.';
            return $error;
        }
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $result = $this->connection->query($query);
        $users = $result->fetch_all(MYSQLI_ASSOC);

        return $users;
    }

    public function deleteUser($userid)
    {
        $query = "DELETE FROM users WHERE id = '$userid'";

        if ($this->connection->query($query)) {
            return true;
        } else {
            return false;
        }
    }
}
