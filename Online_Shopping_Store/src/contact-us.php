<?php

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:loging.php');
};

if(isset($_POST['addMessage'])){
    include "./config.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['msg'];
    $query = "INSERT INTO `feedback`(userID,name,subject,email,message) values($user_id,'$name','$subject','$email','$message')";

    if($conn->query($query) == TRUE){
        echo "Message added";
    }
} 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="contact-us.css">
    <script src="https://kit.fontawesome.com/ac6cfc30a6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
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
            <img src="images/logo.png" alt="logo" width="135" height="85">
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

<!--top banner-part (start)-->
<div id="top-banners">
    <div class="top-banner-fream">
    <img src="images/banner/b.jpg" width="1400"  height=" 250" > 
    </div>
</div>
<!--top banner-part (end)-->

<!--contact section (start)-->
        <div id="contact-us-section">
            <div class="contact-us-main-fream">
                <div class="contact-us-detialcontainers">
                    <div class="detail-conter-1">
                        <div class="information-primary-contact">
                            <span class="container-1-title">Contact Us</span>
                            <div class="left-side-items">
                                <span class="sub-title-1-primary-contact">Call Now</span>
                                <span class="phone__icon"><i class="fa-sharp fa-solid fa-phone"></i></span>
                                <span class="sub-title-2-primary-contact">E-mail</span>
                                <span class="email__icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            </div>
                            <div class="right-side-items">
                                <div class="sub-container-1-detail-contacts">
                                    <span class="tp-numbers">077-123 4357</span><br><br><br>
                                    <span class="tp-numbers">077-123 4357</span><br><br><br>
                                    <span class="tp-numbers">077-123 4357</span><br>
                                </div>
                                <div class="sub-container-2-detail-contacts">
                                    <span class="emails"><a href="#">www.abcshopping.shop@gmai.com</a></span><br><br><br>
                                    <span class="emails"><a href="#">www.abcshopping.shop@gmai.com</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-container-2">
                        <div class="information-socialmedia-contact">
                            <span class="container-2-title">Connect with Social Media</span>
                            <div class="sub-container-1-upper-part">
                                <div class="upper-part-icons">
                                    <span class="whatsapp_icon"><i class="fa-brands fa-whatsapp"></i></span>
                                    <span class="viber_icon"><i class="fa-brands fa-viber"></i></span>
                                </div>
                                <span class="tp-numbers-social-media">077-123 4357</span>
                            </div>
                            <div class="sub-container-2-lower-part">
                                <span class="lower-part-title">Follow Us On</span>
                                <div class="lower-part-icons">
                                    <span class="facebook-icon"><a href="#"><i class="fa-brands fa-square-facebook"></a></i></span>
                                    <span class="twitter-icon"><a href="#"><i class="fa-brands fa-square-twitter"></a></i></span>
                                    <span class="insta-icon"><a href="#"><i class="fa-brands fa-square-instagram"></a></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-container-3">
                        <span class="container-3-title">User Review Form</span>
                        <div class="form-box-main-fream">
                          <div class="form-box">
                            <form method="POST">
                                <input type="text" class="input-field" name="name" placeholder="Your Name"><br><br><br>
                                <input type="email" class="input-field" name="email" placeholder="Your Email"><br><br><br>
                                <input type="text" class="input-field" name="subject" placeholder="Subject"><br><br>
                                <textarea type="text" class="input-field-msg" name="msg" placeholder="Your Message"></textarea>
                                <button type="submit" name="addMessage" class="button-submit" style="display:inherit">
                                    <span class="button__text_submit">Submit</span>
                                </button>
                            </form>
                            
                          </div>
                        </div>
                        <div class="right-side-banner">
                            <div class="banner-main-fream">
                                <div class="banner-image">
                                    <img src="" alt="" srcset="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!--contact section (end)-->


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