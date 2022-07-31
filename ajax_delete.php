<?Php
include "db.php";

$id=$_POST['id'];
$result=mysqli_query($conn,"delete from students where id='$id'");
if($result){
    echo 1;
}else{
    echo 0;
}


?>