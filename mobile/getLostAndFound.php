<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once 'core/config.php';
$data = json_decode(file_get_contents("php://input"));
   // $r_id = $mysqli_connect->real_escape_string($data->r_id);
    $fetch = $mysqli_connect->query("SELECT * FROM tbl_lost_and_found");
    $response = array();
    while ($row = $fetch->fetch_array()) {
        $list = array();
        $list['if_id'] = $row['if_id'];
        $list['if_animal_name'] = $row['if_animal_name'];
        $list['if_animal_desc'] = $row['if_animal_desc'];
        $list['if_animal_image'] = $row['if_animal_image'];
        $list['status'] = $row['status'];
        array_push($response, $list);
    }

    echo json_encode($response);

