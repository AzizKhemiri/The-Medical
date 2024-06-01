<?php
//@include 'config.php';
include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   //$password = md5($_POST['password']);
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'administrateur'){

         $_SESSION['administrateur_name'] = $row['name'];
         header('location:administrateur_page.php');

      }elseif($row['user_type'] == 'medecin'){

         $_SESSION['medecin_name'] = $row['name'];
         header('location:medecin_page.php');

      }elseif ($row['user_type'] == 'secretaire'){

         $_SESSION['secretaire_name'] = $row['name'];
         header('location:secretaire_page.php');
      }
     
   }else{
      $error[] = 'incorrect name or password!';
      //$error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">
   <form action="" method="post">
      <h3>
      <!-- logo -->
         <div style="display: flex; justify-content: center; align-items: center;">
            <img src="../image/logo1.jpg" alt="logo1" style="width: 100px; height: 100px;">
         </div>
      <!-- end logo -->
         Login now
      </h3>

      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <input type="reset" name="reset" value="cancel" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>
</div>

</body>
</html>