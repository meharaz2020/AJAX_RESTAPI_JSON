<?php
 
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
// $data=json_decode(file_get_contents("php://input"),true);
// $search=$data['search'];
$search=isset($_GET['search']) ? $_GET['search'] : die();
include "config.php";
$result=mysqli_query($conn,"SELECT * from students where student_name LIKE '%$search%'");


if(mysqli_num_rows($result)>0){
$output=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($output);
}else{
echo json_encode(array('message' => 'No Record Found.', 'status' => false));
}





?>