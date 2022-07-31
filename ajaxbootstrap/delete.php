<?Php
include "db.php";

$deletesend=$_POST['deletesend'];
 
$result=mysqli_query($conn,"delete from students where id='$deletesend'");
if($result){
    echo 1;
}else{
    echo 0;
}


?>