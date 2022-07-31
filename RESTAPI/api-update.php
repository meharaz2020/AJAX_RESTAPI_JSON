<?php
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-control-Allow-Methods: PUT');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-type,Access-control-Allow-Methods,Authorization,X-Requested-with');

$data=json_decode(file_get_contents("php://input"),true);
$student_id=$data['sid'];
$student_name=$data['sname'];
$student_age=$data['sage'];
$student_city=$data['scity'];

include "config.php";



$result=mysqli_query($conn,"UPDATE students SET student_name='$student_name', age='$student_age', city='$student_city' WHERE id='$student_id'");


if($result){
    echo json_encode(array('message' => 'Student Record Updated', 'status' => true));

}else{
echo json_encode(array('message' => 'No Record Found.', 'status' => false));
}




?>
