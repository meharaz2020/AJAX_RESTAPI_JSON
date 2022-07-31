 
 
<?php

$conn=mysqli_connect('localhost','root','','ajaxtest');
$stu=mysqli_query($conn,"select * from students");
$result="";
?>
<?php
if(mysqli_num_rows($stu)>0){
    $result=" <table class='table'>
    <thead>
      <tr>
        <th scope='col'>ID</th>
        <th scope='col'>Full Name</th>
        <th scope='col'>Action</th>
        
      </tr>
    </thead>";?>

    <?php
    while($row=mysqli_fetch_assoc($stu)){
        $result .="  <tbody>
        <tr>
          <th scope='row'>{$row['id']}</th>
          <td>{$row['fname']} {$row['lname']}</td>
 <td>
 <button class='btn btn-sm btn-success edit-btn' data-eid='{$row['id']}'>edit</button>

           <button class='btn btn-sm btn-danger delete-btn' data-id='{$row['id']}'>Delete</button>
           </td>
        </tr>
      
          </tbody> </table>
      ";?>
     
      
      
   <?php  }
    // mysqli_close($conn);
    echo $result;
}else{

}
?>
 
  
 
 
  

 
  



