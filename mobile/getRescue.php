<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once 'core/config.php';
$data = json_decode(file_get_contents("php://input"));
   // $r_id = $mysqli_connect->real_escape_string($data->r_id);
    $fetch = $mysqli_connect->query("SELECT * FROM tbl_rescue ORDER by date_added DESC");
    $response = array();
    while ($row = $fetch->fetch_array()) {
        $list = array();
        $list['rescue_id'] = $row['rescue_id'];
        $list['location'] = $row['location'];
        $list['description'] = $row['description'];
        $list['photo'] = $row['photo'];
        $list['date_added'] = date("F j, Y h:i A",strtotime($row['date_added']));
        array_push($response, $list);
    }

    echo json_encode($response);

