<?php

class Users extends Connection
{
    private $table = 'tbl_users';
    private $pk = 'user_id';
    private $name = 'username';

    public function add()
    {
        $username = $this->clean($this->inputs['username']);
        $is_exist = $this->select($this->table, $this->pk, "username = '$username'");
        if ($is_exist->num_rows > 0) {
            return 2;
        } else {
            $pass = $this->inputs['password'];
            $form = array(
                'user_fullname'     => $this->inputs['user_fullname'],
                'user_category'     => $this->inputs['user_category'],
                'date_added'        => $this->getCurrentDate(),
                'username'          => $this->inputs['username'],
                'password'          => md5($pass),
                'shelter_id'        => $_SESSION['user']['shelter'],
            );
            return $this->insert($this->table, $form);
        }
    }

    public function edit()
    {
        $primary_id = $this->inputs[$this->pk];
        $username = $this->clean($this->inputs['username']);
        $form = array(
            'user_fullname'     => $this->inputs['user_fullname'],
            'user_contact_num'  => $this->inputs['user_contact_num'],
            'username'          => $this->inputs['username'],
        );
        return $this->update($this->table, $form, "username = '$username' AND  $this->pk = '$primary_id'");
    }


    public function update_password()
    {
        $primary_id = $this->inputs[$this->pk];
        $old_password = $this->inputs['old_password'];
        $is_exist = $this->select($this->table, $this->pk, "password = md5('$old_password') AND $this->pk = '$primary_id'");
        if ($is_exist->num_rows <= 0) {
            return 2;
        } else {
            $pass = $this->clean($this->inputs['new_password']);
            $form = array(
                'password' => md5($pass)
            );
            return $this->update($this->table, $form, "$this->pk = '$primary_id'");
        }
    }

    public function show()
    {
        $rows = array();
        $shelter_id = $_SESSION['user']['shelter'];
        $result = $this->select($this->table, "*", "shelter_id='$shelter_id'");
        while ($row = $result->fetch_assoc()) {
            $row['category'] = $row['user_category'] == "A" ? "Admin" :  "Staff";
            $rows[] = $row;
        }
        return $rows;
    }

    public function view()
    {
        $primary_id = $this->inputs['id'];
        $result = $this->select($this->table, "*", "$this->pk = '$primary_id'");
        return $result->fetch_assoc();
    }

    public static function name($primary_id)
    {
        $self = new self;
        $result = $self->select($self->table, $self->name, "$self->pk  = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row[$self->name];
    }

    public static function fullname($primary_id)
    {
        $self = new self;
        $result = $self->select($self->table, 'user_fullname', "$self->pk  = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row['user_fullname'];
    }

    public static function user_shelter($primary_id)
    {
        $self = new self;
        $result = $self->select($self->table, 'shelter_id', "$self->pk  = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row['shelter_id'];
    }


}
