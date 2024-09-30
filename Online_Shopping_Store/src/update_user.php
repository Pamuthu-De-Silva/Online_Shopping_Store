<?php
include 'config.php';
session_start();

if(!isset($_SESSION['user_id'])){
   header('location:login.php');
}

$user_id = $_SESSION['user_id']; // Get the logged-in user's ID

// Fetch user details to pre-fill the form
$select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE userId = '$user_id'") or die('query failed');
if(mysqli_num_rows($select_user) > 0){
   $row = mysqli_fetch_assoc($select_user);
} else {
   $message[] = 'User not found!';
}

if(isset($_POST['update'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $contactNo = mysqli_real_escape_string($conn, $_POST['contactNo']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password'])); // Hash the password using MD5

   $update_query = mysqli_query($conn, "UPDATE `users` SET name = '$name', contactNo = '$contactNo', password = '$password' WHERE userId = '$user_id'") or die('query failed');

   if($update_query){
      $message[] = 'User details updated successfully!';
   }else{
      $message[] = 'Failed to update user details!';
   }
}

?>

<!DOCTYPE html>
<html>
    <head>

        <title> 

        </title>
        <!--<link rel="stylesheet" href="userAccount.css"> -->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="home_styles.css">
        <style>

      body {
         background-color: #f5f5f5;
         display: flex;
         flex-direction: column;
         justify-content: space-between;
         min-height: 100vh;
      }


      .form-container {
         background-color: #fff;
         border-radius: 10px;
         box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
         padding: 40px;
         max-width: 400px;
         width: 100%;
         margin: 40px auto;
      }

      h3 {
         text-align: center;
         color: #333;
         margin-bottom: 30px;
         font-size: 24px;
      }

      .box {
   width: 100%; /* Ensure it takes up full width of its container */
   max-width: 100%; /* Prevents the input fields from exceeding the container width */
   padding: 12px;
   margin: 10px 0;
   border: 1px solid #ccc;
   border-radius: 5px;
   font-size: 16px;
   color: #333;
   box-sizing: border-box; /* Ensures padding is included within the width */
}

      .box:focus {
         border-color: #ffcc00;
         outline: none;
      }

      .btn {
         width: 100%;
         padding: 12px;
         border: none;
         background-color: #ffcc00;
         color: #fff;
         font-size: 18px;
         border-radius: 5px;
         cursor: pointer;
         transition: background-color 0.3s ease;
      }

      .btn:hover {
         background-color: #e6b800;
      }

      .message {
         background-color: #ffcc00;
         color: #333;
         padding: 10px;
         margin-bottom: 15px;
         border-radius: 5px;
         text-align: center;
         position: relative;
      }

      .message i {
         position: absolute;
         top: 50%;
         right: 10px;
         transform: translateY(-50%);
         cursor: pointer;
      }

.wellcome {
    font-size: 5rem;
   color:var(--black);
   text-transform: uppercase;
   margin-top : 45px;
   margin-bottom : 30px;

}
.email{
    font-size: 2rem;
   color:var(--black);
   text-transform: uppercase;
   margin-left : 550px;
   margin-bottom : 50px;
}
.lgout{
    margin-top : 60px;
 margin-left : 500px;
 display: inline-block;
   margin-top: 1rem;
   padding:1rem 3rem;
   cursor: pointer;
   color:var(--white);
   font-size: 1.8rem;
   border-radius: .5rem;
   text-transform: capitalize;

}
.uname{
    font-size: 2rem;
   color:var(--black);
   text-transform: uppercase;
   margin-bottom : 20px;
   margin-left : 550px;
}
.account-box{

    min-height: 10vh;
   background-color: var(--light-bg);
   
   padding:2rem;

}
.changepassword{

    margin-top : 60px;
 margin-left : 60px;
 display: inline-block;
   margin-top: 1rem;
   padding:1rem 3rem;
   cursor: pointer;
   color:var(--white);
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
            <button type="button" class="button-profile">
                <span class="profile__icon"><i class="fa fa-user" aria-hidden="true"></i></i></span>
            </button>
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

<div class="form-container">

   <form action="" method="post">
      <h3>Update your details</h3>
      <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Enter your new name" required class="box">
      <input type="text" name="contactNo" value="<?php echo $row['contactNo']; ?>" placeholder="Enter your new contact number" required class="box">
      <input type="password" name="password" placeholder="Enter your new password" required class="box">
      <input type="submit" name="update" value="Update Now" class="btn">
   </form>

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
