<?php

class Rehab extends Connection
{
    private $table = 'tbl_rehab';
    public $pk = 'rehab_id';
    public $name = 'pet_id';


    public function add()
    {
       
        $form = array(
            $this->name                => $this->clean($this->inputs[$this->name]),
            'rehab_desc'               => $this->inputs['rehab_desc'],
            'date_started'             => $this->inputs['date_started'],
            'status'                   => 'O',
        );

        return $this->insertIfNotExist($this->table, $form, "$this->name = '".$this->inputs[$this->name]."' AND status='O'");
    }
    

    public function edit()
    {
        $primary_id = $this->inputs[$this->pk];
        $form = array(
            $this->name                => $this->clean($this->inputs[$this->name]),
            'rehab_desc'               => $this->inputs['rehab_desc'],
            'date_started'             => $this->inputs['date_started'],
            // 'date_ended'              => $this->inputs['date_ended'],
        );

        return $this->updateIfNotExist($this->table, $form, "pet_id='$this->inputs[$this->name]' AND status='O'", 'Y');
    }

    public function show()
    {
        $param = isset($this->inputs['param']) ? $this->inputs['param'] : null;
        $rows = array();
        $Pets = new Pets;
        $count = 1;
        $result = $this->select($this->table, '*', $param);
        while ($row = $result->fetch_assoc()) {
            $row['count'] = $count++;
            $row['pet_name'] = $Pets->name($row['pet_id']);
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
        
        return $this->delete($this->table, "$this->pk IN($ids)");
    }

    public function cancel()
    {
        $ids = implode(",", $this->inputs['ids']);
        $form = array(
            "status" => "C"
        );

        return $this->update($this->table, $form, "$this->pk IN($ids)");
    }

    public function approve()
    {
        $ids = implode(",", $this->inputs['ids']);
        $form = array(
            "status"        => "R",
            "date_ended"    => date("Y-m-d")
        );

        return $this->update($this->table, $form, "$this->pk IN($ids)");
    }

}
