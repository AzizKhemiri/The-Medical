<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "app_medical";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM RDV WHERE id=$id";
    $conn->query($sql);
}

header("location: /app_medical/mycrud8(rdv)/index.php");
exit;


?>