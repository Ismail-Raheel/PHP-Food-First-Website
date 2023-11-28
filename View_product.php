<?php

include("Dashboard/Header.php");

require('connect.php');

$sql = "SELECT *
FROM categories c, products p
WHERE c.Category_ID = p.Category_Id";
$Result = $conn -> query($sql); 


$Error = "";

if(isset($_GET['delete']))
{

$PID = $_GET['delete'];
$State = $conn -> prepare("DELETE FROM products where Product_Id = ?");
$State -> bind_param("i",$PID);
$State -> execute();
if($State)
{
    echo"<script>window.location='View_product.php';</script>";
}

}



?>

                    <div class="container-fluid pt-4 px-4">
                    <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">View Product </h6>
                        <a href="Add_Product.php" style="font-weight:bold;">Insert Product</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="example">
                           
                        <!-- <input class="product__view--search__input border-0"    name="search" placeholder="Search by" type="text"> -->
                        
                        <thead>
                                <tr class="text-white">
                                  
                                    <th scope="col">P_Id</th>
                                    <th scope="col">P_Name</th>
                                    <th scope="col">P_Price</th>
                                    <th scope="col">P_Qty</th>    
                                    <th scope="col">P_Image</th>  
                                    <th scope="col">S_Image</th>  
                                    <th scope="col">PD_Price</th> 
                                    <th scope="col">PD_Date</th> 
                                    <th scope="col">C_Name</th>                              
                                    <th scope="col" class="text-center" >Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if($Result -> num_rows > 0)
                                {
                                while($ac = $Result -> fetch_assoc())
                                {
                                ?>

                                <tr>
                                    <td><?php echo $ac['Product_Id']?></td>
                                    <td><?php echo $ac['Product_Name']?></td>
                                    <td><?php echo $ac['Product_Price']?></td>
                                    <td><?php echo $ac['Product_Qty']?></td>
                                    <td><img src="Image/<?php echo $ac['Product_Image'];?> " height="100" alt="Main Img" style="width: 100px;"></td>
                                    <td><img src="Image/<?php echo $ac['Product_sub_img'];?>" height="100" alt="Sub Img" style="width: 100px;"></td>
                                    <td><?php echo $ac['Discount_Price']?></td>
                                    <td><?php echo $ac['Discount_Date']?></td>
                                    <td><?php echo $ac['Category_Name']?></td>
                                    <td  class="text-center">
                                    <a href="Edit_Product.php?edit=<?php echo $ac['Product_Id']; ?>" class="btn btn-sm btn-primary" > <i class="fas fa-edit"></i> Edit </a>
                                    <a href="View_product.php?delete=<?php echo $ac['Product_Id']?>" class="btn btn-sm btn-primary" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i>Delete</a>
                                    </td>
                                </tr>
                        
                                <?php 
                                    } 
                                    }
                                    else
                                    {
                           
                                    echo "<h2 class='empty' style='color:red'>No product added</h2>";
                                
                                    }
                                    ?> 


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>









    <script src="Filter/assets/js/jquery.min.js"></script>
	<script src="Filter/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="Filter/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="Filter/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="Filter/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="Filter/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	
	<script>
	  
	  $(document).ready(function() {
	  $('#example').DataTable()
	});
	  
	</script>



<?php
include("Dashboard/Footer.php")

?>