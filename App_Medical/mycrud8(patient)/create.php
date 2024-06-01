<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "app_medical";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

$cin = "";
$name = "";
$date_birth = "";
$phone = "";
$address = "";
$region = "";
$cnss = "";

$errorMessage = "";
$successMessage = "";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cin = $_POST["cin"];
    $name = $_POST["name"];
    $date_birth = $_POST["date_birth"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $region = $_POST["region"];
    $cnss = $_POST["cnss"];

    do{
        if(empty($cin) || empty($name) || empty($date_birth) || empty($phone) || empty($address) || empty($region) || empty($cnss)){
            $errorMessage = 'All the fields are required';
            break;
        }

        // add new patient to database
        $sql = "INSERT INTO patient (cin, name, date_birth, phone, address, region, cnss) VALUES ('$cin', '$name', '$date_birth', '$phone', '$address', '$region', '$cnss')";
        $result = $conn->query($sql);

        if(!$result){
            $errorMessage="Invalid query:" . $conn->error;
            break;
        }

        $cin = "";
        $name = "";
        $date_birth = "";
        $phone = "";
        $region = "";
        $cnss = "";

        $successMessage = "Patient added correctly";
        // look here of the path
        header("location: ../mycrud8(patient) /index.php");
        exit;

    }while(false);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient</title>
    <!-- css bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- js bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; margin:50px ">New Patient</h2>

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

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">CIN</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="cin" value="<?php echo $cin; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Date Birth</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="date_birth" value="<?php echo $date_birth; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Region</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="region" value="<?php echo $region; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">CNSS</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="cnss" value="<?php echo $cnss; ?>">
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
                    <a class="btn btn-outline-primary" href="../mycrud8(patient) /index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>