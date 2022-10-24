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

            if($row['user_category'] == "A"){
                $cat = "Admin";
            }else if($row['user_category'] == "S"){
                $cat = "Student";
            }else{
                $cat = "Teacher";
            }

            $_SESSION['status'] = "in";
            $_SESSION["cdms_username"] = $row['username'];
            $_SESSION["cdms_user_category"] = $row['user_category'];
            $_SESSION["cdms_user_cat"] = $cat;
            $_SESSION["cdms_user_id"] = $row['user_id'];
            $_SESSION["cdms_user_email"] = $row['user_email'];

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
