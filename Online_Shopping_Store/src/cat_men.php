<?php
include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:loging.php');
}

if(isset($_POST['add_to_cart'])){
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND userId = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(userId, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', 1, '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }
}

?>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<!DOCTYPE html>
<html>
<head>
   <title></title>
   <link rel="stylesheet" href="home_styles.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <style>
      @media (max-width: 768px) {
         /* Responsive styles here */
         
         .container-1 {
            display: flex;
            align-items: center;
            justify-content: center;
         }

         .container-1 input[type="text"] {
            width: 80%;
            margin-right: 10px;
         }

         .container-1 .fa-search {
            margin-left: 10px;
         }

         .top-part {
            flex-wrap: wrap;
         }

         #log-reg {
            margin-top: 20px;
         }

         #log-reg .signup {
            margin-top: 10px;
         }

         #log-reg .button-login,
         #log-reg .button-signup {
            width: 100%;
         }

         .cart,
         .profile {
            margin-top: 10px;
         }

         .menu-bar ul {
            flex-direction: column;
         }

         .menu-bar ul li {
            margin-bottom: 10px;
         }

         .slid {
            display: none;
         }

         .img-border {
            width: 100%;
            margin-bottom: 10px;
         }

         .main-fream-offers {
            padding: 10px;
            box-sizing: border-box;
         }

         .sub-container-box {
            width: 100%;
         }

         .sub-container-box .item-img {
            margin-bottom: 10px;
            display: flex;
            justify-content: center;
         }

         .titles-New-Arrivals,
         .titles-Featured-items {
            display: block;
            text-align: center;
            margin-bottom: 10px;
         }
      }

      @media (max-width: 768px) {
   .container-1 {
      display: flex;
      align-items: center;
      justify-content: center;
   }

   .container-1 input[type="text"] {
      width: 80%;
      margin-right: 10px;
   }

   .container-1 .fa-search {
      margin-left: 10px;
   }

   .top-part {
      flex-wrap: wrap;
   }

   #log-reg {
      margin-top: 20px;
   }

   #log-reg .signup {
      margin-top: 10px;
   }

   #log-reg .button-login,
   #log-reg .button-signup {
      width: 100%;
   }

   .cart,
   .profile {
      margin-top: 10px;
   }

   .menu-bar ul {
      flex-direction: column;
   }

   .menu-bar ul li {
      margin-bottom: 10px;
   }

   .slid {
      display: none;
   }

   .img-border {
      width: 100%;
      margin-bottom: 10px;
   }

   .main-fream-offers {
      padding: 10px;
      box-sizing: border-box;
   }

   .sub-container-box {
      width: 100%;
   }

   .sub-container-box .item-img {
      margin-bottom: 10px;
      display: flex;
      justify-content: center;
   }

   .titles-New-Arrivals,
   .titles-Featured-items {
      display: block;
      text-align: center;
      margin-bottom: 10px;
   }
}

   </style>
</head>
<body>
<!--Header part (start)-->
<div class="top-part">
        <hr class="vertical-lines">
        <div class="search-bar">
            <div class="container-1">
                <input type="text" placeholder="Search Productes">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
        </div>
    
        <div id="logo">
           <img src="images/logo.png" alt="logo" width="85" height="85"> 
        </div>

        <div class="cart">
            <a href="cart.php">
            <button type="button" class="button-cart">
                <span class="cart__icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
            </button>
            </a>
        </div>
        <div class="profile">
            <a href="userAccount.php">
            <button type="button" class="button-profile">
                <span class="profile__icon"><i class="fa fa-user" aria-hidden="true"></i></span>
            </button>
            </a>
        </div>
<!--Header part (end)-->
     </div>
<!--Navigation bar (start)-->
<div class="menu-bar">
            <ul>
                <li class="active"><a href="home.php">Home</a></li>
                <li><a href="#">Categories</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="cat_men.php">Mens</a></li>
                            <li><a href="cat_women.php?cat=Womens">Womens</a></li>
                            <li><a href="cat_kids.php?cat=Kids">Kids</a></li>
                            <li><a href="cat_living.php?cat=Home & Living">Home & Living </a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="cat_gifts.php?cat=Gift Card">Gift Cards</a></li>
                
                <li><a href="#">Contact US</a>
                <div class="sub-menu-1">
                        <ul>
                            <li><a href="Sent_message.php">Sent</a></li>
                            <li><a href="contact-us.php">New message</a></li>
                            
                        </ul>
                    </div>
            
               </li>
                <li><a href="aboutus.php">About Us</a></li>
            </ul>
        </div>
<!--Navigation bar (End)-->

<!--Featured-items (start)-->
        <div id="featured-items">
            <div class="main-fream-Featured-items">
                <div id="titles">
                    <span class="titles-Featured-items">Featured Items</span>
                </div>
                <div class="sub-containers">
                <?php  
            $select_products = mysqli_query($conn, "SELECT * FROM `products` where category = 'Male'") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>
    
    <div class="sub-container-box">
                        <div class="item-img">
                            <img src="uploaded_images/<?php echo $fetch_products['image'] ?>" width="220" height="215" >
                        </div>
                        <span class="p-tiltle"><?php echo $fetch_products['name'] ?></span>
                        <div class="options">
                        <form method ="POST">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                            <button type="submit" name="add_to_cart" class="button-cart-offers">
                                <span class="box-text">Add Cart</span>
                            </button>
                            <span class="normal-price">$<?php echo $fetch_products['price'] ?></span>

                            </form>
                        </div>
                    </div>

        <?php
         }
        }else{
        echo '<p class="empty">no products added yet!</p>';
        }
        ?>
                </div>
            </div>
        </div>
<!--Featured-items (end)-->

<!--About Us and partners section (start)-->
            
            <div id="partners-section" >
                <div class="our-partners">
                    <div id="titles-our-partners">
                        <span class="titles-our-partners">Our Partners</span>
                    </div>
                    <div class="partners-container-box-1">
                        <div class="partner-img">
                            <a href="https://www.toray.com/global/aboutus/">
                            <img src="images/partners/comp-2.jpeg" width="180" height="180" >
                            </a>
                        </div>
                        <div class="partner-img">
                            <a href="https://www.tjx.com/company/history#:~:text=and%20Executive%20Advisor.-,The%20TJX%20Companies%2C%20Inc.,comprised%20of%20Europe%20and%20Australia).">
                            <img src="images/partners/comp-3.png" width="180" height="140" >
                            </a>
                        </div>
                        <div class="partner-img">
                            <a href="https://www.pradagroup.com/en/brands/prada.html">
                            <img src="images/partners/comp-5.png" width="180" height="160" >
                            </a>
                        </div>
                    </div>
                    <div class="partners-container-box-1">
                        <div class="partner-img">
                            <a href="https://about.underarmour.com/">
                            <img src="images/partners/underarmour logo.png" width="170" height="170">
                            </a>
                        </div>
                        <div class="partner-img">
                            <a href="https://www.vfc.com/our-company#:~:text=VF%20Corporation%20is%20one%20of,outdoor%2C%20active%20and%20workwear%20brands.">
                            <img src="images/partners/vf-coperration.png" width="180" height="180" >
                            </a>
                        </div>
                    </div>
                </div>
            </div>
<!--About Us and partners section (end)-->

<!--footer section (start)-->
            <div id="footer-section">
                <div class="footer-main-fream">
                    <div class="info-container">
                        <div class="sub-container-info">
                            <div class="info">
                                <span class="title-info">Information</span>
                                <div class="footer-links">
                                    <span class="link-style"><a href="privacy and policy.html">Terms & Conditions</a></span><br><br>
                                    <span class="link-style"><a href="privacy and policy.html">Privacy & Policies</a></span><br><br>
                                    <span class="link-style"><a href="#">News & Events</a></span><br><br>
                                    <span class="link-style"><a href="FaQ.html">Questions & Answers</a></span><br><br>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="info-container">
                        <div class="sub-container-info">
                            <div class="info">
                                <span class="title-info">Quick Links</span>
                                <div class="footer-links">
                                    <span class="link-style"><a href="userAccount.php">My Account</a></span><br><br>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="info-container">
                        <div class="sub-container-info">
                            <div class="info">
                                <span class="title-info">Opening Hours</span>
                                <div class="footer-links">
                                    <span class="info-txt">Mon-Fri: 9.00 AM to 5.00 PM</span><br><br>
                                    <span class="info-txt">Saturday: 9.00 AM to 5.00 PM</span><br><br>
                                    <span class="info-txt">Sunday: Closed</span><br><br>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="info-container">
                        <div class="sub-container-info">
                            <div class="info">
                                <span class="title-info">Contact us</span>
                                <div class="footer-links">
                                    <span class="info-txt">+94 77-234 4328</span><br><br>
                                    <span class="info-txt">+94 76-456 4321</span><br><br>
                                    <span class="link-style"><a href="#">online@shop.lk</a></span><br><br>
                                    <span class="link-style"><a href="#">www.shop@gmail.com</a></span><br><br>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
<!--footer section (end)-->
</body>
</html>
