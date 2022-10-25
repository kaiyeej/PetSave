<?php

class Animals extends Connection
{
    private $table = 'tbl_animals';
    public $pk = 'animal_id';
    public $name = 'animal_name';


    public function add()
    {
        $form = array(
            $this->name         => $this->clean($this->inputs[$this->name]),
            'animal_name'  => $this->inputs['animal_name'],
            'age'               => $this->inputs['age'],
            'social_media_account'   => $this->inputs['social_media_account'],
            'address'           => $this->inputs['address'],
        );

        return $this->insertIfNotExist($this->table, $form, "$this->name = '".$this->inputs[$this->name]."'");
    }

    public function show()
    {
        $param = isset($this->inputs['param']) ? $this->inputs['param'] : null;
        $rows = array();
        $result = $this->select($this->table, '*', $param);
        while ($row = $result->fetch_assoc()) {
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

    public function remove()
    {
        $ids = implode(",", $this->inputs['ids']);

        $this->insert_logs('Deleted course');

        return $this->delete($this->table, "$this->pk IN($ids)");
    }

    public function name($primary_id)
    {
        $result = $this->select($this->table, 'animal_name', "$this->pk = '$primary_id'");

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return $row['animal_name'];
        }else{
            return "";
        }
        
    }
}
