<?php

require('connect.php');

$sql = "CREATE TABLE User(
User_Id int primary key AUTO_INCREMENT,
User_Name varchar(50),
User_Email varchar(200),
User_Password varchar(200),
User_Gender varchar(10),
User_Contact int
)";

 
if($conn -> query($sql) == TRUE)
{
    echo "<span style='color:green'> Tabel created successfully</span>";
}
else{

    echo "<span style='color:red'> The error is  ! " . $conn -> error . " </span>";
}




?>


