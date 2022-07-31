
<?php

$conn=mysqli_connect('localhost','root','','ajaxtest');
$stu=mysqli_query($conn,"select * from student");
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
          <td>{$row['name']}</td>
           
        </tr>
          </tbody> </table>
      ";?>
     
      
      
   <?php  }
    mysqli_close($conn);
    echo $result;
}else{

}
?>