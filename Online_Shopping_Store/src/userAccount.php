<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
    <head>

        <title>User Account</title>
        <!--<link rel="stylesheet" href="userAccount.css"> -->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="home_styles.css">

        <style>
            .wellcome {
                font-size: 5rem;
                color: var(--black);
                text-transform: uppercase;
                margin-top: 45px;
                margin-bottom: 30px;
            }
            .email {
                font-size: 2rem;
                color: var(--black);
                text-transform: uppercase;
                margin-left: 100px;
                margin-bottom: 50px;
            }
            .lgout {
                margin-top: 60px;
                margin-left: 50px;
                display: inline-block;
                margin-top: 1rem;
                padding: 1rem 3rem;
                cursor: pointer;
                color: var(--white);
                font-size: 1.8rem;
                border-radius: .5rem;
                text-transform: capitalize;
            }
            .uname {
                font-size: 2rem;
                color: var(--black);
                text-transform: uppercase;
                margin-bottom: 20px;
                margin-left: 100px;
            }
            .account-box {
                display: flex;
                align-items: center;
                min-height: 10vh;
                background-color: var(--light-bg);
                padding: 2rem;
            }
            .user-image {
                margin-left: 300px;
                
            }
            .user-image img {
                border-radius: 50%;
                
                
            }
            .user-details {
                flex-grow: 1;
            }
            .changepassword {
                margin-top: 60px;
                margin-left: -25px;
                display: inline-block;
                margin-top: 1rem;
                padding: 1rem 3rem;
                cursor: pointer;
                color: var(--white);
                font-size: 1.8rem;
                border-radius: .5rem;
                text-transform: capitalize;
            }
        </style>
    </head>
    <body>
        <!--Header part (start)-->
        <div class="top-part">
            <hr class="vertical-lines">
            <div class="search-bar">
                <div class="container-1">
                    <input type="text" placeholder="Search Products">
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
                <button type="button" class="button-profile">
                    <span class="profile__icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                </button>
            </div>
        </div>
        <!--Header part (end)-->

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
                <img src="images/banner/b.jpg" width="1400" height="250">
            </div>
        </div>
        <!--top banner-part (end)-->

        <!--User account section (start)-->
        <div class="wellcome">
            <center>
                <p><span>Wellcome <?php echo $_SESSION['user_name']; ?> !</span></p>
            </center>
        </div>       

        <div class="account-box" id="account-box">
            <div class="user-image">
                <img src="images/user.avif" alt="User Image" width="150" height="150">
            </div>
            <div class="user-details">
                <div class="uname"> 
                    <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
                </div> 
                <div class="email">      
                    <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
                </div>

                <div class="lgout"> 
                    <a href="logout.php" class="delete-btn">logout</a>
                </div> 

                <div class="changepassword">
                    <a href="change_password.php" class="delete-btn" style="cursor : pointer;">
                        Change Password
                    </a>
                </div>               
            </div>
        </div>
        <!--User account section (end)-->

        <!--footer section (start)-->
        <div id="footer-section">
            <div class="footer-main-fream">
                <div class="info-container">
                    <div class="sub-container-info">
                        <div class="info">
                            <span class="title-info">Information</span>
                            <div class="footer-links">
                                <span class="link-style"><a href="#">Terms & Conditions</a></span><br><br>
                                <span class="link-style"><a href="#">Privacy & Policies</a></span><br><br>
                                <span class="link-style"><a href="#">News & Events</a></span><br><br>
                                <span class="link-style"><a href="#">Questions & Answers</a></span><br><br>
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
                                <span class="link-style"><a href="#">My Orders</a></span><br><br>
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
