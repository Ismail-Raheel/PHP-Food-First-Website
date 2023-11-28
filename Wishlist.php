<?php

include('Header.php');

require("connect.php");






 if(isset($_GET['removeid'])){
    $remove_id = $_GET['removeid'];
    mysqli_query($conn, "DELETE FROM `wishlist` WHERE ID = '$remove_id'");
    echo"<script>window.location='Wishlist.php';</script>";   
 };
 

 if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `wishlist`");
    echo"<script>window.location='Shop.php';</script>";   
 }




 $sql = "SELECT *
 FROM categories c, products p
 WHERE c.Category_ID = p.Category_Id";
 $Res = $conn -> query($sql); 
 
 

?>


<main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Wishlist</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index-2.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Wishlist</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- cart section start -->
        <section class="cart__section section--padding">
            <div class="container">
                <div class="cart__section--inner">
                    <form action="#"> 
                        <h2 class="cart__title mb-40">Wishlist</h2>
                        <div class="cart__table">
                            <table class="cart__table--inner">
                                <thead class="cart__table--header">
                                    <tr class="cart__table--header__items">
                                        <th class="cart__table--header__list">Product</th>
                                        <th class="cart__table--header__list">Price</th>
                                        <th class="cart__table--header__list text-center">STOCK STATUS</th>
                                        <th class="cart__table--header__list text-right">ADD TO CART</th>
                                    </tr>
                                </thead>
                                <tbody class="cart__table--body">


                                <?php        
                                    $sql = "SELECT *
                                    FROM categories c, products p
                                    WHERE c.Category_ID = p.Category_Id";
                                    $Res = $conn -> query($sql); 
                               
                                ?>



                                <?php 
         
                                $select_cart = mysqli_query($conn, "SELECT * FROM `wishlist`");
                                $grand_total = 0;
                                if(mysqli_num_rows($select_cart) > 0){
                                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                                ?>

                                <form action="" method="post">    

                                    <tr class="cart__table--body__items">
                                        <td class="cart__table--body__list">
                                            <div class="cart__product d-flex align-items-center">
                                                <button class="cart__remove--btn" aria-label="search button" type="button">
                                                <a href="Wishlist.php?removeid=<?php echo $fetch_cart['ID']; ?>">      <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg></a> 
                                                
                                                   
                                                </button>
                                                <div class="cart__thumbnail">
                                                    <a href="product-details.html"><img class="border-radius-5" src="Image/<?php echo $fetch_cart['Product_Image']; ?>" alt="cart-product"></a>
                                                </div>
                                                <div class="cart__content">
                                                    <h3 class="cart__content--title h4"><a href="product-details.html"><?php echo $fetch_cart['Product_Name']; ?></a></h3>
                                                    <!-- <span class="cart__content--variant">COLOR: Blue</span>
                                                    <span class="cart__content--variant">WEIGHT: 2 Kg</span> -->
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">


                                                        <?php 
                                                        date_default_timezone_set('asia/karachi');
                                                        $dates = date('Y-m-d H:i:s');
                                                     
 
                                                        if($fetch_cart['Discount_Date'] < $dates)
                                                        {
                                                        
                                                        ?>
                                                        <span class="current__price">Rs: <?php echo $fetch_cart["Product_Price"];?> </span>
                                                        <?php 
                                                        }
                                                        else{
                                                        ?>  
                                                        <span class="current__price">Rs: <?php echo $fetch_cart["Discount_Price"];?> </span>  
                                                        <span class="old__price">Rs: <?php echo $fetch_cart["Product_Price"];?></span>   

                                                        <?php 
                                                       
                                                        }
                                                        ?>



                                        </td>
                                        <td class="cart__table--body__list text-center">
                                            <span class="in__stock text__secondary">in stock</span>
                                        </td>
                                        <td class="cart__table--body__list text-right">
                                        <input type="submit"  class="wishlist__cart--btn btn"  name="add_to_cart" value="+ Add to cart"> 
                                            </a>
                                        </td>
                                    </tr>

                                </form>
                                          
                                <?php
                                // $grand_total += $sub_total;  
                                };
                                };
                                ?>
                          
                                </tbody>
                            </table> 
                            <div class="continue__shopping d-flex justify-content-between">
                                <a class="continue__shopping--link" href="Shop.php">Continue shopping</a>
                                <a class="continue__shopping--clear" href="Wishlist.php?delete_all" onclick="return confirm('remove all item from Wishlist ?')">View All Products</a>
                            </div>
                        </div> 
                    </form> 
                </div>
            </div>     
        </section>
        <!-- cart section end -->

        <!-- Start product section -->
        <section class="product__section product__section--style3 section--padding pt-0">
            <div class="container">
                <div class="section__heading3 mb-40">
                    <h2 class="section__heading3--maintitle">New Products</h2>
                </div>
                <div class="product__section--inner product3__section--inner__padding product__section--style3__inner product__swiper--activation swiper">
                    <div class="swiper-wrapper">
                    <?php
                        if($Res -> num_rows > 0){   
                        while($ac = $Res -> fetch_assoc())
                        {
                        ?>

                        <div class="swiper-slide">
                            <div class="product__items">
                                <div class="product__items--thumbnail" style="width:300px;height:250px;">
                                    <a class="product__items--link" href="#">
                                        <img class="product__items--img product__primary--img" src="Image/<?php echo $ac['Product_Image'];?>" alt="product-img">
                                        <img class="product__items--img product__secondary--img" src="Image/<?php echo $ac['Product_sub_img'];?>" alt="product-img">
                                    </a>
                                    <div class="product__badge">
                                    <?php 
                                    date_default_timezone_set('asia/karachi');
                                    $dates = date('Y-m-d H:i:s');
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
                                    <ul class="product__items--action">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="#">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                                <span class="visually-hidden">Wishlist</span> 
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" data-open="modal1" href="#">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>
                                                <span class="visually-hidden">Quick View</span>   
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="#">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256"/><path d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                                <span class="visually-hidden">Compare</span>    
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                                <div class="product__items--content text-center">
                                        <!-- <a class="add__to--cart__btn" href="#">+ Add to cart</a> -->
                                        <h3 class="product__items--content__title h4"><a href="#"><?php echo $ac['Product_Name'];?></a></h3>
                                        <div class="product__items--price">
                                        <?php 
                                        date_default_timezone_set('asia/karachi');
                                        $dates = date('Y-m-d H:i:s');                                           
                                        if($ac['Discount_Date'] < $dates)
                                        {                                                       
                                        ?>
                                        <span class="current__price">Rs: <?php echo $ac["Product_Price"];?> </span>
                                        <?php 
                                        }
                                        else{
                                        ?>  
                                        <span class="current__price">Rs: <?php echo $ac["Discount_Price"];?> </span>  
                                        <span class="old__price">Rs: <?php echo $ac["Product_Price"];?></span>   
                                        <?php                                                       
                                        }
                                        ?>
                                    </div>                                 
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
                    <div class="swiper__nav--btn swiper-button-next"></div>
                    <div class="swiper__nav--btn swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <!-- End product section -->

        <!-- Start brand logo section -->
        <div class="brand__logo--section section--padding pt-0">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="brand__logo--section__inner d-flex justify-content-between align-items-center">
                            <div class="brand__logo--items">
                                <img class="brand__logo--items__thumbnail--img display-block" src="assets/img/logo/brand-logo1.png" alt="brand img">
                            </div>
                            <div class="brand__logo--items">
                                <img class="brand__logo--items__thumbnail--img display-block" src="assets/img/logo/brand-logo2.png" alt="brand img">
                            </div>
                            <div class="brand__logo--items">
                                <img class="brand__logo--items__thumbnail--img display-block" src="assets/img/logo/brand-logo3.png" alt="brand img">
                            </div>
                            <div class="brand__logo--items">
                                <img class="brand__logo--items__thumbnail--img display-block" src="assets/img/logo/brand-logo4.png" alt="brand img">
                            </div>
                            <div class="brand__logo--items">
                                <img class="brand__logo--items__thumbnail--img display-block" src="assets/img/logo/brand-logo5.png" alt="brand img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End brand logo section -->

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