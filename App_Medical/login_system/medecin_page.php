<?php
//@include 'config.php';
include 'config.php';

session_start();

if(!isset($_SESSION['medecin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>medecin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">
   <!-- logo -->
   <div style="display: flex; justify-content: left; align-items: left;">
        <img src="../image/logo1.jpg" alt="logo1" style="width: 300px; height: 300px;">
    </div>
    <!-- end logo -->

   <div class="content">
      <h3>Hi, <span>Medecin</span></h3><br>
      <h1>Welcome <span><?php echo $_SESSION['medecin_name'] ?></span></h1>
      <p>This is an Medecin Page</p>
      <a href="../mycrud8(patient) /index.php" class="btn">Manage Patients</a>
      <a href="../mycrud8(rdv)/index.php" class="btn">Manage RDV</a>
      <a href="../mycrud(fiche)/index.php" class="btn">Manage Fiche Patients</a><br><br>
      <a href="../mycrud(ordon)/index.php" class="btn">Manage Ordonnance Medical</a> <br><br>
      <a href="logout.php" class="btn">Logout</a>
   </div>

</div>

</body>
</html>