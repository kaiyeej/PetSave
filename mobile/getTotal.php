<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once 'core/config.php';
$data = json_decode(file_get_contents("php://input"));
$response = array();

$total_rescued_result = $mysqli_connect->query("SELECT COUNT(*) AS total_rescued FROM tbl_rescue WHERE status = 'A'");
$total_for_adoption_result = $mysqli_connect->query("SELECT COUNT(*) AS total_for_adoption FROM tbl_adoption WHERE status = 'A'");
$total_adopted_result = $mysqli_connect->query("SELECT COUNT(*) AS total_adopted FROM pets WHERE status = 'adopted'");
$total_users_result = $mysqli_connect->query("SELECT COUNT(*) AS total_users FROM users");

$total_rescued = $total_rescued_result->fetch_assoc()['total_rescued'];
$total_for_adoption = $total_for_adoption_result->fetch_assoc()['total_for_adoption'];
$total_adopted = $total_adopted_result->fetch_assoc()['total_adopted'];
$total_users = $total_users_result->fetch_assoc()['total_users'];

$response = array(
    "total_rescued" => $total_rescued,
    "total_for_adoption" => $total_for_adoption,
    "total_adopted" => $total_adopted,
    "total_users" => $total_users
);

echo json_encode($response);
