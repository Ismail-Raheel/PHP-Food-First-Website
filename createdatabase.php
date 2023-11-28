<?php

require('connect.php');
$sql = "CREATE DATABASE FOOD";

 
if($conn -> query($sql) == TRUE)
{
    echo "<span style='color:green'> Database Created Successfully</span>";
}
else{

    echo "<span style='color:red'> The error is  ! " . $conn -> error . " </span>";
}





?>