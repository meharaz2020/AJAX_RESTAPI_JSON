<?php

$json_string='fetch_jason.json';
$jsondata=file_get_contents($json_string);
$arr=json_decode($jsondata,true);

echo '<table border=1 cellpadding="10px" width="100%">';

foreach($arr as list("id" => $id,"fname"=>$fname,"lname"=>$lname)){
    echo "<tr><td>{$id}</td><td>{$fname}</td><td>{$lname}</td></tr>";
}

echo '</table>';

// echo "<pre>"; 
// print_r($arr);
// echo"</pre>";

?>