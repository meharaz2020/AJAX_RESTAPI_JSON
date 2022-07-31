<?php

$student_id = $_POST["id"];
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];

$conn = mysqli_connect("localhost","root","","ajaxtest") or die("Connection Failed");

$sql = "UPDATE students SET fname = '{$firstName}',lname = '{$lastName}' WHERE id = {$student_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
