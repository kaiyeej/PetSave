<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once 'core/config.php';
$data = json_decode(file_get_contents("php://input"));
$if_animal_name = $mysqli_connect->real_escape_string($data->if_animal_name);
$if_animal_desc = $mysqli_connect->real_escape_string($data->if_animal_desc);
$if_type = $mysqli_connect->real_escape_string($data->if_type);
$if_last_location_found = $mysqli_connect->real_escape_string($data->if_last_location_found);
$if_other_remarks = $mysqli_connect->real_escape_string($data->if_other_remarks);

$date = getCurrentDate();

$sql= $mysqli_connect->query("INSERT INTO `tbl_lost_and_found`(`if_animal_name`, `if_animal_desc`, `if_last_location_found`,`if_other_remarks`, `if_type`) VALUES ('$if_animal_name','$if_animal_desc','$if_last_location_found','$if_other_remarks','$if_type')");
			
if($sql){
    echo 1;
}else{
    echo 0;
}

