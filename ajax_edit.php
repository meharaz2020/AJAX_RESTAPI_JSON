<?Php
include "db.php";
$id=$_POST['id'];

$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$result=mysqli_query($conn,"update students set fname='$fname',lname='$lname' where id='$id'");
if($result){
    echo 1;
}else{
    echo 0;
}


?>