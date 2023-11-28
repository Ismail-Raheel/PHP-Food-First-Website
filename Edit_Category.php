<?php

require('connect.php');
include("Dashboard/Header.php");







$id=$_GET['edit'];


$State = $conn -> prepare("SELECT * FROM categories where Category_ID = ?");
$State -> bind_param("i",$id);
$State -> execute();
$result = $State ->get_result();
$row = $result -> fetch_array();





     
if(isset($_POST['Update_data']))
{
    
    $category_Id = $_POST['Category_ID'];
    $category_name = $_POST['Category_Name'];
    $Category_Image_New = $_FILES['Category_Image']['name'];
    $Category_Image_Old = $_POST['hiddenImage'];

    if($Category_Image_New !="")
    {

        $Category_Image = time() . "-" . $_FILES['Category_Image']['name'];
        $Category_Image_Tmp = $_FILES['Category_Image']['tmp_name'];
        $Category_Image_Folder = 'Category_Image/'.$Category_Image;
        move_uploaded_file($Category_Image_Tmp,$Category_Image_Folder);

    }
    else{
            
        $Category_Image = $Category_Image_Old;

    }


    $State = $conn -> prepare("UPDATE categories SET Category_Name = ?, Category_Image = ? WHERE Category_ID = ?");
    $State -> bind_param("ssi",$category_name,$Category_Image,$category_Id);
    $State -> execute();
    echo"<script>window.location='View_category.php';</script>";
   
};






?>

            <div class="container-fluid pt-4 px-4">
                <div class="row ">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Categories </h6>
                           
                             <form action="Edit_Category.php" method="post" enctype="multipart/form-data">

                                <div class="form-floating mb-3">
                                <input type="hidden" name="Category_ID"  value="<?php echo $row['Category_ID']; ?>" class="form-control" id="floatingInput">
                                    <input type="text" name="Category_Name" value="<?php echo $row['Category_Name']; ?>" class="form-control" id="floatingInput" placeholder="Category Name">
                                    <label for="floatingInput">Category Name </label> 
                                </div>
                                <div class="mb-3">
                                    <label for="floatingInput">Category Image  </label>
                                    <input class="form-control bg-dark" name="Category_Image" type="file" id="formFileMultiple">
                                    <input class="form-control bg-dark" name="hiddenImage" value="<?php echo $row['Category_Image']?>"  type="hidden">
                                </div>
                                 

                                <button type="submit" name="Update_data" class="btn btn-primary">Update Data </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<?php
include("Dashboard/Footer.php")

?>