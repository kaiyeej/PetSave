<?php

class Animals extends Connection
{
    private $table = 'tbl_animals';
    public $pk = 'animal_id';
    public $name = 'animal_name';


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
            'animal_description'    => $this->inputs['animal_description'],
            'animal_dob'            => $this->inputs['animal_dob'],
            'animal_type'           => $this->inputs['animal_type'],
            'animal_breed'          => $this->inputs['animal_breed'],
            'animal_weight'         => $this->inputs['animal_weight'],
            'animal_color'          => $this->inputs['animal_color'],
            'animal_identifier'     => $this->inputs['animal_identifier'],
            'animal_image'          => $img_file,
            'shelter_id'            => $_SESSION['user']['shelter'],
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
                'animal_description'    => $this->inputs['animal_description'],
                'animal_dob'            => $this->inputs['animal_dob'],
                'animal_type'           => $this->inputs['animal_type'],
                'animal_breed'          => $this->inputs['animal_breed'],
                'animal_weight'         => $this->inputs['animal_weight'],
                'animal_color'          => $this->inputs['animal_color'],
                'animal_identifier'     => $this->inputs['animal_identifier']
            );

            return $this->updateIfNotExist($this->table, $form, "$this->pk != '$primary_id' AND $this->name = '".$this->inputs[$this->name]."'");
        }
    }

    public function uploadImage()
    {
        $id = $this->inputs['animal_id'];
        if (isset($_FILES['file']['tmp_name'])) {
            $image_name = $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], '../assets/file/' . $image_name);
        } else {
            $image_name = "";
        }

        $form = array(
            'animal_image' => $image_name,
        );
        return $this->update($this->table, $form, "$this->pk = '$id'");
    }

    public function show()
    {
        
        $shelter_id = $_SESSION['user']['shelter'];
        $param = isset($this->inputs['param']) ? "AND ".$this->inputs['param']."" : null;
        $rows = array();
        $result = $this->select($this->table, '*', "shelter_id = '$shelter_id' $param");
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

    public function availableAnimals()
    {
        $rows = array();
        $Shelters = new Shelters();
        $param = isset($this->inputs['param']) ? $this->inputs['param']." AND " : null;
        $result = $this->select($this->table, "*", "$param status='0'");
        while ($row = $result->fetch_assoc()) {
            $row['shelter'] = $Shelters->name($row['shelter_id']);
            $rows[] = $row;
        }
        return $rows;
    }

    public function remove()
    {
        $ids = implode(",", $this->inputs['ids']);

        $result = $this->select($this->table, "animal_image", "$this->pk IN($ids)");
        while($row = $result->fetch_assoc()){
            unlink('../assets/file/'.$row['animal_image']);
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
        $result = $this->select($this->table, 'animal_name', "$this->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row['animal_name'];
    }
}
