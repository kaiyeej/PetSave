<?php

class Pets extends Connection
{
    private $table = 'tbl_pets';
    public $pk = 'pet_id';
    public $name = 'pet_name';


    public function add()
    {
        if (isset($_FILES['file']['tmp_name'])) {
            $img_file = $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], '../assets/file/' . $img_file);
        } else {
            $img_file = "";
        }

        $form = array(
            $this->name             => $this->clean($this->inputs[$this->name]),
            'pet_description'    => $this->inputs['pet_description'],
            'pet_dob'            => $this->inputs['pet_dob'],
            'pet_type'           => $this->inputs['pet_type'],
            'pet_breed'          => $this->inputs['pet_breed'],
            'pet_identifier'     => $this->inputs['pet_identifier'],
            'pet_image'          => $img_file
        );

        return $this->insertIfNotExist($this->table, $form, "$this->name = '".$this->inputs[$this->name]."'");
    }

    public function edit()
    {
        $primary_id = $this->inputs[$this->pk];
        $name = $this->clean($this->inputs[$this->name]);
        $is_exist = $this->select($this->table, $this->pk, "$this->pk != '$primary_id' AND $this->name = '".$this->inputs[$this->name]."'");
        if ($is_exist->num_rows > 0) {
            return 2;
        } else {
            $form = array(
                $this->name             => $this->clean($this->inputs[$this->name]),
                'pet_description'    => $this->inputs['pet_description'],
                'pet_dob'            => $this->inputs['pet_dob'],
                'pet_type'           => $this->inputs['pet_type'],
                'pet_breed'          => $this->inputs['pet_breed'],
                'pet_identifier'     => $this->inputs['pet_identifier']
            );

            return $this->updateIfNotExist($this->table, $form, "$this->pk != '$primary_id' AND $this->name = '".$this->inputs[$this->name]."'");
        }
    }

    public function availableAnimals()
    {
        $rows = array();
        $param = isset($this->inputs['param']) ? $this->inputs['param']." AND " : null;
        $result = $this->select($this->table, "*", $param);
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function uploadImage()
    {
        $id = $this->inputs['pet_id'];
        if (isset($_FILES['file']['tmp_name'])) {
            $image_name = $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], '../assets/file/' . $image_name);
        } else {
            $image_name = "";
        }

        $form = array(
            'pet_image' => $image_name,
        );
        return $this->update($this->table, $form, "$this->pk = '$id'");
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

    public function show2()
    {
        
        $rows = array();
        $result = $this->select($this->table, '*');
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

        $result = $this->select($this->table, "pet_image", "$this->pk IN($ids)");
        while($row = $result->fetch_assoc()){
            unlink('../assets/file/'.$row['pet_image']);
        }


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
            "status" => "A"
        );

        return $this->update($this->table, $form, "$this->pk IN($ids)");
    }

    public function name($primary_id)
    {
        $result = $this->select($this->table, 'pet_name', "$this->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row['pet_name'];
    }
}
