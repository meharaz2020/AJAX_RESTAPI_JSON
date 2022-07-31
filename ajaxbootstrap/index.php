<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Hello, world!</title>
  </head>
  <body>
<!-- Button trigger modal -->
 

<!-- Modal -->
<div class="modal fade" id="completemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <label for="completefname" class="form-label">Fname</label>
<input type="text" id="completefname" class="form-control" aria-describedby="passwordHelpBlock">
<label for="completelname" class="form-label">Lanme</label>
<input type="text" id="completelname" class="form-control" aria-describedby="passwordHelpBlock">
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-dark" onclick="adduser()">Save</button>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
         
      </div>
    </div>
  </div>
</div>

<!-- model end -->


<!--Update Modal -->
<div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" id="updateform">
      <div class="modal-body" id="info-update">
       
      </div>
      <div class="modal-footer">
      <button type="button" id="update" class="btn btn-dark">Update</button>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          
      </div>
      </form>
    </div>
  </div>
</div>

<!--Update model end -->

    <div class="container my-3">
        <h1 class="text-center">Bootstrap Crud Ajax</h1>
        <button type="button" class="btn btn-dark my-4" data-bs-toggle="modal" data-bs-target="#completemodal">
Add New Users
</button>
<div id="displaydatatable">

</div> 
   </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


    <script>
        //view index page
        $(document).ready(function(){
            displayData();
        });
        //view data
        function displayData(){
            var displaydata="true";
            $.ajax({
                 url:"display.php",
                 type:"POST",
                 data:{
                    displaysend:displaydata
                 },
                 success:function(data,status){
                   $('#displaydatatable').html(data);
                 }
            });             
        }
//add user
function adduser(){
    var fnameadd=$('#completefname').val();
    var lnameadd=$('#completelname').val();
     $.ajax({
         url:"insert.php",
         type:"POST",
         data:{
            fnamesend:fnameadd,
            lnamesend:lnameadd
         },
         success:function(data,status){
            
             displayData();
             $('#completemodal').modal('hide');
         }
     });
}
//delete
        function deleteUser(deleteid){
                $.ajax({
                url:'delete.php',
                type:'POST',
                data:{
                    deletesend:deleteid
                },
                success:function(data,status){
                    displayData();
                }
                });
            }
//edit
 $(document).on('click','.edit-id',function(){
var edit_id=$(this).attr('id');

$.ajax({
url:"update.php",
type:"POST",
data:{edit_id:edit_id},
success:function(data){
    $("#info-update").html(data);
     $('#updatemodal').modal('show');
}
});

   
 })
 
   
 

    </script>
  </body>
</html>