<?php

require('connect.php');
include("Dashboard/Header.php");




$id=$_GET['edit'];


$sql = "SELECT * from  categories";
$Result = $conn -> query($sql); 






$State = $conn -> prepare("SELECT *
FROM categories c, products p
WHERE c.Category_ID = p.Category_Id AND Product_Id = ?");
$State -> bind_param("i",$id);
$State -> execute();
$result = $State ->get_result();
$row = $result -> fetch_array();





     
if(isset($_POST['Update_Data']))
{

    $Product_Image_New = $_FILES['Product_Image']['name'];
    $Product_Image_Old = $_POST['hiddenImage'];


    if($Product_Image_New !="")
    {

        $Product_Image = time() . "-" . $_FILES['Product_Image']['name'];
        $Product_Image_Tmp = $_FILES['Product_Image']['tmp_name'];
        $Product_Image_Folder = 'Image/'.$Product_Image;
        move_uploaded_file($Product_Image_Tmp,$Product_Image_Folder);

    }
    else{
            
        $Product_Image = $Product_Image_Old;

    }



    $Sub_Image_New = $_FILES['Product_sub_img']['name'];
    $Sub_Image_Old = $_POST['SubhiddenImage'];


    if($Sub_Image_New !="")
    {

        $Sub_Image = time() . "-" . $_FILES['Product_sub_img']['name'];
        $Sub_Image_Tmp = $_FILES['Product_sub_img']['tmp_name'];
        $Sub_Image_Folder = 'Image/'.$Sub_Image;
        move_uploaded_file($Sub_Image_Tmp,$Sub_Image_Folder);

    }
    else{
            
        $Sub_Image = $Sub_Image_Old;

    }



    $Product_Id = $_POST['Product_Id'];
    $Product_Name = $_POST['Product_Name'];
    $Product_Price = $_POST['Product_Price'];
    $Product_Qty = $_POST['Product_Qty'];
    $Discount_Date = $_POST['Discount_Date'];
    $Discount_Price = $_POST['Discount_Price'];
    $Product_Des = $_POST['Product_Des'];
    $Category_Id = $_POST['Category_Id'];
    $State = $conn -> prepare("UPDATE products SET Product_Name = ?, Product_Price = ?, Product_Qty = ?, Product_Image = ?,  Product_sub_img = ?,  Product_Des = ?,  Discount_Price = ?,  Discount_Date = ?, Category_Id = ? WHERE Product_Id = ?");
    $State -> bind_param("siisssisii",$Product_Name,$Product_Price,$Product_Qty,$Product_Image, $Sub_Image, $Product_Des,  $Discount_Price,  $Discount_Date, $Category_Id,$Product_Id);
    $State -> execute();
    echo"<script>window.location='View_product.php';</script>";
    

   
   
};






?>

        <div class="container-fluid pt-4 px-4">
                <div class="row ">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Products </h6>    
                             <form action="Edit_Product.php" method="post" enctype="multipart/form-data">

                             <div class="row">
                                <div class="col-3">
                                <div class="form-floating mb-3">
                                    <input type="text" name="Product_Name" class="form-control" id="floatingInput" placeholder="Product Name" 
                                    value="<?php echo $row['Product_Name']; ?>">
                           
                                    <input type="hidden" name="Product_Id" class="form-control" id="floatingInput" placeholder="Product Name" 
                                    value="<?php echo $row['Product_Id']; ?>">


                                    <label for="floatingInput">Product Name </label>
                                </div>
                                </div>
                                <div class="col-3">
                                <div class="form-floating mb-3">
                                    <input type="number" name="Product_Price"  class="form-control" id="floatingInput" placeholder="Product Price" 
                                    value="<?php echo $row['Product_Price']; ?>">
                                
                                    <label for="floatingInput">Product Price  </label>
                                </div>
                                </div>
                      
                

                      
                                <div class="col-3">
                                <div class="form-floating mb-3">
                                <input type="number" name="Product_Qty" class="form-control" id="floatingInput" placeholder="Product Qty" value="<?php echo $row['Product_Qty']; ?>">
                           
                                <label for="floatingInput">Product Qty </label>
                                </div>
                                </div>
                                <div class="col-3">
                                <div class="form-floating mb-3">
                                <select name="Category_Id" id="languages" class="form-control bg-dark" > 
                                <?php
                           
                                while($categories = $Result -> fetch_assoc())
                                {    
                                ?>
                               
                                <option value="<?php echo $categories['Category_ID']?>"><?php echo $categories['Category_Name']?></option>
                                <?php 
                                } 
                                ?> 
                                </select>
                               
                                <label for="floatingInput">Product Category  </label>
                                </div>
                                </div>
                            </div>

                            
                      

                            <div class="form-floating mb-2">
                            <textarea class="form-control" name="Product_Des"  style="height: 150px;">
                            <?php echo $row['Product_Des']; ?></textarea>    
                            <label for="floatingTextarea">Product Description  </label>
                            </div>   
                      



                            <div class="row">
                            <div class="col-8">
                            <div class="mb-3">
                            <label for="floatingInput">Main Image  </label>
                                <input class="form-control bg-dark" name="Product_Image" type="file" id="formFileMultiple">
                                <input class="form-control bg-dark" name="hiddenImage" value="<?php echo $row['Product_Image']?>"  type="hidden">
                            </div>
                               
                           
                            </div>
                           
                            <div class="col-4">
                            <div class="mb-4">
                                <label for="floatingInput">Sub Image  </label>
                                <input class="form-control bg-dark" name="Product_sub_img" type="file" id="formFileMultiple">
                                <input class="form-control bg-dark" name="SubhiddenImage" value="<?php echo $row['Product_sub_img']?>"  type="hidden">
                            </div>
                            </div>
                            </div>

                                <h4 style="text-align: center;">Product Descount</h4>

                                <div class="row">
                                <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="number" name="Discount_Price" value="<?php echo $row['Discount_Price']?>" class="form-control" id="floatingInput">
                                    <label for="floatingInput">Discount Price </label>
                                </div>
                                </div>
                                <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="datetime-local" name="Discount_Date"  value="<?php echo $row['Discount_Date']?>" class="form-control" id="floatingInput">
                                    <label for="floatingInput">Discount Date  </label>
                                </div>
                                </div>
                                </div>
                            







                                <button type="submit" name="Update_Data" class="btn btn-primary">Update Data </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="mb-3">
                                <input class="form-control bg-dark" name="Product_Image" type="file" id="formFileMultiple">
                                <input class="form-control bg-dark" name="hiddenImage" value="<?php echo $row['Product_Image']?>"  type="text">
                            </div> -->


<?php
include("Dashboard/Footer.php")

?>


