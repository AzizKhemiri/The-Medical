<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "app_medical";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM fiche WHERE id=$id";
    $conn->query($sql);
}

header("location: ../mycrud(fiche)/index.php");
exit;


?>