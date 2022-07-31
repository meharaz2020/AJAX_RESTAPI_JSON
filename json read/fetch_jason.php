<?php

$conn=mysqli_connect('localhost','root','','ajaxtest');

$result=mysqli_query($conn,"SELECT * FROM students");
$output=mysqli_fetch_all($result, MYSQLI_ASSOC);

// echo "<pre>";
// print_r($output);
// echo"</pre>";

echo json_encode($output);


?>