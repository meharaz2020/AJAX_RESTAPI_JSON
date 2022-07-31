<?Php
include "db.php";
if(isset($_POST['edit_id'])){
$eid=$_POST['edit_id'];
 
$result=mysqli_query($conn,"select * from students where id='$eid'");
 $rr='<label for="updatefname" class="form-label">Fname</label>';
if($row=mysqli_fetch_assoc($result)){
$fname=$row['fname'];
$lname=$row['lname'];

 $rr.='
 <input type="text" id="updatefname" class="form-control" value="<?php echo $fname;?>">
 <label for="updatelname" class="form-label">Lanme</label>
 <input type="text" id="updatelname" class="form-control" value="<?php echo $lname;?>">';
 echo $rr;
}  

 
}

?>
 
 
 