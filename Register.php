<?php


include('Header.php');

require('connect.php');


$Name_Error = $Email_Error = $Pass_Error = $Con_Error = $Confirmation_Error= "";


// if(isset($_POST['registered']))
// {

//     $Name = $_POST['name'];
//     $Email = $_POST['email'];
//     $Pass= $_POST['pass'];
//     $Con_Pass = $_POST['con_pass'];
//     $Checking=mysqli_query($conn,"SELECT * from user WHERE User_Email = '$Email' AND User_Password = '$Pass'");
   
//     if ($Name_Error !=""  &&  $Email_Error !=""  &&  $Pass_Error !=""  &&  $Con_Error !="") 
//     {

//     if(mysqli_num_rows($Checking) > 0)
//     {
//         $Result_fetch = mysqli_fetch_assoc($Checking);
//         if($Result_fetch['email'] == $_POST['email'])
//         {
//         echo "<script> alert('$Result_fetch[name] User Already Taken')</script>";  
//         }

//     }
       

//     else{


//         $query = "INSERT INTO `user` (`User_Name`, `User_Email`, `User_Password`)  VALUES('$Name', '$Email', '$Pass')";
//         if(mysqli_query($conn,$query))
//         {
//         echo "<script> alert('Registration Successfull ')</script>";
//         echo"<script>window.location='Login.php';</script>";
//         }
   


//     }
   
   
   
//     }

   

    
// }





if(isset($_POST['registered']))
{

    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Pass= $_POST['pass'];
    $Con_Pass = $_POST['con_pass'];
    $Checking=mysqli_query($conn,"SELECT * from user WHERE User_Email = '$Email'");
   
    if ($Name !=""  &&  $Email !=""  &&  $Pass !=""  &&  $Con_Pass !="") 
    {
    
    if(mysqli_num_rows($Checking) > 0)
    {
    echo "<script> alert('Email Has Already Taken')</script>";  
    }
        
    else
    {
    

    if($Pass != $Con_Pass)
    {
    echo "<script> alert('Password Does Not Match')</script>";                
    }
    else
    {
    $query = "INSERT INTO `user` (`User_Name`, `User_Email`, `User_Password`)  VALUES('$Name', '$Email', '$Pass')";
    $result=mysqli_query($conn,$query);
    echo "<script> alert('Registration Successfull ')</script>";
    echo"<script>window.location='Login.php';</script>";   
    }

    }

    
    }


    else{


        if (empty($_POST["name"])){
            $Name_Error = "Please Enter Your Name";
        } 
        
        
        
        if (empty($_POST["email"])){
            $Email_Error = "Please Enter Your Email";
        } 
        
        
        if (empty($_POST["pass"])){
            $Pass_Error = "Please Enter Your Password";
        } 
        
        
        
        if (empty($_POST["con_pass"])){
            $Con_Error = "Please Enter Your Confirm Password";
        } 
        
    
    }




}










?>

<main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Account Page</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index-2.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Account Page</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start login section  -->
        <div class="login__section section--padding mb-80">
            <div class="container">
                <form action="Register.php" method="post">
                    <div class="login__section--inner">
                        <div class="row" style="width: 800px; margin: auto;">
                     
                            <div class="col">
                                <div class="account__login register">
                                    <div class="account__login--header mb-25">
                                        <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
                                        <p class="account__login--header__desc">Register here if you are a new customer</p>
                                    </div>
                                    <div class="account__login--inner">
                                        <label>
                                       
                                            <input class="account__login--input" style="margin:0%;" placeholder="Username" name="name" type="text">
                                            <span class="error" style="font-weight:900; color: red;"> <?php echo $Name_Error;?> </span>
                                        </label>
                                        <label style="margin-top: 20px;">
                                            <input class="account__login--input" style="margin:0%;" placeholder="Email Addres" name="email" type="email">
                                            <span class="error" style="font-weight:900; color: red;"> <?php echo $Email_Error;?></span>
                                        </label>
                                        <label style="margin-top: 20px;">
                                            <input class="account__login--input" style="margin:0%;" placeholder="Password"  name="pass" type="password">
                                            <span class="error" style="font-weight:900; color: red;"> <?php echo $Pass_Error;?></span>
                                        </label>
                                        <label style="margin-top: 20px;">
                                            <input class="account__login--input"style="margin:0%;"  placeholder="Confirm Password" name="con_pass" type="password">
                                            <span class="error" style="font-weight:900; color: red;"> <?php echo $Con_Error;?></span>
                                            <!-- <span class="error" style="font-weight:900; color: red;"> <?php echo $Confirmation_Error;?></span> -->
                                            
                                        </label >
                                        <button class="account__login--btn btn mb-10" type="submit"  name="registered" >Submit & Register</button>
                                        <div class="account__login--remember position__relative">
                                            <a href="Login.php">Already have an account sign in</a>
                                                    </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>     
        </div>
        <!-- End login section  -->

  

        
        <section class="shipping__section2 shipping__style3">
            <div class="container">
                <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img class="display-block" src="assets/img/other/shipping1.png" alt="shipping img">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Shipping</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img class="display-block" src="assets/img/other/shipping2.png" alt="shipping img">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Payment</h2>
                            <p class="shipping__items2--content__desc">Visa, Paypal, Master</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img class="display-block" src="assets/img/other/shipping3.png" alt="shipping img">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Return</h2>
                            <p class="shipping__items2--content__desc">30 day guarantee</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img class="display-block" src="assets/img/other/shipping4.png" alt="shipping img">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Support</h2>
                            <p class="shipping__items2--content__desc">Support every time</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     

    </main>




<?php
include('Footer.php')

?>
