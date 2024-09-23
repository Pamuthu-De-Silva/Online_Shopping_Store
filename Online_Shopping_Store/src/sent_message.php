<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}
?>

<?php

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `message`  WHERE id = '$delete_id'") or die('query failed');
   header('location:sent_message.php');
}

if(isset($_POST['update_msg'])){
    $update_id = $_POST['msg_id'];
    $subject = $_POST['sub_update'];
    $message = $_POST['msg_update'];
    
    mysqli_query($conn, "UPDATE `message` SET subject = '$subject' , message='$message' WHERE id = '$update_id'") or die('query failed');
    header('location:sent_message.php');
 }

?>

<!DOCTYPE html>
<html>
    <head>

        <title> 

        </title>
        <link rel="stylesheet" href="home_style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  
        <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
   <title>messages</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="admin_style.css">

    </head>
    <body>
<!--Header part (start)-->
<div class="top-part">
        <hr class="vertical-lines">
        <div class="search-bar">
            <div class="container-1">
                <input type="text" placeholder="Search Productes">
                
            </div> 
        </div>
    
        <div id="logo">
           <img src="images/logo.png" alt="logo" width="85" height="85"> 
        </div>
<!--log-in/register buttons (start)-->
        <div id="log-reg">
            <div class="loin">
                <a href="loging.php">
                <button type="button" class="button-login">
                    <span class="button__text">sign-in</span>
                    <span class="button__icon"><i class="fa fa-sign-in" aria-hidden="true"></i></span>
                </button>
                </a>
            </div>
            <div class="signup">
                <a href="register.php">
                <button type="button" class="button-signup">
                    <span class="button__text">Register</span>
                    <span class="button__icon"><i class="fa fa-sign-in" aria-hidden="true"></i></span>
                </button>
                </a>
            </div>
        </div>
<!--log-in/register buttons (end)-->
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
                            <li><a href="mens_product.php?cat=Mens">Mens</a></li>
                            <li><a href="mens_product.php?cat=Womens">Womens</a></li>
                            <li><a href="mens_product.php?cat=Kids">Kids</a></li>
                            <li><a href="mens_product.php?cat=Home & Living">Home & Living </a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="mens_product.php?cat=Kids">Gift Cards</a></li>
                
                <li><a href="#">Contact US</a>
                <div class="sub-menu-1">
                        <ul>
                            <li><a href="Sent_message.php">Sent</a></li>
                            <li><a href="contact-us.php">Contact Us</a></li>
                            
                        </ul>
                    </div>
            
               </li>
                <li><a href="contact-us.php">About Us</a></li>
            </ul>
        </div>
<!--Navigation bar (End)-->
<!--messages (start)-->

<section class="messages">

   <h1 class="title"> messages </h1>

   <div class="box-container">
   <?php
     $name=$_SESSION['user_name'];
      $select_message = mysqli_query($conn, "SELECT * FROM `message` where name='$name'") or die('query failed');
      if(mysqli_num_rows($select_message) > 0){
         while($fetch_message = mysqli_fetch_assoc($select_message)){
      
   ?>
   <div class="box">
      <p> name : <span><?php echo $fetch_message['name']; ?></span> </p>
      <p> email : <span><?php echo $fetch_message['email']; ?></span> </p>
      <form action="" method="POST" >
      <input type="hidden" name="msg_id" value="<?php echo $fetch_message['id']; ?> ">
     <p>Subject :</p> <input type="text" name="sub_update" value="<?php echo $fetch_message['subject']; ?> " style="color:purple ;font-size: 2rem; ">
      <p>Message :</p> <input type="text" name="msg_update" value="<?php echo $fetch_message['message']; ?>"style="color:purple ;font-size: 2rem; ">
      <input type="submit" name="update_msg" value="update" class="option-btn" style="width:100%">    
    
    </form>
      <a href="sent_message.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn" style="width:100% ; padding: left 100px;">delete message</a>
      
   
    </div>
   <?php
      };
   }else{
      echo '<p class="empty">you have no messages!</p>';
   }
   ?>
   </div>

</section>

<!--messages (end)-->

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