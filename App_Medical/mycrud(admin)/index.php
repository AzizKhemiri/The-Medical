<?php

// pour lire le nom de admin en : welcome
@include '../login_system/config.php';

session_start();

if(!isset($_SESSION['administrateur_name'])){
   header('location:login_form.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pos</title>
    <!-- css bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- js bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <!--
    <div style="display: flex; justify-content: center; align-items: center;">
        <img src="../image/logo1.jpg" alt="logo1" style="width: 200px; height: 200px;">
    </div>
-->

    <div class="text-center">
        <h1 class="btn btn-success" style="margin: 10px; display: inline-block; margin:20px;">Welcome <span> <?php echo $_SESSION['administrateur_name'] ?>
        </span> This is a Admin Page:</h1>
    </div>
    

    <div class="container my-5">

        <h2 style="text-align: center;">Liste of Pos</h2><br>

        <a class="btn btn-info" href="../mycrud(admin)/create.php" role="button">New Pos</a>
        <a class="btn btn-info" href="../login_system/administrateur_page.php" role="button">Home</a>
        <a class="btn btn-dark" href="../login_system/logout.php" role="button">Logout</a>


        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>User Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "app_medical";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                //echo "Connected successfully";

                // read all row from database table
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if(!$result){
                    die("Invalid query:" . $conn->error);
                }

                // read data of each row
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[password]</td>
                        <td>$row[user_type]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='../mycrud(admin)/edit.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='../mycrud(admin)/delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?> 
                
            </tbody>

        </table>
    </div>
    
</body>
</html>