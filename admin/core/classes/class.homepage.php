<?php

class Homepage extends Connection
{
    public $table = "tbl_lost_and_found";

    public function view()
    {
        
        $rows = array();
        $row['total_lost_found'] = $this->lost_and_found();
        $row['total_animals'] = $this->available_animals();
        $row['total_adopted'] = $this->adopted_animals();
        $rows = $row;
        return $rows;
    }

    public function lost_and_found(){
        $result = $this->select("tbl_lost_and_found","count(if_id) as total");
        $row = $result->fetch_array();

        return $row['total'];
    }

    public function adopted_animals(){
        $result = $this->select("tbl_animals","count(animal_id) as total","status='1'");
        $row = $result->fetch_array();

        return $row['total'];
    }

    public function adopted_animals_shelter(){
        $shelter_id = $_SESSION['user']['shelter'];
        $result = $this->select("tbl_animals","count(animal_id) as total","status='1' AND shelter_id='$shelter_id'");
        $row = $result->fetch_array();

        return $row['total'];
    }

    public function available_animals_shelter(){
        $shelter_id = $_SESSION['user']['shelter'];
        $result = $this->select("tbl_animals","count(animal_id) as total","status='0' AND shelter_id='$shelter_id'");
        $row = $result->fetch_array();

        return $row['total'];
    }

    
    public function rescued_animals_shelter(){
        $shelter_id = $_SESSION['user']['shelter'];
        $result = $this->select("tbl_rescue","count(rescue_id) as total","shelter_id='$shelter_id'");
        $row = $result->fetch_array();

        return $row['total'];
    }

    
    public function available_animals(){
        $result = $this->select("tbl_animals","count(animal_id) as total","status='0'");
        $row = $result->fetch_array();

        return $row['total'];
    }

    public function pending()
    {
        $rows = array();
        $result = $this->select('tbl_rescue', '*', "shelter_id=0");
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function show()
    {
        $shelter_id = $_SESSION['user']['shelter'];
        $rows = array();
        $result = $this->select('tbl_rescue', '*', "shelter_id='$shelter_id'");
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    public function rescueAll()
    {
        $rows = array();
        $Shelters = new Shelters();
        $result = $this->select('tbl_rescue', '*');
        while ($row = $result->fetch_assoc()) {
            $row['shelter'] = $row['shelter_id'] != 0 ? $Shelters->name($row['shelter_id']) : "" ;
            $rows[] = $row;
        }
        return $rows;
    }

    public function rescue()
    {
        
        $shelter_id = $_SESSION['user']['shelter'];
        $primary_id = $this->inputs['id'];
        $form = array(
            'shelter_id' => $shelter_id,
        );
        return  $this->update('tbl_rescue', $form, "rescue_id = '$primary_id'");

    }


}


?>
