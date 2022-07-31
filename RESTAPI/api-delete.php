<?php
 
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-control-Allow-Methods: DELETE');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-type,Access-control-Allow-Methods,Authorization,X-Requested-with');
$data=json_decode(file_get_contents("php://input"),true);
$student_id=$data['sid'];

include "config.php";
$result=mysqli_query($conn,"DELETE from students where id='$student_id'");


if($result){
    echo json_encode(array('message' => 'Record Deleted.', 'status' => true));

}else{
echo json_encode(array('message' => 'No Record Found.', 'status' => false));
}





?>
