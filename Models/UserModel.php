<?php

namespace Models;

class UserModel extends BaseModel
{
    public function isUsernameExists($username)
    {
        $query = "SELECT username FROM users WHERE username = '$username'";
        $result = $this->connection->query($query);
        $user = $result->fetch_assoc();

        if (empty($user)) {
            return false;
        } else {
            return true;
        }
    }
}
