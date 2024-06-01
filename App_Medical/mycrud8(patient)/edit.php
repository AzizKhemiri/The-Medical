<?php

// ???? il y un probleme que quand je edit les info et clic submit les info ne sont pas edit


$servername = "localhost";
$username = "root";
$password = "";
$database = "app_medical";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

$id = "";
$cin = "";
$name = "";
$date_birth = "";
$phone = "";
$address = "";
$region = "";
$cnss = "";

$errorMessage = "";
$sucsessMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    // get method show the data of the patient
    if(!isset($_GET["id"])){
        header("location: ../mycrud8(patient) /index.php");
        exit;
    }

    $id = $_GET["id"];

    // read the row of the selected patient from database table 
    $sql = "SELECT * FROM patient WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row){
        header("location: ../mycrud8(patient) /index.php");
        exit;
    }

    $cin = $row["cin"];
    $name = $row["name"];
    $date_birth = $row["date_birth"];
    $phone = $row["phone"];
    $address = $row["address"];
    $region = $row["region"];
    $cnss = $row["cnss"];

} else {
    // post method : update the data of the patient

    $id = $_POST["id"];
    $cin = $_POST["cin"];
    $name = $_POST["name"];
    $date_birth = $_POST["date_birth"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $region = $_POST["region"];
    $cnss = $_POST["cnss"];

    do{
        if(empty($cin) || empty($name) || empty($date_birth) || empty($phone) || empty($address) || empty($region) || empty($cnss)){
            $errorMessage = "All the fileds are required ";
            break;
        }

        $sql = "UPDATE patient SET cin='$cin', name='$name', date_birth='$date_birth', phone='$phone', address='$address', region='$region', cnss='$cnss' WHERE id=$id ";
        
        $result = $conn->query($sql);

        if(!$result){
            $errorMessage = "Invalid query:" . $conn->error;
            break;
        }

        $successMessage = "Patient update correctly";

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
        <h2>New Patient</h2>

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