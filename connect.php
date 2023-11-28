<?php

$localhost = "localhost";
$UserName = "root";
$Password = "";
$db = "Food";

$conn = new mysqli($localhost,$UserName,$Password,$db);

if($conn -> connect_error)
{
    die("Connetion failed" . $conn-> connect_error);
}
else{

   // echo "Connected Successfully";
}




?>