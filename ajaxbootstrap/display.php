<?Php
include "db.php";

 if(isset($_POST['displaysend']))
{
    $table='<table class="table">
    <thead>
      <tr>
        <th scope="col">SI</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Action</th>

       </tr>
    </thead>
    </tbody>
    ';

    $result=mysqli_query($conn,"select * from students");
    $num=1;
    while($row=mysqli_fetch_assoc($result)){

        $id=$row['id'];
        $fname=$row['fname'];
        $lname=$row['lname'];
        $table.='  
        <tr>
          <th scope="row">'.$num.'</th>
          <td>'.$fname.'</td>
          <td>'.$lname.'</td>
          <td>
          <button class="btn btn-success edit-id"id=<?php echo $id;?> Edit</button>
          <button class="btn btn-danger" onclick="deleteUser('.$id.')">Delete</button>

          </td>
    
        </tr>
         
    
    ';
     $num++;}
    $table.='    </tbody> </table>';
    echo $table;
}

?>