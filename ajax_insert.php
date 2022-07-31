 


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
    <style>
      #modal {
        background-color:rgb(0 0 1 / 70%);
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 100;
        display: none;
      }
      #modal-form{
        background-color: #FFF;
        width: 30%;
        position: relative;
        top: 20%;
        left: 444px;
        padding: 15px;
        border-radius: 4px;
      }
      #close-btn{
        background-color: red;
        color: white;
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
        position: absolute;
        top: -15px;
        right: -15px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
  <?php   include "nav.php"; ?>

  <h1 class="text-center">Data Insert</h1>
  
  
 

 <div class="container">
  <div class="row">

  <div class="d-flex" id="search_bar">
        <input class="form-control me-2" type="search" id="search" placeholder="Search" aria-label="Search">
       </div>
    <!-- form -->
    <div class="alert-danger text-center col-md-12"id="error_message" role="alert">
 
 </div>
 <div class=" alert-primary text-center col-md-12"id="success_message" role="alert">
  
  </div>
   
    <form id="addform"class="row g-3">
    <div class="col-auto">
      <input type="text" class="form-control" id="fname"  required placeholder="First Name">
 
    </div>
    <div class="col-auto">
    <input type="text" class="form-control" id="lname" required  placeholder="Last Name">

    </div>
   <div class="col-auto">
     <button type="submit" id="save" class="btn btn-success mb-3">Save</button>
   </div>
 
    </form>

 
 
 <!-- form end -->


 <table class="table"id="table_data">
  <thead>
    
  </thead>
  <tbody>
     
     
  </tbody>
</table>

 <!-- edit modal -->
 <div id="modal">
    <div id="modal-form">
      <h2>Edit Form</h2>
      <table cellpadding="10px" width="100%">
      </table>
      <div id="close-btn">X</div>
    </div>
  </div> 


  </div>
 </div>
 
    <script>
    $(document).ready(function(){
      function loadTable(){
        $.ajax({
             url:"ajax_load_insert.php",
             type:"POST",
             success:function(data1){
               $('#table_data').html(data1);
             }
        });
     
      }
      loadTable();



      $("#save").on("click",function(e){
       e.preventDefault();

       var fname= $("#fname").val();
       var lname= $("#lname").val();

       if(fname=="" || lname==""){
        $("#error_message").html("All fields are required.").slideDown();
        $("#success_message").slideUp();

       }else{

        $.ajax({
          url: "ajax_insertdata.php",
          type:"POST",
          data:{first_name:fname,last_name:lname},
          success: function(data){
            if(data==1){
              loadTable();
              $("#addform").trigger("reset");
              $("#success_message").html("Data Insert Successfully.").slideDown();
               $("#error_message").slideUp();
            }else{
              $("#error_message").html("Can't save records.").slideDown();
        $("#success_message").slideUp();
            }
          }
      });

       }



        
      });


      //delete

      $(document).on("click",".delete-btn",function(){
          if(confirm("Do you want to delete?")){
            var stid=$(this).data("id");
         var element=this;
         $.ajax({
          url: "ajax_delete.php",
          type:"POST",
          data:{id:stid},
          success: function(data){
            if(data==1){
              $(element).closest("tr").fadeOut();
            }else{
              $("#success_message").html("Data delete Successfully.").slideDown();
                
            }
          }
         });
          }
      });

      //search
      $("#search").on("keyup",function(){
           var search_item=$(this).val();
           $.ajax({
              url:"ajax_live_search.php",
              type:"POST",
              data:{sdata:search_item},
              success: function(data2){

                $('#table_data').html(data2);
              }
           });
      });

      //edit
      $(document).on("click",".edit-btn", function(){
      $("#modal").show();
      var studentId = $(this).data("eid");

      $.ajax({
        url: "load-update-form.php",
        type: "POST",
        data: {id: studentId },
        success: function(data) {
          $("#modal-form table").html(data);
        }
      })
    });

      //hide modal box
      $("#close-btn").on("click",function(){
        $("#modal").hide();

      });

     
    //Save Update Form
    $(document).on("click","#edit-submit", function(){
        var stuId = $("#edit-id").val();
        var fname = $("#edit-fname").val();
        var lname = $("#edit-lname").val();

        $.ajax({
          url: "ajax-update-form.php",
          type : "POST",
          data : {id: stuId, first_name: fname, last_name: lname},
          success: function(data) {
            if(data == 1){
              $("#modal").hide();
              loadTable();
            }
          }
        })
      });
 
    });
 </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>