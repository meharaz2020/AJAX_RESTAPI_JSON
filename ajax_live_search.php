<?Php
include "db.php";

$sdata=$_POST['sdata'];
$stu=mysqli_query($conn,"select * from students where CONCAT(fname LIKE '%$sdata%' OR lname LIKE '%$sdata%')");
$result="";
?>
<?php
if(mysqli_num_rows($stu)>0){
    $result=" <table class='table'>
    <thead>
      <tr>
        <th scope='col'>ID</th>
        <th scope='col'>Name</th>
        
      </tr>
    </thead>";?>

    <?php
    while($row=mysqli_fetch_assoc($stu)){
        $result .="  <tbody>
        <tr>
          <th scope='row'>{$row['id']}</th>
          <td>{$row['fname']} {$row['lname']}</td>
           
        </tr>
          </tbody> </table>
      ";?>
     
      
      
   <?php  }
    mysqli_close($conn);
    echo $result;
}else{
     echo "No Data Found";
}


?>