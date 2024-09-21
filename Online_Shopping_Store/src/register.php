<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type, contactNo) VALUES('$name', '$email', '$cpass', '$user_type','$contactno')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:loging.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="register-style.css">
   <link rel="stylesheet" href="passwordvalid.css">

   <script src="passwordvalid.js"></script>
    
   
</head>
<body>



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
      <h3>register now</h3>
      <input type="text" name="name" placeholder="enter your name" required class="box">
      <input type="email" name="email" placeholder="enter your email" required class="box">
      <input type="password" name="password" id="password" placeholder="enter your password" required class="box" onInput="check()" onclick="showPasswordRules()">
      <br>

     <div id="password-rules" class="password-rules">
     <div id="set"style="text-align: left;" >
        <div id="count"style="text-align: left;">Length : 0</div>
        
         </div>
           <div id="check0"style="text-align: left;">
                <i class="far fa-check-circle"></i>  <span> Length more than 5.</span>
           </div>
           <div id="check1"style="text-align: left;">
                <i class="far fa-check-circle"></i>  <span> Length less than 10.</span>
           </div>
           <div id="check2"style="text-align: left;">
                <i class="far fa-check-circle"></i>  <span> Contains numerical character.</span>
           </div>
           <div id="check3"style="text-align: left;">
                <i class="far fa-check-circle"></i>   <span>Contains special character.</span>
           </div>
           <div id="check4"style="text-align: left;">
                <i class="far fa-check-circle"></i>  <span>Shouldn't contain spaces.</span>
           </div> 
      </div>
      
        
         
           
      
      <input type="password" name="cpassword" placeholder="confirm your password" required class="box">
    
      <input type="number" name="contactno" placeholder="contact no " required class="box">
      <select name="user_type" class="box">
         <option value="buyer">buyer</option>
         <option value="seller">seller</option>
      </select>

      <input type="submit" name="submit" value="register now" class="btn">
      <p>already have an account? <a href="loging.php">login now</a></p>
   </form>

</div>

</body>
</html>