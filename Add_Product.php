<?php

include("Dashboard/Header.php");

$Error="";

$Success="";

$uploaded="";


$Name_Error = $Price_Error = $Qty_Error = $Des_Error = $Sub_Image_Error = $Main_Image_Error = "";

require('connect.php');


$sql = "SELECT * from  categories";
$Result = $conn -> query($sql); 



if(isset($_POST['insert_data']))
{

$Product_Name = $_POST['Product_Name'];
$Product_Price = $_POST['Product_Price'];
$Product_Qty = $_POST['Product_Qty'];
$Product_Des = $_POST['Product_Des'];
$Category_Id = $_POST['Category_Id'];


$Product_Image = time() . "-" . $_FILES['Product_Image']['name'];
$Sub_Image = time() . "-" . $_FILES['Sub_Image']['name'];

$Discount_Date = $_POST['Discount_Date'];
$Discount_Price = $_POST['Discount_Price'];



if ($Product_Name !=""  &&  $Product_Price !=""  &&  $Product_Qty !=""  &&  $Product_Image !=""  &&  $Sub_Image !=""  &&  $Product_Des !="") 
{

    $Product_Image_Tmp = $_FILES['Product_Image']['tmp_name'];
    $Product_Image_Folder = 'Image/'.$Product_Image;
    move_uploaded_file($Product_Image_Tmp,$Product_Image_Folder);

    $Sub_Image_Tmp = $_FILES['Sub_Image']['tmp_name'];
    $Sub_Image_Folder = 'Image/'.$Sub_Image;
    move_uploaded_file($Sub_Image_Tmp,$Sub_Image_Folder);


    $sql = "INSERT INTO `products` (`Product_Name`, `Product_Price`, `Product_Qty`, `Product_Image`, `Product_sub_img`, `Product_Des`, `Discount_Price`, `Discount_Date`,`Category_Id`)  VALUES('$Product_Name', '$Product_Price', '$Product_Qty', '$Product_Image',  '$Sub_Image',  '$Product_Des',  '$Discount_Price',  '$Discount_Date', '$Category_Id')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo"<script>window.location='View_product.php';</script>";
    }
}
else{
    
      
    
if (empty($_POST["Product_Name"])){
    $Name_Error = "Please Enter Product Name";
} 



if (empty($_POST["Product_Price"])){
    $Price_Error = "Please Enter Product Price";
} 


if (empty($_POST["Product_Qty"])){
    $Qty_Error = "Please Enter Product Qty";
} 



if (empty($_POST["Product_Des"])){
    $Des_Error = "Please Enter Product Des";
} 




if (empty($_POST["Product_Image"])){
    $Main_Image_Error = "Please Enter a valid Image";
} 


if (empty($_POST["Sub_Image"])){
    $Sub_Image_Error = "Please Enter a valid Image";
} 










}





}











// if(isset($_FILES['Product_Image']) && $_FILES['Product_Image']['error'] == 0)
// {

// $Allowedformet = array(
// 'jpg' => 'image/jpg',
// 'JPG' => 'image/JPG',
// 'JPEG' => 'image/JPEG',
// 'jpeg' => 'image/jpeg',
// 'GIF' => 'image/GIF',
// 'gif' => 'image/gif',
// 'png' => 'image/png',
// 'PNG' => 'image/PNG'

// );


// $FILE_Name = $_FILES['Product_Image']['name'];
// $FILE_Type = $_FILES['Product_Image']['type'];
// $FILE_Size = $_FILES['Product_Image']['size'];
// $FILE_Ext = pathinfo($FILE_Name,PATHINFO_EXTENSION);

// if(!array_key_exists($FILE_Ext,$Allowedformet))
// {
// $Error("Error : Please Select A Valid File Type (JPEG  JPG  GIF PNG)");
// }

// $MaxSize = 5*1024*1024;

// if($FILE_Size > $MaxSize)
// {
//  $Error("Error : File Size Cannot Exceed 5 MBs");
// }

// if($Error ="" || in_array($FILE_Type,$Allowedformet))
// {

// if(file_exists("Image/".$FILE_Name))
// {   
//     $message[]  = "$FILE_Name Already Exists in Folder || Could not add the product";  
// }
// else
// {   
//     move_uploaded_file($Product_Image_Tmp,$Product_Image_Folder);
//     $message[] = 'Product add succesfully';

// }

// }


// }

// else
// {
//  $Error  = "You Must Select File First";  
// }









?>

            <div class="container-fluid pt-4 px-4">
                <div class="row ">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Products </h6>
                           
                             <form action="Add_Product.php" method="post" enctype="multipart/form-data">

                             <div class="row">
                                <div class="col-3">
                                <div class="form-floating mb-3">
                                    <input type="text" name="Product_Name" class="form-control" id="floatingInput" placeholder="Product Name">
                                    <span class="error" style="font-weight:500; color: red;"> <?php echo $Name_Error;?></span>
                                    <label for="floatingInput">Product Name </label>
                                </div>
                                </div>
                                <div class="col-3">
                                <div class="form-floating mb-3">
                                    <input type="number" name="Product_Price" class="form-control" id="floatingInput" placeholder="Product Price">
                                    <span class="error" style="font-weight:500; color: red;"> <?php echo $Price_Error;?></span>
                                    <label for="floatingInput">Product Price  </label>
                                </div>
                                </div>
                        
                

                         
                                <div class="col-3">
                                <div class="form-floating mb-3">
                                <input type="number" name="Product_Qty" class="form-control" id="floatingInput" placeholder="Product Qty">
                                <span class="error" style="font-weight:500; color: red;"> <?php echo $Qty_Error;?></span>
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
                                <textarea class="form-control" name="Product_Des" placeholder="Leave a comment here"
                                    id="floatingTextarea" style="height: 150px;"></textarea>
                                <label for="floatingTextarea">Comments</label>
                            </div>
                      

                            

                            <div class="row">
                            <div class="col-8">
                            <div class="mb-3">
                                <label for="floatingInput">Main Image  </label>
                                <input class="form-control bg-dark" name="Product_Image" type="file" id="formFileMultiple" multiple>
                                <span class="error" style="font-weight:500; color: red;"> <?php echo $Main_Image_Error;?></span>
                           
                            </div>
                            </div>
                            <div class="col-4">
                            <div class="mb-4">
                                <label for="floatingInput">Sub Image  </label>
                                <input class="form-control bg-dark" name="Sub_Image" type="file" id="formFileMultiple" multiple>
                                <span class="error" style="font-weight:500; color: red;"> <?php echo $Sub_Image_Error;?></span>
                            </div>
                            </div>
                            </div>

                                <h4 style="text-align: center;">Product Descount</h4>


                                <div class="row">
                                <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="number" name="Discount_Price" class="form-control" id="floatingInput">
                                    <label for="floatingInput">Discount Price </label>
                                </div>
                                </div>
                                <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="datetime-local" 
 name="Discount_Date" class="form-control"  id="floatingInput">
                                    <label for="floatingInput">Discount Date  </label>
                                </div>
                                </div>
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