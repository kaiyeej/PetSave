<?php

class Shelters extends Connection
{
    private $table = 'tbl_shelters';
    private $pk = 'shelter_id';
    private $name = 'shelter_name';

    public function add()
    {
        $name = $this->clean($this->inputs['shelter_name']);
        $is_exist = $this->select($this->table, $this->pk, "shelter_name = '$name'");

        $username = $this->clean($this->inputs['username']);
        $is_exist = $this->select('tbl_users', $this->pk, "username = '$username'");
        if ($is_exist->num_rows > 0) {
            return -2;
        } else {
            $form = array(
                $this->name                 => $name,
                'shelter_address'           => $this->inputs['shelter_address'],
                'shelter_email'             => $this->inputs['shelter_email'],
                'shelter_contact_number'    => $this->inputs['shelter_contact_number'],
                'shelter_remarks'           => $this->clean($this->inputs['shelter_remarks'])
            );
            $shelter_id = $this->insert($this->table, $form,'Y');
            
            $form_ = array(
                'user_fullname'              => $this->inputs['user_fullname'],
                'user_category'              => 'A',
                'user_contact_num'           => $this->inputs['user_contact_num'],
                'username'                   => $this->inputs['username'],
                'password'                   => md5($this->inputs['password']),
                'shelter_id'                 => $shelter_id,
            );
            return $this->insert('tbl_users', $form_);

        }
    }

    public function edit()
    {
        $primary_id = $_SESSION['user']['shelter'];
        $shelter_name = $this->clean($this->inputs['shelter_name']);
        $is_exist = $this->select($this->table, $this->pk, "shelter_name = '$shelter_name' AND  $this->pk != '$primary_id'");
        if ($is_exist->num_rows > 0) {
            return 2;
        } else {
            $form = array(
                'shelter_name'              => $shelter_name,
                'shelter_address'           => $this->inputs['shelter_address'],
                'shelter_email'             => $this->inputs['shelter_email'],
                'shelter_contact_number'    => $this->inputs['shelter_contact_number'],
                'shelter_remarks'           => $this->inputs['shelter_remarks']
            );
            return $this->update($this->table, $form, "$this->pk = '$primary_id'");
        }
    }
    public function show()
    {
        $rows = array();
        $result = $this->select($this->table);
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function view()
    {
        $param = isset($this->inputs['param']) ? $this->inputs['param'] : "$this->pk = '".$_SESSION['user']['shelter']."'";
        $result = $this->select($this->table, "*", $param);
        return $result->fetch_assoc();
    }

    public function name($primary_id)
    {
        $result = $this->select($this->table, $this->name, "$this->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row[$this->name];
    }

    public function getShelters()
    {
        $rows = array();
        $param = isset($this->inputs['param']) ? $this->inputs['param'] : null;
        $result = $this->select($this->table, "*", $param);
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }   

}
