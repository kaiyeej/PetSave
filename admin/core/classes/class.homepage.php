<?php

class Homepage extends Connection
{
    public $table = "tbl_lost_and_found";

    public function view()
    {
        
        $rows = array();
        $row['total_lost_found'] = 1;
        $row['total_animals'] = 1;
        $row['total_adopted'] = 1;
        $rows = $row;
        return $rows;
    }

    /*public function lost_and_found(){
        $result = $this->select("tbl_lost_and_found","count(if_id) as total");
        $row = $result->fetch_array();

        return $row['total'];
    }*/
}


?>
