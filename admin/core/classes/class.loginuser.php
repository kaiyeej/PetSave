<?php

class LoginUser extends Connection
{
    private $table = 'tbl_users';
    public $pk = 'user_id';
    public $name = 'user_fullname';
    

    public function login()
    {

        $username = $this->inputs['username'];
        $password = $this->inputs['password'];

        $result = $this->select($this->table, "*", "username = '$username' AND password = md5('$password')");
        $row = $result->fetch_assoc();

        if ($row) {

            $_SESSION['status'] = "in";
            $_SESSION['user']['id'] = $row['user_id'];
            $_SESSION['user']['fullname'] = $row['user_fullname'];

            $res = 1;
        } else {
            $res = 0;
        }

        // return $row[$this->name];

        return $res;
    }
    public function logout()
    {
        session_destroy();
        return 1;
    }
}
