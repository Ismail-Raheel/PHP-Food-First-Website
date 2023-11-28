<?php



include("Dashboard/Header.php");



require('connect.php');

$Category_Image_Error = $Category_Error ="";


if(isset($_POST['insert_data']))
{

$category_name = $_POST['category_name'];
$Category_Image = time() . "-" . $_FILES['Category_Image']['name'];



if ($category_name !="" && $Category_Image != "") 
{


$Category_Image_Tmp = $_FILES['Category_Image']['tmp_name'];
$Category_Image_Folder = 'Category_Image/'.$Category_Image;
move_uploaded_file($Category_Image_Tmp,$Category_Image_Folder);





$sql = "INSERT INTO `categories` (`Category_Name`, `Category_Image`)  VALUES ('$category_name','$Category_Image')";

    $result=mysqli_query($conn,$sql);
    if($result){
        echo"<script>window.location='View_category.php';</script>";
    }


}

else{


    if (empty($_POST["Category_Image"])){
        $Category_Image_Error = "Please Enter a valid Image";
    } 
    


    if (empty($_POST["category_name"])){
        $Category_Error = "Please enter a valid Category name";
    } 
    

  
}

}





?>







            <div class="container-fluid pt-4 px-4">
                <div class="row ">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Categories </h6>
                           
                             <form action="Add_Category.php" method="post" enctype="multipart/form-data">

                                <div class="form-floating mb-3">
                                    <input type="text" name="category_name" class="form-control" id="floatingInput"
                                        placeholder="Category Name">
                                        <span class="error" style="font-weight:500; color: red;">  <?php echo $Category_Error; ?></span>
                                    <label for="floatingInput">Category Name </label>
                                </div>

                                <div class="mb-3">
                                <label for="floatingInput">Main Image  </label>
                                <input class="form-control bg-dark" name="Category_Image" type="file" id="formFileMultiple" multiple>
                                <span class="error" style="font-weight:500; color: red;"> <?php echo $Category_Image_Error;?></span>
                                </div>

                                <button type="submit" name="insert_data" class="btn btn-primary">Insert Data </button>
                            </form>
                        </div>
                    </div>
            

                </div>
            </div>

<?php
include("Dashboard/Footer.php")

?>