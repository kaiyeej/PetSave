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
$age = $mysqli_connect->real_escape_string($data->age);
$social_media_account = $mysqli_connect->real_escape_string($data->social_media_account);
$address = $mysqli_connect->real_escape_string($data->address);
$email_address = $mysqli_connect->real_escape_string($data->email_address);
$contact_num = $mysqli_connect->real_escape_string($data->contact_num);
$occupation = $mysqli_connect->real_escape_string($data->occupation);
$civil_status = $mysqli_connect->real_escape_string($data->civil_status);
$alternate_contact = $mysqli_connect->real_escape_string($data->alternate_contact);
$relationship = $mysqli_connect->real_escape_string($data->relationship);
$guardian_contact_num = $mysqli_connect->real_escape_string($data->guardian_contact_num);
$q1 = $mysqli_connect->real_escape_string($data->q1);

$q1 = $mysqli_connect->real_escape_string($data->q1);
$q2 = $mysqli_connect->real_escape_string($data->q2);
$q3 = $mysqli_connect->real_escape_string($data->q3);
$q4 = $mysqli_connect->real_escape_string($data->q4);
$q5 = $mysqli_connect->real_escape_string($data->q5);
$q6 = $mysqli_connect->real_escape_string($data->q6);
$q7 = $mysqli_connect->real_escape_string($data->q7);
$q8 = $mysqli_connect->real_escape_string($data->q8);
$q9 = $mysqli_connect->real_escape_string($data->q9);
$q10 = $mysqli_connect->real_escape_string($data->q10);
$q11 = $mysqli_connect->real_escape_string($data->q11);
$q12 = $mysqli_connect->real_escape_string($data->q12);
$q13 = $mysqli_connect->real_escape_string($data->q13);
$q14 = $mysqli_connect->real_escape_string($data->q14);
$q15 = $mysqli_connect->real_escape_string($data->q15);
$q16 = $mysqli_connect->real_escape_string($data->q16);
$q17 = $mysqli_connect->real_escape_string($data->q17);
$q18 = $mysqli_connect->real_escape_string($data->q18);
$q19 = $mysqli_connect->real_escape_string($data->q19);
$q20 = $mysqli_connect->real_escape_string($data->q20);
$q21 = $mysqli_connect->real_escape_string($data->q21);

$date = getCurrentDate();

$sql= $mysqli_connect->query("INSERT INTO `tbl_adoption`(pet_id,`application_date`, `fullname`, `age`, `social_media_account`, `address`, `contact_num`, `email_adderess`, `occupation`, `civil_status`, `alternate_contact`, `relationship`, `guardian_contact_num`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `q21`) VALUES ('$pet_id','$date','$fullname','$age','$social_media_account','$address','$contact_num','$email_address','$occupation','$civil_status','$alternate_contact','$relationship','$guardian_contact_num','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$q13','$q14','$q15','$q16','$q17','$q18','$q19','$q20','$q21')");
			
if($sql){
    echo 1;
}else{
    echo 0;
}

