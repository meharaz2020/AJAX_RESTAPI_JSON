<?Php
include "db.php";

$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$result=mysqli_query($conn,"insert into students (fname,lname) values('$fname','$lname')");
if($result){
    echo 1;
}else{
    echo 0;
}


?>