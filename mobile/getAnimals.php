<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once 'core/config.php';
$data = json_decode(file_get_contents("php://input"));
   // $r_id = $mysqli_connect->real_escape_string($data->r_id);
    $fetch = $mysqli_connect->query("SELECT * FROM tbl_animals WHERE status='0'");
    $response = array();
    while ($row = $fetch->fetch_array()) {
        $list = array();
        $list['animal_id'] = $row['animal_id'];
        $list['animal_name'] = $row['animal_name'];
        $list['animal_description'] = $row['animal_description'];
        $list['animal_image'] = $row['animal_image'];
        array_push($response, $list);
    }

    echo json_encode($response);

