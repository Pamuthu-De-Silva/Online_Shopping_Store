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

<header class="header">

   <div class="flex">

      <a href="seller_page.php" class="logo">Seller<span>Panel</span></a>

      <nav class="navbar">
         <a href="seller_page.php">Store </a>
         <a href="seller_product.php">Add products</a>
         
    
         
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user" onClick="showhide()"></div>
      </div>

      <div class="account-box" id="account-box">
         <p>username : <span><?php echo $_SESSION['seller_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['seller_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <div>new <a href="loging.php">login</a> | <a href="register.php">register</a></div>
      </div>

   </div>

</header>

<script>
    function showhide(){
        var status = document.getElementById("account-box").style.display;
        if(status == 'block'){
            document.getElementById("account-box").style.display = 'none';
        }else{
            document.getElementById("account-box").style.display = 'block';
        }
    }
</script>