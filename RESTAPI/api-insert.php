<?php
header('Content-type: application/json');
header('Acess-Control-Allow-Origin: *');
header('Access-control-Allow-Methods: POST');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-type,Access-control-Allow-Methods,Authorization,X-Requested-with');

$data=json_decode(file_get_contents("php://input"),true);
$student_name=$data['sname'];
$student_age=$data['sage'];
$student_city=$data['scity'];

include "config.php";



$result=mysqli_query($conn,"INSERT into students(student_name,age,city) VALUES('$student_name','$student_age','$student_city')");


if($result){
    echo json_encode(array('message' => 'Student Record Inserted', 'status' => true));

}else{
echo json_encode(array('message' => 'No Record Found.', 'status' => false));
}




?>
