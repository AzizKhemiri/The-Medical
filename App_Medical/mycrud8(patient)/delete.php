<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "app_medical";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM patient WHERE id=$id";
    $conn->query($sql);
}

header("location: ../mycrud8(patient) /index.php");
exit;


?>