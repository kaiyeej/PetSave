<?php

class Rescues extends Connection
{
    private $table = 'tbl_rescue';
    public $pk = 'rescue_id';
    public $name = 'location';


    public function add()
    {
        $pet_name = $this->inputs['pet_name'];
        $is_exist = $this->select('tbl_pets', '*', "pet_name = '$pet_name'");
        if ($is_exist->num_rows > 0) {
            return -2;
        } else {

            if (isset($_FILES['file']['tmp_name'])) {
                $img_file = $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], '../assets/file/' . $img_file);
            } else {
                $img_file = "";
            }

            $form = array(
                'pet_name'           => $pet_name,
                'pet_description'    => $this->inputs['pet_description'],
                'pet_dob'            => $this->inputs['pet_dob'],
                'pet_type'           => $this->inputs['pet_type'],
                'pet_breed'          => $this->inputs['pet_breed'],
                'pet_identifier'     => $this->inputs['pet_identifier'],
                'pet_image'          => $img_file
            );

            $pet_id = $this->insert('tbl_pets', $form, 'Y');

            if ($pet_id) {
                $form = array(
                    $this->name                 => $this->clean($this->inputs[$this->name]),
                    'description'               => $this->inputs['description'],
                    'rescue_type'               => 'C',
                    'status'                    => 'A',
                    'pet_id'                    => $pet_id,
                    'user_id'                   => $_SESSION['pas_user_id']
                );

                return $this->insert($this->table, $form);
            } else {
                return 0;
            }
        }
    }

    public function edit()
    {
        $primary_id = $this->inputs[$this->pk];
        $form = array(
            $this->name                 => $this->clean($this->inputs[$this->name]),
            'description'               => $this->inputs['description'],
            'rescue_type'               => $this->inputs['rescue_type'],
        );

        return $this->update($this->table, $form, "$this->pk = '$primary_id'");
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
            'photo' => $image_name,
        );
        return $this->update($this->table, $form, "$this->pk = '$id'");
    }

    public function show()
    {
        $param = isset($this->inputs['param']) ? $this->inputs['param'] : null;
        $rows = array();
        $Pets = new Pets;
        $result = $this->select($this->table, '*', $param);
        while ($row = $result->fetch_assoc()) {
            $row['type'] = $row['rescue_type'] == "C" ? "Rescue" : "Reported";
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
        // $result = $this->select($this->table, "photo", "$this->pk IN($ids)");
        // while ($row = $result->fetch_assoc()) {
        //     unlink('../assets/rescue/' . $row['photo']);
        // }

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
            "status"        => "A"
        );

        return $this->update($this->table, $form, "$this->pk IN($ids)");
    }
}
