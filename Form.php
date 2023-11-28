<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="style.css">

</head>
<body>

<?php

require('connect.php');

$Name_Error = $Email_Error = $Password_Error = $Gender_Error = $Contact_Error = "";

$Name = $Email = $Password = $Gender = $Contact = "";


if (isset($_POST['Form_Click'])) {



  $User_Name = $_POST['name'];
  $User_Email = $_POST['email'];
  $User_Password = $_POST['password'];
  $User_Gender = $_POST['gender'];
  $User_Contact = $_POST['number'];
  
  
  


if ($User_Name !=""  &&  $User_Email !=""  &&  $User_Password !=""  &&  $User_Gender !=""  &&  $User_Contact !="") 
{
   

  $stmp = $conn->prepare("INSERT INTO  user (User_Name,User_Email,User_Password,User_Gender,User_Contact) VALUES (?,?,?,?,?)");
  $stmp->bind_param("ssssi",$User_Name,$User_Email,$User_Password,$User_Gender,$User_Contact);
  $stmp->execute();
  $result = $stmp-> get_result();
  $conn->close();
  echo"<span style='color:green'> Record Inserted Successfull </span>";


}

else{



if (empty($_POST["name"])){
    $Name_Error = "Please enter a valid name";
} else {
    $Name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-']*$/",$Name)) {
    $Name_Error = "Only letters and white space allowed";
    }
}




if (empty($_POST["email"])) {
  $Email_Error = "Please enter a valid Email";
} else {
  $Email = test_input($_POST["email"]);
  if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
  $Email_Error = "The email address is incorrect";
  }
}  




if (empty($_POST["password"])) {
  $Password_Error = "Please enter a valid Password";
} else {
  $Password = test_input($_POST["password"]);
}  




if (empty($_POST["number"])) {
  $Contact_Error = "Please enter a valid Number";
} else {
  $Contact = test_input($_POST["number"]);
} 



if (empty($_POST["gender"])) {
  $Gender_Error = "Please select a gender";
} else {
  $Gender = test_input($_POST["gender"]);
}


}



}




function test_input($data) {

  $data = trim($data);

  $data = stripslashes($data);

  $data = htmlspecialchars($data);

  return $data;

}








?>




<h2>Contact Form</h2>

<div class="container">

  <form action="Form.php" method="post" autocomplete="off">
    <label>Full Name </label>
    <input type="text" name="name" placeholder="Your name..">
    <span class="error"> <?php echo $Name_Error;?></span>
    <br>
    <br>



    <label>User Email</label>
    <input type="text"  name="email" placeholder="Your email..">
    <span class="error"> <?php echo $Email_Error;?></span>
    <br>
    <br>



    <label>User Password</label>
    <input type="text" name="password" placeholder="Your password..">
    <span class="error"> <?php echo $Password_Error;?></span>
    <br>
    <br>

    <label for="country">User Gender</label>
    <select id="country" name="gender">
      <option value="Value Not Selected">Select</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="Others">Others</option>
    </select>
    <span class="error"> <?php echo $Gender_Error ?></span>
    <br>
    <br>
    <label>User Contact No</label>
    <input type="number" name="number" placeholder="Your Contact No..">
    <span class="error"> <?php echo $Contact_Error; ?></span>
    <br>
    <br>

    <input type="submit" value="Submit" name="Form_Click">
  </form>
</div>

</body>
</html>
