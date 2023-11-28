<?php

include("Dashboard/Header.php");

require('connect.php');

$sql = "SELECT * from  categories";
$Result = $conn -> query($sql); 

$Error = "";

if(isset($_GET['delete']))
{

$PID = $_GET['delete'];
$State = $conn -> prepare("DELETE FROM categories where Category_ID = ?");
$State -> bind_param("i",$PID);
$State -> execute();

if($State)
{
    echo"<script>window.location='View_category.php';</script>";
}


}




?>

                    <div class="container-fluid pt-4 px-4">
                    <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">View Category </h6>
                        <a href="Add_Category.php" style="font-weight:bold;">Insert Categories</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                           
       
                        
                        <thead>
                                <tr class="text-white">
                                    <th scope="col">Category Id</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Category Image</th>
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
                                    <td><?php echo $ac['Category_ID']?></td>
                                    <td><?php echo $ac['Category_Name']?></td>
                                    <td><img src="Category_Image/<?php echo $ac['Category_Image'];?> " height="100" alt="Main Img" style="width: 100px;"></td>
                                    <td  class="text-center">
                                  
                                    <a href="Edit_Category.php?edit=<?php echo $ac['Category_ID']; ?>" class="btn btn-sm btn-primary" > <i class="fas fa-edit"></i> Edit </a>
                    
                                    <a href="View_category.php?delete=<?php echo $ac['Category_ID']?>" class="btn btn-sm btn-primary" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i>Delete</a>
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

<?php
include("Dashboard/Footer.php")

?>