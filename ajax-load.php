<?php

$conn = mysqli_connect("localhost","root","","test") or die("Connect Failed");

$sql = "SELECT * from students";

$result = mysqli_query($conn,$sql) or die("Sql Query Failed");
$ouput = "";


if (mysqli_num_rows($result) > 0) {
    $ouput = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
    <tr>
    <th width="100px;">ID</th>
    <th>Name</th>
    <th width="100px;">Edit</th>
    <th width="100px;">Delete</th>
    </tr>';

    while($row = mysqli_fetch_assoc($result)){      
    $ouput .= " <td>{$row["first_name"]}  {$row["last_name"]}</td><td><button Class='edit-btn' data-eid='{$row["id"]}'>Edit</button></td><td><button Class='delete-btn' data-id='{$row["id"]}'>Delete</button></td></tr>";  
    }

    
    $ouput .= "</table>";
    mysqli_close($conn);

    echo  $ouput;

}

else{
    echo "<h2>No Record Found .</h2>";
}


?>


<!-- point data-  data hifan ye attribute hai jo html 5 me introduce howa hai or isse ap apne marziki koi bhi attribute raksakte hai  -->