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

    
    public function available_animals(){
        $result = $this->select("tbl_animals","count(animal_id) as total","status='0'");
        $row = $result->fetch_array();

        return $row['total'];
    }
}


?>
