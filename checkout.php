<link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
<link rel="stylesheet" href="assets/css/plugins/glightbox.min.css">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&amp;family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css">



<?php

session_start();

@include 'connect.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];
   $User_Id =  $_SESSION['U_Id'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['Product_Name'] .' ('. $product_item['Product_Qty'] .') ';

        
        date_default_timezone_set('asia/karachi');
        $dates = date('Y-m-d H:i:s');
                                                     
 
        if($product_item['Discount_Date'] < $dates)
        {
         $product_price = (int)($product_item['Product_Price'] * (int)$product_item['Product_Qty'] + 500);
        }
        else{
        $product_price = (int)($product_item['Discount_Price'] * (int)$product_item['Product_Qty'] + 500);
        }
         
         $price_total += $product_price;
      };
   }


     
  

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price,User_Id) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total','$User_Id')") or die('query failed');

   if($cart_query && $detail_query){
    mysqli_query($conn, "DELETE FROM `cart`");
    echo"<script>alert('Your product has been delivered')</script>";
    echo"<script>window.location='Index.php';</script>";



    
 }

}



?>

<div class="checkout__page--area">
        <div class="container">
            <div class="checkout__page--inner d-flex">
                <div class="main checkout__mian">
                    <header class="main__header checkout__mian--header mb-30">
                        <h1 class="main__logo--title"><a class="logo logo__left mb-20" href="index-2.html"><img src="assets/img/logo/nav-log.png" alt="logo"></a></h1>
                        <details class="order__summary--mobile__version">
                            <summary class="order__summary--toggle border-radius-5">
                                <span class="order__summary--toggle__inner">
                                    <span class="order__summary--toggle__icon">
                                        <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <span class="order__summary--toggle__text show">
                                        <span>Show order summary</span>
                                        <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="currentColor"><path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path></svg>
                                    </span>
                                    <span class="order__summary--final__price">$227.70</span>
                                </span>
                            </summary>
                            <div class="order__summary--section">
                                <div class="cart__table checkout__product--table">
                                    <table class="summary__table">
                                        <tbody class="summary__table--body">


                                            <?php

                                                $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
                                                $price_total = 0;
                                                if(mysqli_num_rows($cart_query) > 0){
                                                 while($product_item = mysqli_fetch_assoc($cart_query)){
                                            ?>


                                                <tr class=" summary__table--items">
                                                        <td class=" summary__table--list">
                                                            <div class="product__image two  d-flex align-items-center">
                                                                <div class="product__thumbnail border-radius-5">
                                                                    <a href="product-details.html"><img class="border-radius-5" src="<?php echo $product_item['Product_Image']?>" alt="cart-product"></a>
                                                                    <span class="product__thumbnail--quantity">1</span>
                                                                </div>
                                                                <div class="product__description">
                                                                    <h3 class="product__description--name h4"><a href="product-details.html">Fresh-whole-fish</a></h3>
                                                                    <span class="product__description--variant">COLOR: Blue</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class=" summary__table--list">
                                                            <span class="cart__price">£65.00</span>
                                                        </td>
                                                    </tr>

                                                <?php
                                                    
                                                };
                                                };

                                                ?>
                                                                                        
                                         


                                        </tbody>
                                    </table> 
                                </div>
                                <div class="checkout__discount--code">
                                    <form class="d-flex" action="#">
                                        <label>
                                            <input class="checkout__discount--code__input--field border-radius-5" placeholder="Gift card or discount code"  type="text">
                                        </label>
                                        <button class="checkout__discount--code__btn btn border-radius-5" type="submit">Apply</button>
                                    </form>
                                </div>
                                <div class="checkout__total">
                                    <table class="checkout__total--table">
                                        <tbody class="checkout__total--body">
                                            <tr class="checkout__total--items">
                                                <td class="checkout__total--title text-left">Subtotal </td>
                                                <td class="checkout__total--amount text-right">$860.00</td>
                                            </tr>
                                            <tr class="checkout__total--items">
                                                <td class="checkout__total--title text-left">Shipping</td>
                                                <td class="checkout__total--calculated__text text-right">Calculated at next step</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="checkout__total--footer">
                                            <tr class="checkout__total--footer__items">
                                                <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                                <td class="checkout__total--footer__amount checkout__total--footer__list text-right">$860.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </details>
                        <nav>
                            <ol class="breadcrumb checkout__breadcrumb d-flex">
                                <li class="breadcrumb__item breadcrumb__item--completed d-flex align-items-center">
                                    <a class="breadcrumb__link" href="cart.html">Cart</a>
                                    <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path></svg>
                                </li>
                        
                                <li class="breadcrumb__item breadcrumb__item--current d-flex align-items-center">
                                    <span class="breadcrumb__text current">Information</span>
                                    <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path></svg>
                                </li>
                                <li class="breadcrumb__item breadcrumb__item--blank d-flex align-items-center">
                                    <span class="breadcrumb__text">Shipping</span>
                                    <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path></svg>
                                </li>
                                    <li class="breadcrumb__item breadcrumb__item--blank">
                                    <span class="breadcrumb__text">Payment</span>
                                </li>
                            </ol>
                        </nav>
                    </header>
                    <main class="main__content_wrapper section--padding pt-0">
                        
                     <form action="" method="post">
    

                            <div class="checkout__content--step section__shipping--address">
                                <div class="section__header mb-25">
                                    <h2 class="section__header--title h3">Shipping address</h2>
                                </div>
                                <div class="section__shipping--address__content">
                                    <div class="row">
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list ">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Full name " name="name"  type="text" required>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Contact Number" name="number" type="text" required>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Email Address" name="email"  type="email" required>
                                                </label>
                                            </div>
                                        </div>



                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Address Line 1" name="flat" type="text" required>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-6 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Address Line 2 (optional)" name="street"  type="text">
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list checkout__input--select select">
                                                <label class="checkout__select--label" for="country">Payment / Method</label>
                                                <select class="checkout__input--select__field border-radius-5" id="country" name="method">
                                                    <option value="cash on delivery" selected>cash on devlivery</option>
                                                    <option value="credit cart">credit cart</option>
                                                    <option value="paypal">Jazz Cash</option>   
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-6 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="City"  name="city" type="text" required>
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-6 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="State"  type="text" name="state" required>
                                                </label>
                                            </div>
                                        </div>

                                      




                                   
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list checkout__input--select select">
                                                <label class="checkout__select--label" for="country">Country / region</label>
                                                <select class="checkout__input--select__field border-radius-5" id="country" name="country">
                                                    <option value="Pakistan" selected>Pakistan</option>   
                                                    <option value="India">India</option>
                                                    <option value="United States">United States</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Islands">Islands</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Antigua Barbuda">Antigua Barbuda</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" name="pin_code" placeholder="Postal code"  type="text" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                            <div class="checkout__content--step__footer d-flex align-items-center">
                                <a class="continue__shipping--btn btn border-radius-5" href="Shop.php">Continue To Shipping</a>
                                <a class="previous__link--content" href="cart.php">Return to cart</a>
                            </div>
                 



                    </main>
                    <footer class="main__footer main__footer--wrapper">
                        <p class="copyright__content">Copyright © 2022 <a class="copyright__content--link text__primary" href="index-2.html">Grocee</a> . All Rights Reserved.Design By Grocee</p>
                    </footer>
                </div>
                <aside class="checkout__sidebar sidebar">
                    <div class="cart__table checkout__product--table">
                        <table class="cart__table--inner">
                            <tbody class="cart__table--body">

                            <?php
                            $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
                            $price_total = 0;
                            $grand_total = 0;
                            if(mysqli_num_rows($cart_query) > 0){
                            while($product_item = mysqli_fetch_assoc($cart_query)){
                            ?>


                            <tr class="cart__table--body__items">
                                <td class="cart__table--body__list">
                                        <div class="product__image two  d-flex align-items-center">
                                            <div class="product__thumbnail border-radius-5">
                                                <a href="#"><img class="border-radius-5" src="Image/<?php echo $product_item['Product_Image']?>" alt="cart-product"></a>
                                                <span class="product__thumbnail--quantity"><?php echo $product_item['Product_Qty']?></span>
                                            </div>
                                            <div class="product__description">
                                                <h3 class="product__description--name h4"><a href="#"><?php echo $product_item['Product_Name']?></a></h3>
                                                <!-- <span class="product__description--variant">COLOR: Blue</span> -->
                                            </div>
                                        </div>
                                    </td>
                                <td class="cart__table--body__list">


                                                        <?php 
                                                        date_default_timezone_set('asia/karachi');
                                                        $dates = date('Y-m-d H:i:s');
                                                     
 
                                                        if($product_item['Discount_Date'] < $dates)
                                                        {
                                                        
                                                        ?>
                                                        <span class="cart__price">Rs: <?php echo $sub_total = (int)($product_item['Product_Price'] * (int)$product_item['Product_Qty']); ?>   / <?php echo $product_item['Product_Qty']?>  =  <?php echo $product_item['Product_Price']?>   </span>
                                                       
                                                        <?php 
                                                        }
                                                        else{
                                                        ?>  
                                                     
                                                        <span class="cart__price">Rs: <?php echo $sub_total = (int)($product_item['Discount_Price'] * (int)$product_item['Product_Qty']); ?>   / <?php echo $product_item['Product_Qty']?>  =  <?php echo $product_item['Discount_Price']?>   </span>

                                                        <?php 
                                                       
                                                        }
                                                        ?>


                                
                                   
                                </td>
                            </tr>


                            <?php
                                $grand_total += $sub_total;  

                            };
                            };

                            ?>
     
                         
                            </tbody>
                        </table> 
                    </div>
          
                  
                        <table class="checkout__total--table">
                            <tbody class="checkout__total--body">
                                <tr class="checkout__total--items">
                                    <td class="checkout__total--title text-left">Subtotal </td>
                                    <td class="checkout__total--amount text-right">Rs : <?php echo $grand_total ?></td>
                                </tr>
                                <tr class="checkout__total--items">
                                    <td class="checkout__total--title text-left">Shipping</td>
                                    <td class="checkout__total--calculated__text text-right">Rs: 500 </td>
                                </tr>
                            </tbody>
                            <tfoot class="checkout__total--footer">
                                <tr class="checkout__total--footer__items">
                                    <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                    <td class="checkout__total--footer__amount checkout__total--footer__list text-right">Rs : <?php echo $grand_total + 500 ?></td>
                                </tr>
                            </tfoot>
                        
                     
                        </table>


                       
                        <div class="checkout__content--step__footer d-flex align-items-center">
                        <input type="submit" value="Place Order" name="order_btn" class="continue__shipping--btn btn border-radius-5">
                        </div> 

               
                </aside>
                
            </form>
            </div>
        </div>
    </div>


                    
