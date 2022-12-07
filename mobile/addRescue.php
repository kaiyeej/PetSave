<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'core/config.php';
$data = json_decode(file_get_contents("php://input"));
$description = $mysqli_connect->real_escape_string($data->r_description);
$location = $mysqli_connect->real_escape_string($data->r_location);

$image = $mysqli_connect->real_escape_string($data->image->dataUrl);
$DIR = "../admin/assets/lost_found/";
$file_chunks = explode(";base64,", $image);
$fileType = explode("image/", $file_chunks[0]);
$image_type = $fileType[1];

$img_file = uniqid().".".$image_type;
$file = $DIR . $img_file;
// $file = $DIR . uniqid().'.png';
     

$date = getCurrentDate();

$sql= $mysqli_connect->query("INSERT INTO `tbl_rescue`(`description`, `location`, `img_file`) VALUES ('$description','$location','$img_file')");
			
if($sql){
    $base64Img = base64_decode($file_chunks[1]);
    file_put_contents($file, $base64Img);
    
    $mysqli_connect->query("DELETE FROM `tbl_rescue` WHERE description = '' AND location = '' AND img_file != ''");
    echo 1;
}else{
    echo 0;
}
