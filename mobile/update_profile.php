<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'core/config.php';

$data = json_decode(file_get_contents("php://input"));

if(isset($data->user_id) && $data->user_id > 0){
	$user_id = $mysqli_connect->real_escape_string($data->user_id);
	$username = $mysqli_connect->real_escape_string($data->username);
	$user_fullname = $mysqli_connect->real_escape_string($data->user_fullname);
	$user_contact_num = $mysqli_connect->real_escape_string($data->user_contact_num);
	$user_email = $mysqli_connect->real_escape_string($data->user_email);
	$user_address = $mysqli_connect->real_escape_string($data->user_address);
	
	$fetch_count = $mysqli_connect->query("SELECT count(user_id) FROM tbl_users WHERE username='$username' and user_id !='$user_id' ");
	$count_row = $fetch_count->fetch_array();

	if($count_row[0] > 0){
		echo -1;
	}else{
		$sql = $mysqli_connect->query("UPDATE `tbl_users` SET`user_fullname`='$user_fullname',`user_contact_num`='$user_contact_num',`user_email`='$user_email',`username`='$username',user_address='$user_address' WHERE user_id='$user_id'");

		if($sql){
			echo 1;
		}else{
			echo "Error in executing query.";
		}
	}

}

?>