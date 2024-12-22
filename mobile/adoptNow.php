<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once 'core/config.php';
$data = json_decode(file_get_contents("php://input"));
$pet_id = $mysqli_connect->real_escape_string($data->pet_id);
$fullname = $mysqli_connect->real_escape_string($data->fullname);
$social_media_account = $mysqli_connect->real_escape_string($data->social_media_account);
$address = $mysqli_connect->real_escape_string($data->address);
$email_address = $mysqli_connect->real_escape_string($data->email_address);
$contact_num = $mysqli_connect->real_escape_string($data->contact_num);
$occupation = $mysqli_connect->real_escape_string($data->occupation);
$civil_status = $mysqli_connect->real_escape_string($data->civil_status);
$user_spouse = $mysqli_connect->real_escape_string($data->user_spouse);
$user_id = $mysqli_connect->real_escape_string($data->user_id);

$q1 = $mysqli_connect->real_escape_string($data->q1);
$q2 = $mysqli_connect->real_escape_string($data->q2);
$q3 = $mysqli_connect->real_escape_string($data->q3);
$q4 = $mysqli_connect->real_escape_string($data->q4);
$q5 = $mysqli_connect->real_escape_string($data->q5);
$q6 = is_array($data->q6) ? $mysqli_connect->real_escape_string(implode(", ", $data->q6)) : $mysqli_connect->real_escape_string($data->q6);
$q7 = is_array($data->q6) ? $mysqli_connect->real_escape_string(implode(", ", $data->q6)) : $mysqli_connect->real_escape_string($data->q7);
$q8 = $mysqli_connect->real_escape_string($data->q8);
$q9 = $mysqli_connect->real_escape_string($data->q9);
$q10 = $mysqli_connect->real_escape_string($data->q10);
$q11 = $mysqli_connect->real_escape_string($data->q11);
$q12 = $mysqli_connect->real_escape_string($data->q12);
$q13 = $mysqli_connect->real_escape_string($data->q13);
$q14 = $mysqli_connect->real_escape_string($data->q14);
$q15 = $mysqli_connect->real_escape_string($data->q15);
$adopt_form = $mysqli_connect->real_escape_string($data->adopt_form);
$veterinarian_name = $mysqli_connect->real_escape_string($data->veterinarian_name);
$veterinarian_number = $mysqli_connect->real_escape_string($data->veterinarian_number);
$veterinarian_address = $mysqli_connect->real_escape_string($data->veterinarian_address);
$veterinarian_clinic = $mysqli_connect->real_escape_string($data->veterinarian_clinic);

$date = getCurrentDate();

$sql= $mysqli_connect->query("INSERT INTO `tbl_adoption`(pet_id,`application_date`, `fullname`, `user_social_media`, `user_home_address`, `user_contact_num`, `user_email`, `user_occupation`, `user_civil_status`, `user_spouse`, `a_q1`, `a_q2`, `a_q3`, `a_q4`, `a_q5`, `a_q6`, `a_q7`, `a_q8`, `a_q9`, `a_q10`, `a_q11`, `a_q12`, `a_q13`, `a_q14`, `a_q15`, `adopted_from`, `veterinarian_name`, `veterinarian_number`, `veterinarian_clinic`, `veterinarian_address`, user_id) VALUES ('$pet_id','$date','$fullname','$social_media_account','$address','$contact_num','$email_address','$occupation','$civil_status','$user_spouse','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$q13','$q14','$q15','$adopt_form','$veterinarian_name','$veterinarian_number','$veterinarian_clinic','$veterinarian_address','$user_id')");
			
if($sql){
    echo 1;
}else{
    echo 0;
}

