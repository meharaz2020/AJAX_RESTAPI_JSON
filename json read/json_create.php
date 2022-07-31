<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>

<?php



$conn=mysqli_connect('localhost','root','','ajaxtest');
$result=mysqli_query($conn,"SELECT * FROM students");
$output=mysqli_fetch_all($result, MYSQLI_ASSOC);


$json_data= json_encode($output, JSON_PRETTY_PRINT);
$file_name="my-"  .date("d-m-y").  ".json";


if(file_put_contents("json/{$file_name}",$json_data)){
echo $file_name ."File Created";
}
 





?>

</body>
</html>