<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "app_medical";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

$id = "";
$name = "";
$email = "";
$password = "";
$user_type = "";

$errorMessage = "";
$sucsessMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    // get method show the data of the client
    if(!isset($_GET["id"])){
        header("location: ../mycrud(admin)/index.php");
        exit;
    }

    $id = $_GET["id"];

    // read the row of the selected client from database table 
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row){
        header("location: ../mycrud(admin)/index.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $password = $row["password"];
    $user_type = $row["user_type"];

} else {
    // post method : update the data of the client

    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user_type = $_POST["user_type"];

    do{
        if(empty($id) || empty($name) || empty($email) || empty($password) || empty($user_type)){
            $errorMessage = "All the fileds are required ";
            break;
        }

        $sql = "UPDATE users SET name='$name', email='$email', password='$password', user_type='$user_type' WHERE id=$id ";
        
        $result = $conn->query($sql);

        if(!$result){
            $errorMessage = "Invalid query:" . $conn->error;
            break;
        }

        $successMessage = "Pos update correctly";

        header("location: ../mycrud(admin)/index.php");
        exit;

    }while(false);
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

    <div class="container">
        <h2 style="text-align: center; margin:50px ">New Pos</h2>

        <?php
        // check if the error msg is not empty
        if (!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismissible='alert' aria-label='Close'></button>
            </div>
            ";
        }

        ?>

        <form method="post">

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">User Type</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="user_type" value="<?php echo $user_type; ?>">
                </div>
            </div>

            <?php

            // check if the error msg is not empty
            if (!empty($errorMessage)){
                echo "
                <div class='row mb-3'>  
                    <div class='offset-sm-3 col-sm-6'>                  
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$sucsessMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismissible='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="../mycrud(admin)/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>