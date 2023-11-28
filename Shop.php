<?php



require('connect.php');




$limit = 6;



if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 1;

}



$offset = ($page - 1) * $limit;


$sql2 = "SELECT *
FROM categories c
INNER JOIN products p ON c.Category_ID = p.Category_Id
ORDER BY p.product_id DESC LIMIT {$offset},{$limit}";
$Result = $conn -> query($sql2); 



$sql = "SELECT *
FROM categories c, products p
WHERE c.Category_ID = p.Category_Id";
$Res = $conn -> query($sql); 



$sql2 = "SELECT COUNT(*)
FROM products";
$Res1 = $conn -> query($sql2); 
$row1= mysqli_fetch_array($Res1);







if(isset($_POST['add_to_cart'])){

    $sub_total;

    $product_name = $_POST['Product_Name'];
    $product_price = $_POST['Product_Price'];
    $product_image = $_POST['Product_Image'];
    $Discount_Price = $_POST['Discount_Price'];
    $Discount_Date = $_POST['Discount_Date'];

    $Product_code  = $_POST['Product_code'];
    $Product_Id  = $_POST['Product_Id'];

    if(!empty($_SESSION['U_Id']))
    {
        $User_Id = $_SESSION['U_Id'];
    }
    else{

        $User_Id = '0';
    }

    




    $product_quantity = 1;
 
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE Product_Name = '$product_name'");
 
    if(mysqli_num_rows($select_cart) > 0){
       $message[] = 'product already added to cart';
    }else{
       $insert_product = mysqli_query($conn, "INSERT INTO cart (Product_Name, Product_Price, Product_Image, Product_Qty,Discount_Price,Discount_Date, Product_Code,Product_ID,User_Id) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity','$Discount_Price','$Discount_Date', '$Product_code','$Product_Id','$User_Id')");
       $message[] = 'product added to cart succesfully';
    }
 
 }



 if(isset($_POST['add_to_Wishlist'])){

    $sub_total;

    $product_name = $_POST['Product_Name'];
    $product_price = $_POST['Product_Price'];
    $Discount_Price = $_POST['Discount_Price'];
    $Discount_Date = $_POST['Discount_Date'];
    $product_image = $_POST['Product_Image'];

    $Product_code  = $_POST['Product_code'];
    $Product_Id  = $_POST['Product_Id'];

    if(!empty($_SESSION['U_Id']))
    {
        $User_Id = $_SESSION['U_Id'];
    }
    else{

        $User_Id = '0';
    }

    




    $product_quantity = 1;
 
    $select_Wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE Product_Name = '$product_name'");
 
    if(mysqli_num_rows($select_Wishlist) > 0){
       $message[] = 'product already added to cart';
    }else{
       $insert_product = mysqli_query($conn, "INSERT INTO wishlist (Product_Name, Product_Price, Product_Image, Product_Qty, Discount_Price,Discount_Date, Product_Code,Product_ID,User_Id) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity','$Discount_Price','$Discount_Date', '$Product_code','$Product_Id','$User_Id')");
       $message[] = 'product added to cart succesfully';
    }
 
 }







?>




<?php



include('Header.php');

?>







<main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Shop Left Sidebar</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index-2.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Shop Left Sidebar</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start shop section -->
        <section class="shop__section section--padding">
            <div class="container-fluid">
                <div class="shop__header bg__gray--color d-flex align-items-center justify-content-between mb-30">
                    <button class="widget__filter--btn d-flex d-lg-none align-items-center" data-offcanvas>
                        <svg  class="widget__filter--btn__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80"/><circle cx="336" cy="128" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/><circle cx="176" cy="256" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/><circle cx="336" cy="384" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/></svg> 
                        <span class="widget__filter--btn__text">Filter</span>
                    </button>
                    <div class="product__view--mode d-flex align-items-center">
                        <div class="product__view--mode__list product__short--by align-items-center d-lg-flex d-none ">
                            <label class="product__view--label">Prev Page :</label>
                            <div class="select shop__header--select">


                          
                                <select  id="city-box" class="product__view--select" name="industry">
                                    <option value="">Select City</option>
                                    <option value="12">12</option>
                                    <option value="42">42</option>
                                    <option value="57">57 </option>
                                    <option value="60">60 </option>
                                </select>
                             





                                

                            </div>
                        </div>
                        <div class="product__view--mode__list product__short--by align-items-center d-none d-lg-flex">
                            <label class="product__view--label">Sort By :</label>
                            <div class="select shop__header--select">
                                <select class="product__view--select">
                                    <option selected value="1">Sort by latest</option>
                                    <option value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by  rating </option>
                                </select>
                            </div>
                             
                        </div>
                        <div class="product__view--mode__list">
                            <div class="product__tab--one product__grid--column__buttons d-flex justify-content-center">
                                <button class="product__grid--column__buttons--icons active" aria-label="grid btn" data-toggle="tab" data-target="#product_grid">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 9 9">
                                        <g  transform="translate(-1360 -479)">
                                          <rect id="Rectangle_5725" data-name="Rectangle 5725" width="4" height="4" transform="translate(1360 479)" fill="currentColor"/>
                                          <rect id="Rectangle_5727" data-name="Rectangle 5727" width="4" height="4" transform="translate(1360 484)" fill="currentColor"/>
                                          <rect id="Rectangle_5726" data-name="Rectangle 5726" width="4" height="4" transform="translate(1365 479)" fill="currentColor"/>
                                          <rect id="Rectangle_5728" data-name="Rectangle 5728" width="4" height="4" transform="translate(1365 484)" fill="currentColor"/>
                                        </g>
                                    </svg>
                                </button>
                                <button class="product__grid--column__buttons--icons" aria-label="list btn" data-toggle="tab" data-target="#product_list">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 13 8">
                                        <g id="Group_14700" data-name="Group 14700" transform="translate(-1376 -478)">
                                          <g  transform="translate(12 -2)">
                                            <g id="Group_1326" data-name="Group 1326">
                                              <rect id="Rectangle_5729" data-name="Rectangle 5729" width="3" height="2" transform="translate(1364 483)" fill="currentColor"/>
                                              <rect id="Rectangle_5730" data-name="Rectangle 5730" width="9" height="2" transform="translate(1368 483)" fill="currentColor"/>
                                            </g>
                                            <g id="Group_1328" data-name="Group 1328" transform="translate(0 -3)">
                                              <rect id="Rectangle_5729-2" data-name="Rectangle 5729" width="3" height="2" transform="translate(1364 483)" fill="currentColor"/>
                                              <rect id="Rectangle_5730-2" data-name="Rectangle 5730" width="9" height="2" transform="translate(1368 483)" fill="currentColor"/>
                                            </g>
                                            <g id="Group_1327" data-name="Group 1327" transform="translate(0 -1)">
                                              <rect id="Rectangle_5731" data-name="Rectangle 5731" width="3" height="2" transform="translate(1364 487)" fill="currentColor"/>
                                              <rect id="Rectangle_5732" data-name="Rectangle 5732" width="9" height="2" transform="translate(1368 487)" fill="currentColor"/>
                                            </g>
                                          </g>
                                        </g>
                                      </svg>
                                </button>
                            </div>
                        </div>
                        <div class="product__view--mode__list product__view--search d-xl-block d-none ">
                        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                            <form class="product__view--search__form" action="Shop.php" method="post">       
                               
                            <div class="search-box">
                               
                               
                               <?php
                                if(isset($_POST['search_btn']))
                                {

                                    $search = $_POST['search'];
                                    if($search != "")
                                    {

                                        $sql = "SELECT * from  products WHERE Product_Name = '$search'";
                                        $Result = $conn -> query($sql); 
                                  

                                    }
                                    else
                                    {
                                        $sql = "SELECT * from  products";
                                        $Result = $conn -> query($sql); 
                                        
                                    }


                                }                                                                                  
                                ?>
                             
                               

                                <label>
                                    <input class="product__view--search__input border-0"   name="search" placeholder="Search by" type="text" autocomplete="off">
                                    <div class="resultsection"></div>
                                </label>
                                <button class="product__view--search__btn" name="search_btn" aria-label="search btn"  type="submit">
                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>  
                                </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="product__showing--count">Showing 1–12 of <?php echo $row1['0'] ?> results</p>
                </div>













                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="shop__sidebar--widget widget__area d-none d-lg-block">
                            <div class="single__widget widget__bg">
                                <h2 class="widget__title h3">Categories</h2>
                                <ul class="widget__categories--menu">
                                    <li class="widget__categories--menu__list">
                                        <label class="widget__categories--menu__label d-flex align-items-center">
                                            <img class="widget__categories--menu__img" src="assets/img/product/categories11.png" alt="categories-img">
                                            <span class="widget__categories--menu__text">Fresh Vegetables</span>
                                            <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                                <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                            </svg>
                                        </label>
                                        <ul class="widget__categories--sub__menu">
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories12.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Discount Weekly</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories15.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Green dhaniya</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories14.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">resh Nuts</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories13.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Millk Cream</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="widget__categories--menu__list">
                                        <label class="widget__categories--menu__label d-flex align-items-center">
                                            <img class="widget__categories--menu__img" src="assets/img/product/categories12.png" alt="categories-img">
                                            <span class="widget__categories--menu__text">Fresh mushroom</span>
                                            <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" >
                                                <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                            </svg>
                                        </label>
                                        <ul class="widget__categories--sub__menu">
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories12.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Discount Weekly</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories15.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Green dhaniya</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories14.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">resh Nuts</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories13.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Millk Cream</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="widget__categories--menu__list">
                                        <label class="widget__categories--menu__label d-flex align-items-center">
                                            <img class="widget__categories--menu__img" src="assets/img/product/categories13.png" alt="categories-img">
                                            <span class="widget__categories--menu__text">Dairy & chesse</span>
                                            <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                                <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                            </svg>
                                        </label>
                                        <ul class="widget__categories--sub__menu">
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories16.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Discount Weekly</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories15.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Green dhaniya</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories14.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">resh Nuts</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories13.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Millk Cream</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="widget__categories--menu__list">
                                        <label class="widget__categories--menu__label d-flex align-items-center">
                                            <img class="widget__categories--menu__img" src="assets/img/product/categories14.png" alt="categories-img">
                                            <span class="widget__categories--menu__text">Green dhaniya</span>
                                            <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                                <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                            </svg>
                                        </label>
                                        <ul class="widget__categories--sub__menu">
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories12.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Discount Weekly</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories15.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Green dhaniya</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories14.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">resh Nuts</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories13.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Millk Cream</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="widget__categories--menu__list">
                                        <label class="widget__categories--menu__label d-flex align-items-center">
                                            <img class="widget__categories--menu__img" src="assets/img/product/categories15.png" alt="categories-img">
                                            <span class="widget__categories--menu__text">Orange Juice</span>
                                            <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                                <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                            </svg>
                                        </label>
                                        <ul class="widget__categories--sub__menu">
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories12.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Discount Weekly</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories15.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Green dhaniya</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories14.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">resh Nuts</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="shop.html">
                                                    <img class="widget__categories--sub__menu--img" src="assets/img/product/categories13.png" alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Millk Cream</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="single__widget widget__bg">
                                <h2 class="widget__title h3">Dietary Needs</h2>
                                <ul class="widget__form--check">
                                    <li class="widget__form--check__list">
                                        <label class="widget__form--check__label" for="check1">Organic Food</label>
                                        <input class="widget__form--check__input" id="check1" type="checkbox">
                                        <span class="widget__form--checkmark"></span>
                                    </li>
                                    <li class="widget__form--check__list">
                                        <label class="widget__form--check__label" for="check2">Breakfast Item</label>
                                        <input class="widget__form--check__input" id="check2" type="checkbox">
                                        <span class="widget__form--checkmark"></span>
                                    </li>
                                    <li class="widget__form--check__list">
                                        <label class="widget__form--check__label" for="check3">Green Vegetables</label>
                                        <input class="widget__form--check__input" id="check3" type="checkbox">
                                        <span class="widget__form--checkmark"></span>
                                    </li>
                                    <li class="widget__form--check__list">
                                        <label class="widget__form--check__label" for="check4">Grocery Items</label>
                                        <input class="widget__form--check__input" id="check4" type="checkbox">
                                        <span class="widget__form--checkmark"></span>
                                    </li>
                                    <li class="widget__form--check__list">
                                        <label class="widget__form--check__label" for="check5">Baking material</label>
                                        <input class="widget__form--check__input" id="check5" type="checkbox">
                                        <span class="widget__form--checkmark"></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="single__widget price__filter widget__bg">
                                <h2 class="widget__title h3">Filter By Price</h2>
                                <!-- Ismail -->
                                <form class="price__filter--form" action="Shop.php" method="post"> 



                                <?php





                                if(isset($_POST['Filter_btn']))
                                {

                                    $start = $_POST['start'];
                                    $end = $_POST['end'];

                                    if($start != "" &&  $end != "")
                                    {

                                        $sql = "SELECT * 
                                        from  products 
                                        WHERE Product_Price > '$start' AND Product_Price < '$end'";
                                        $Result = $conn -> query($sql); 
                                  

                                    }
                                    else
                                    {
                                        $sql = "SELECT * from  products";
                                        $Result = $conn -> query($sql); 
                                        
                                    }


                                }                     
                             
                                ?>





                                    <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                                        <div class="price__filter--group">
                                            <label class="price__filter--label" for="Filter-Price-GTE2">From</label>
                                            <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                                <span class="price__filter--currency">Rs: </span>
                                                <input class="price__filter--input__field border-0" name="start" id="Filter-Price-GTE2" type="number" placeholder="0" min="0" max="250.00">
                                            </div>
                                        </div>
                                        <div class="price__divider">
                                            <span>-</span>
                                        </div>
                                        <div class="price__filter--group">
                                            <label class="price__filter--label" for="Filter-Price-LTE2">To</label>
                                            <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                                <span class="price__filter--currency">Rs: </span>
                                                <input class="price__filter--input__field border-0" name="end" id="Filter-Price-LTE2" type="number" min="0" placeholder="10000.00" max="10000.00"> 
                                            </div>	
                                        </div>
                                    </div>
                                    <button class="btn price__filter--btn" name="Filter_btn" type="submit">Filter</button>
                               
                               
                               
                                </form>







                            </div>
                            <div class="single__widget widget__bg">
                                <h2 class="widget__title h3">Top Rated Product</h2>
                                <div class="product__grid--inner">
                                    <div class="product__grid--items d-flex align-items-center">
                                        <div class="product__grid--items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__grid--items__img product__primary--img" src="assets/img/product/small-product2.png" alt="product-img">
                                                <img class="product__grid--items__img product__secondary--img" src="assets/img/product/small-product3.png" alt="product-img">
                                            </a>
                                        </div>
                                        <div class="product__grid--items--content">
                                            <h3 class="product__grid--items--content__title h4"><a href="product-details.html">Green-surface</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$42.00</span>
                                                <span class="old__price">$48.00</span>
                                            </div>
                                            <div class="product__items--rating d-flex align-items-center">
                                                <ul class="d-flex">
                                                    <li class="product__items--rating__list">
                                                        <span class="product__items--rating__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                            <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="product__items--rating__list">
                                                        <span class="product__items--rating__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                            <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="product__items--rating__list">
                                                        <span class="product__items--rating__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                            <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="product__items--rating__list">
                                                        <span class="product__items--rating__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                            <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="product__items--rating__list">
                                                        <span class="product__items--rating__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                                <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="#c7c5c2"/>
                                                            </svg> 
                                                        </span>
                                                    </li>
                                                </ul>
                                                <span class="product__items--rating__count--number">(24)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product__grid--items d-flex align-items-center">
                                        <div class="product__grid--items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__grid--items__img product__primary--img" src="assets/img/product/small-product7.png" alt="product-img">
                                                <img class="product__grid--items__img product__secondary--img" src="assets/img/product/small-product6.png" alt="product-img">
                                            </a>
                                        </div>
                                        <div class="product__grid--items--content">
                                            <h4 class="product__grid--items--content__title"><a href="product-details.html">Fresh-whole</a></h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$55.00</span>
                                                <span class="old__price">$62.00</span>
                                            </div>
                                            <div class="product__items--rating d-flex align-items-center">
                                                <ul class="d-flex">
                                                    <li class="product__items--rating__list">
                                                        <span class="product__items--rating__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                            <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="product__items--rating__list">
                                                        <span class="product__items--rating__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                            <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="product__items--rating__list">
                                                        <span class="product__items--rating__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                            <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="product__items--rating__list">
                                                        <span class="product__items--rating__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                            <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="product__items--rating__list">
                                                        <span class="product__items--rating__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                                <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="#c7c5c2"/>
                                                            </svg> 
                                                        </span>
                                                    </li>
                                                </ul>
                                                <span class="product__items--rating__count--number">(24)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product__grid--items d-flex align-items-center">
                                        <div class="product__grid--items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__grid--items__img product__primary--img" src="assets/img/product/small-product5.png" alt="product-img">
                                                <img class="product__grid--items__img product__secondary--img" src="assets/img/product/small-product4.png" alt="product-img">
                                            </a>
                                        </div>
                                        <div class="product__grid--items--content">
                                            <h4 class="product__grid--items--content__title"><a href="product-details.html">Vegetables Juices</a></h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$45.00</span>
                                                <span class="old__price">$52.00</span>
                                            </div>
                                            <div class="product__items--rating d-flex align-items-center">
                                                <ul class="d-flex">
                                                    <li class="product__items--rating__list">
                                                        <span class="product__items--rating__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                            <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="product__items--rating__list">
                                                        <span class="product__items--rating__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                            <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="product__items--rating__list">
                                                        <span class="product__items--rating__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                            <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="product__items--rating__list">
                                                        <span class="product__items--rating__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                            <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="product__items--rating__list">
                                                        <span class="product__items--rating__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                                <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="#c7c5c2"/>
                                                            </svg> 
                                                        </span>
                                                    </li>
                                                </ul>
                                                <span class="product__items--rating__count--number">(24)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single__widget widget__bg">
                                <h2 class="widget__title h3">Brands</h2>
                                <ul class="widget__tagcloud">
                                    <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="shop.html">Organic</a></li>
                                    <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="shop.html">Vegetable</a></li>
                                    <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="shop.html">Giant</a></li>
                                    <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="shop.html">Grocery</a></li>
                                    <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="shop.html">Foods</a></li>
                                    <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="shop.html">Bakery</a></li>
                                    <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="shop.html">Dairies</a></li>
                                    <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="shop.html">Nature </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="shop__product--wrapper">
                            <div class="tab_content">
                                <div id="product_grid" class="tab_pane active show">
                                    <div class="product__section--inner product__section--style3__inner">
                                        <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-sm-3 row-cols-2 mb--n30">
                                            




                                        
                                        <!-- Ismail -->

                                        <?php

                                        if(mysqli_num_rows($Result) > 0 ){
                                        while($ac = mysqli_fetch_assoc($Result))
                                       
                                        {  

                                        ?>

                                            <form action="" method="post">
                                            <div class="col mb-30" >
                                                <div class="product__items product__items2">
                                                    <div class="product__items--thumbnail">
                                                        <a class="product__items--link" href="product-details.html">
                                                            <img class="product__items--img product__primary--img" src="Image/<?php echo $ac["Product_Image"];?>" alt="product-img">
                                                            <img class="product__items--img product__secondary--img" src="Image/<?php echo $ac["Product_sub_img"];?>" alt="product-img">
                                                        </a>
                                                        <div class="product__badge">
                                                       
                                                        <?php 
                                                         date_default_timezone_set('asia/karachi');
                                                         $dates = date('Y-m-d H:i:s');
                                                        //  echo "Current Date". $dates;
                                                        //  echo "<br>";
                                                         
                                                        // echo "Discount Date". $ac['Discount_Date'];
 
                                                        if($ac['Discount_Date'] < $dates)
                                                        {
                                                        ?>    
                                                        
                                                        <?php 
                                                        }
                                                        else{
                                                        ?>  
                                                      
                                                             <span class="product__badge--items sale">Sale</span>                                              
                                                        <?php 
                                                       
                                                        }
                                                        ?>




                                                           
                                                        </div>
                                                            <style>

                                                            /* .productfixed{background:var(--secondary-color);color:var(--white-color)} */
                                                            .productfixed{
                                                                background-color: red;
                                                            }

                                                            </style>


                                                           
                                                        
                                                        <ul class="product__items--action">
                                                            <li class="product__items--action__list">
                                                                
                                                            <a class="product__items--action__btn" href="#">
                                                                <input type="submit" style="border:0;background-color:transparent;" class="add__to--cart__btn"  name="add_to_Wishlist" value=""> 
                                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                                                <span class="visually-hidden">Wishlist</span>
                                                            </a>

                                                                <?php                                                                
                                                                // $select_Wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE Product_Name = '$product_name'");
                                                                // if(mysqli_num_rows($select_Wishlist) > 0){
                                                                 
                                                                //  echo '
                                                                //     <a class="productfixed" href="#">
                                                                //     <input type="submit" style="border:0;background-color:transparent;" class="add__to--cart__btn"  name="add_to_Wishlist" value=""> 
                                                                //     <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                                                //     <span class="visually-hidden">Wishlist</span>
                                                                //   </a>';
                                                                
                                                                // }else{
                                                                // echo ' 
                                                                //     <a class="product__items--action__btn" href="#">
                                                                //     <input type="submit" style="border:0;background-color:transparent;" class="add__to--cart__btn"  name="add_to_Wishlist" value=""> 
                                                                //     <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                                                //     <span class="visually-hidden">Wishlist</span>
                                                                //     </a>                                                             
                                                                // </a>';
                                                                // }
                                                                ?>
 
                                                            </li>
                                                            <li class="product__items--action__list">
                                                                <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>
                                                                    <span class="visually-hidden">Quick View</span>  
                                                                </a>
                                                            </li>
                                                            <li class="product__items--action__list">
                                                                <a class="product__items--action__btn" href="compare.html">
                                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256"/><path d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                                                    <span class="visually-hidden">Compare</span>    
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="product__items--content product__items2--content text-center">
                                                       
                                                        <!-- <a class="add__to--cart__btn" href="#" > </a> -->
                                                        

                                                        <input type="hidden" name="Product_Name" value="<?php echo $ac['Product_Name']; ?>">


                                      


                                                        <input type="hidden" name="Product_Price" value="<?php echo $ac['Product_Price']; ?>">



                                                        <input type="hidden" name="Product_Image" value="<?php echo $ac['Product_Image']; ?>">


                                                        <input type="hidden" name="Product_Qty" value="<?php echo $ac['Product_Qty'];  ?>">

                                                        <input type="hidden" name="Discount_Price" value="<?php echo $ac['Discount_Price']; ?>">
                                                        <input type="hidden" name="Discount_Date" value="<?php echo $ac['Discount_Date']; ?>">
                                                        
                                                        <input type="hidden" name="Product_code" value="<?php echo $ac['Product_code']; ?>">

                                                        <input type="hidden" name="Product_Id" value="<?php echo $ac['Product_Id']; ?>">
                                       



                                                        <input type="submit" style="border:0;background-color:transparent;" class="add__to--cart__btn"  name="add_to_cart" value="+ Add to cart"> 
                                                   

                                                    
                                                        <h3 class="product__items--content__title h4"><a href="#"><?php echo $ac["Product_Name"];?></a></h3>
                                                        <div class="product__items--price">


                                                        <?php 
                                                        date_default_timezone_set('asia/karachi');
                                                        $dates = date('Y-m-d H:i:s');
                                                     
 
                                                        if($ac['Discount_Date'] < $dates)
                                                        {
                                                        
                                                        ?>
                                                        <input type="hidden" name="Product_code" value="<?php echo $ac['Product_Price']; ?>">
                                                        <span class="current__price">Rs: <?php echo $ac["Product_Price"];?> </span>
                                                        <?php 
                                                        }
                                                        else{
                                                        ?>  
                                                        <input type="hidden" name="Discount_Price" value="<?php echo $ac['Discount_Price']; ?>">
                                                        <span class="current__price">Rs: <?php echo $ac["Discount_Price"];?> </span>  
                                                        <span class="old__price">Rs: <?php echo $ac["Product_Price"];?></span>   

                                                        <?php 
                                                       
                                                        }
                                                        ?>
                                                       
                                                     
                                                            
                                                           


                                                        </div>
                                                        <div class="product__items--rating d-flex justify-content-center align-items-center">
                                                            <ul class="d-flex">
                                                                <li class="product__items--rating__list">
                                                                    <span class="product__items--rating__icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                                        <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                                        </svg>
                                                                    </span>
                                                                </li>
                                                                <li class="product__items--rating__list">
                                                                    <span class="product__items--rating__icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                                        <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                                        </svg>
                                                                    </span>
                                                                </li>
                                                                <li class="product__items--rating__list">
                                                                    <span class="product__items--rating__icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                                        <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                                        </svg>
                                                                    </span>
                                                                </li>
                                                                <li class="product__items--rating__list">
                                                                    <span class="product__items--rating__icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                                        <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                                        </svg>
                                                                    </span>
                                                                </li>
                                                                <li class="product__items--rating__list">
                                                                    <span class="product__items--rating__icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                                            <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="#c7c5c2"/>
                                                                        </svg> 
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                            <span class="product__items--rating__count--number">(24)</span>
                                                        </div>
                                                    </div>
                                                </div>
                         
                                               
                                            </div>
                                        </form>


                                            <?php 
                                          
                                            } 
                                            
                                            
                                                }
                                                else{
                                                    echo "No Record Found.";
                                                }

                                            ?> 

                                        </div>







                                    </div>
                                </div>
                                <div id="product_list" class="tab_pane">
                                    
                                <div class="product__section--inner product__section--style3__inner">
                                      
  
                                    
<script type="text/javascript" src="js/main.js"></script>

<script type="text/javascript">

$(document).ready(function(){   

function loadTable(){

    $.ajax({
        url: "ajax-load.php",
        type: "post",
        success: function(data){
            $("#tabel-data").html(data)
        }
      })
      
}
            
loadTable();     
  
}) 

</script>
                                        <div class="row row-cols-1 mb--n30">

                                        <?php
                                        if($Res -> num_rows > 0){   
                                        while($gread = $Res -> fetch_assoc())
                                        {
                                        ?>


                                        <div class="col mb-30">                                  
                                                <div class="product__items product__list--items d-flex">
                                                    <div class="product__items--thumbnail product__list--items__thumbnail">
                                                        <a class="product__items--link" href="product-details.html">
                                                            <img class="product__items--img product__primary--img" src="Image/<?php echo $gread['Product_Image'];?>" alt="product-img">
                                                            <img class="product__items--img product__secondary--img"src="Image/<?php echo $gread['Product_sub_img'];?>" alt="product-img">
                                                        </a>
                                                        <div class="product__badge">

                                                        <?php 


                                                        date_default_timezone_set('asia/karachi');
                                                        $date = date('Y-m-d H:i:s');

                                                        if($gread['Discount_Date'] < $date)
                                                        {
                                                        ?>                                                  
                                                        <?php 
                                                        }
                                                        else{
                                                        ?>  
                                                        <span class="product__badge--items sale">Sale</span>

                                                        <?php 
                                                       
                                                        }
                                                        ?>

                                                    
                                                        
                                                        
                                                        </div>
                                                        <ul class="product__items--action">
                                                            <li class="product__items--action__list">
                                                                <a class="product__items--action__btn" href="wishlist.html">
                                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                                                    <span class="visually-hidden">Wishlist</span>
                                                                </a>
                                                            </li>
                                                            <li class="product__items--action__list">
                                                                <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>
                                                                    <span class="visually-hidden">Quick View</span>  
                                                                </a>
                                                            </li>
                                                            <li class="product__items--action__list">
                                                                <a class="product__items--action__btn" href="compare.html">
                                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256"/><path d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                                                    <span class="visually-hidden">Compare</span>    
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="product__list--items__content">
                                                        <h3 class="product__list--items__content--title h4 mb-10"><a href="product-details.html"> <?php echo $gread['Product_Name'];?> </a></h3>
                                                        <div class="product__items--price mb-10">
                                                        <?php 
                                                        
                                                        date_default_timezone_set('asia/karachi');
                                                        $date = date('Y-m-d H:i:s');
                                                      

                                                        if($gread['Discount_Date'] < $date)
                                                        {
                                                        ?>

                                                        <span class="current__price">Rs: <?php echo $gread['Product_Price'];?> </span>
                                                        <?php 
                                                        }
                                                        else{
                                                        ?>  
                                                        <span class="current__price">Rs: <?php echo $gread['Discount_Price'];?> </span>  
                                                        <span class="old__price">Rs: <?php echo $gread['Product_Price'];?></span>   

                                                        <?php 
                                                       
                                                        }
                                                        ?>
                                                       
                                                        </div>
                                                        <div class="product__items--rating mb-15 d-flex align-items-center mb-10">
                                                            <ul class="d-flex">
                                                                <li class="product__items--rating__list">
                                                                    <span class="product__items--rating__icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                                        <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                                        </svg>
                                                                    </span>
                                                                </li>
                                                                <li class="product__items--rating__list">
                                                                    <span class="product__items--rating__icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                                        <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                                        </svg>
                                                                    </span>
                                                                </li>
                                                                <li class="product__items--rating__list">
                                                                    <span class="product__items--rating__icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                                        <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                                        </svg>
                                                                    </span>
                                                                </li>
                                                                <li class="product__items--rating__list">
                                                                    <span class="product__items--rating__icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                                        <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"/>
                                                                        </svg>
                                                                    </span>
                                                                </li>
                                                                <li class="product__items--rating__list">
                                                                    <span class="product__items--rating__icon">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10.105" height="9.732" viewBox="0 0 10.105 9.732">
                                                                            <path  data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="#c7c5c2"/>
                                                                        </svg> 
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                            <span class="product__items--rating__count--number">(24)</span>
                                                        </div>
                                                        <p class="product__list--items__content--desc mb-20"><?php echo $gread['Product_Des'];?> </p>
                                                        <a class="btn add__to--cart__btn2" href="cart.php">+ Add to cart</a>
                                                </div>
                                            </div>
                                        </div>

                                          
                      

                                       
                                     


                                      
                                        

                                         <?php 
                                            } 
                                            }
                                            else
                                            {
                                
                                            echo "<h2 class='empty' style='color:red'>No product added</h2>";
                                        
                                            }
                                            ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination__area bg__gray--color">

<?php 




$sql1 = "SELECT * From  products";
$result1 = mysqli_query($conn,$sql1) or die ("Query Field");

if(mysqli_num_rows($result1) > 0){

$total_record = mysqli_num_rows($result1);

$total_page = ceil($total_record / $limit);


echo '<nav class="pagination justify-content-center">
<ul class="pagination__wrapper d-flex align-items-center justify-content-center">';

if($page > 1){
   echo '<li class="pagination__list">
    <a  href="shop.php?page='.($page - 1).' " class="pagination__item--arrow  link ">
        <svg xmlns="http://www.w3.org/2000/svg"  width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292"/></svg>
        <span class="visually-hidden">page left arrow</span>
    </a>
    <li>
    ';
}



for ($i=1; $i <= $total_page; $i++) { 
   
if($i == $page){
    $active = "pagination__item--current";
}
else{
    $active = "";
}


echo '<li class="pagination__list"><a href="Shop.php?page='.$i.'"><span class="pagination__item ' .$active .'">'.$i.'</span></a></li>';
}


if($total_page > $page){
    echo  '<li class="pagination__list">
    <a href="shop.php?page='.($page + 1).' " class="pagination__item--arrow  link ">
        <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100"/></svg>
        <span class="visually-hidden">page right arrow</span>
    </a>
    <li>
    ';
}


echo '
</ul>
</nav>';

}


?>


                               







                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End shop section -->

        <!-- Start shipping section -->
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
        <!-- End shipping section -->
    </main>






<?php

include('Footer.php')

?>
