<?php

class Adopt extends Connection
{
    private $table = 'tbl_adoption';
    public $pk = 'adoption_id';
    public $name = 'fullname';


    public function add()
    {
        $form = array(
            // $this->name         => $this->clean($this->inputs[$this->name]),
            'application_date'  => $this->inputs['application_date'],
            'pet_id'            => $this->inputs['pet_id'],
            // 'fullname'          => $this->inputs['fullname'],
            'user_id'           => $this->inputs['user_id'],
            'user_occupation'   => $this->inputs['user_occupation'],
            'user_contact_num'  => $this->inputs['user_contact_num'],
            'user_home_address' => $this->inputs['user_home_address'],
            'user_email'        => $this->inputs['user_email'],
            'user_social_media' => $this->inputs['user_social_media'],
            'user_spouse'       => $this->inputs['user_spouse'],
            'user_civil_status' => $this->inputs['user_civil_status'],

            'a_q1'  => $this->inputs['a_q1'],
            'a_q2'  => $this->inputs['a_q2'],
            'a_q3'  => $this->inputs['a_q3'],
            'a_q4'  => $this->inputs['a_q4'],
            'a_q5'  => $this->inputs['a_q5'],
            'a_q6'  => $this->inputs['a_q6'],
            'a_q7'  => $this->inputs['a_q7'],
            'a_q8'  => $this->inputs['a_q8'],
            'a_q9'  => $this->inputs['a_q9'],
            'a_q10' => $this->inputs['a_q10'],
            'a_q11' => $this->inputs['a_q11'],
            'a_q12' => $this->inputs['a_q12'],
            'a_q13' => $this->inputs['a_q13'],
            'a_q14' => $this->inputs['a_q14'],
            'a_q15' => $this->inputs['a_q15'],
            'a_q16' => $this->inputs['a_q16'],

            'adopted_from' => $this->inputs['adopted_from'],
            'veterinarian_name' => $this->inputs['veterinarian_name'],
            'veterinarian_number' => $this->inputs['veterinarian_number'],
            'veterinarian_clinic' => $this->inputs['veterinarian_clinic'],
            'veterinarian_address' => $this->inputs['veterinarian_address'],

           
        );

        // return $this->insertIfNotExist($this->table, $form, "$this->name = '".$this->inputs[$this->name]."' AND status!='A'");
        return $this->insert($this->table, $form);
    }

    public function edit()
    {
        $primary_id = $this->inputs[$this->pk];
        $name = $this->clean($this->inputs[$this->name]);
        $is_exist = $this->select($this->table, $this->pk, "$this->pk != '$primary_id' AND $this->name = '".$this->inputs[$this->name]."' AND status!='A'");
        if ($is_exist->num_rows > 0) {
            return 2;
        } else {
            $form = array(
                $this->name         => $this->clean($this->inputs[$this->name]),
                'application_date'  => $this->inputs['application_date'],
                'pet_id'            => $this->inputs['pet_id'],
                // 'fullname'          => $this->inputs['fullname'],
                'user_id'           => $this->inputs['user_id'],
                'user_occupation'   => $this->inputs['user_occupation'],
                'user_contact_num'  => $this->inputs['user_contact_num'],
                'user_home_address' => $this->inputs['user_home_address'],
                'user_email'        => $this->inputs['user_email'],
                'user_social_media' => $this->inputs['user_social_media'],
                'user_spouse'       => $this->inputs['user_spouse'],
                'user_civil_status' => $this->inputs['user_civil_status'],
    
                'a_q1'  => $this->inputs['a_q1'],
                'a_q2'  => $this->inputs['a_q2'],
                'a_q3'  => $this->inputs['a_q3'],
                'a_q4'  => $this->inputs['a_q4'],
                'a_q5'  => $this->inputs['a_q5'],
                'a_q6'  => $this->inputs['a_q6'],
                'a_q7'  => $this->inputs['a_q7'],
                'a_q8'  => $this->inputs['a_q8'],
                'a_q9'  => $this->inputs['a_q9'],
                'a_q10' => $this->inputs['a_q10'],
                'a_q11' => $this->inputs['a_q11'],
                'a_q12' => $this->inputs['a_q12'],
                'a_q13' => $this->inputs['a_q13'],
                'a_q14' => $this->inputs['a_q14'],
                'a_q15' => $this->inputs['a_q15'],
                'a_q16' => $this->inputs['a_q16'],
    
                'adopted_from' => $this->inputs['adopted_from'],
                'veterinarian_name' => $this->inputs['veterinarian_name'],
                'veterinarian_number' => $this->inputs['veterinarian_number'],
                'veterinarian_clinic' => $this->inputs['veterinarian_clinic'],
                'veterinarian_address' => $this->inputs['veterinarian_address'],
            );

            return $this->updateIfNotExist($this->table, $form, "$this->pk != '$primary_id' AND $this->name = '".$this->inputs[$this->name]."' AND status!='A'");
        }
    }

    public function show()
    {
        $param = isset($this->inputs['param']) ? $this->inputs['param'] : null;
        $rows = array();
        $Users = new Users();
        $Pets = new Pets();
        $result = $this->select($this->table, '*', $param);
        while ($row = $result->fetch_assoc()) {
            $row['animal'] = ($row['pet_id'] <= 0 ? "---" : $Pets->name($row['pet_id']));
            $row['fullname'] = $Users->fullname($row['user_id']);
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
        $primary_id = $this->inputs['id'];
        $pet_id = $this->adopt_pet_id($primary_id);
        $result = $this->select("tbl_pets", '*', "pet_id = '$pet_id'");
        $row = $result->fetch_assoc();
        if($row['pet_status'] == 0){
            $form_ = array(
                "pet_status" => "A"
            );
            $this->update("tbl_pets", $form_, "pet_id = '$pet_id'");

            $form = array(
                "status" => "A"
            );
            return $this->update($this->table, $form, "$this->pk = '$primary_id'");
        }else{
            return -1;
        }
    }

    public function adopt_pet_id($primary_id)
    {
        $result = $this->select($this->table, 'pet_id', "$this->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row['pet_id'];
    } 

    public function name($primary_id)
    {
        $result = $this->select($this->table, 'fullname', "$this->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row['fullname'];
    }
}
