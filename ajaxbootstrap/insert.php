<?Php
include "db.php";

$fname=$_POST['fnamesend'];
$lname=$_POST['lnamesend'];
$result=mysqli_query($conn,"insert into students (fname,lname) values('$fname','$lname')");
if($result){
    echo 1;
}else{
    echo 0;
}


?>