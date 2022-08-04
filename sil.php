<?php
include("dbconf.php");
$ID = $_GET['id'];
$delete = ("delete from users where id = '$ID'");
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // use exec() because no results are returned
    $conn->exec($delete);
    //echo "New record created successfully";
    header("Location: index.php");
} catch(PDOException $e) {
    //echo "<br>" . $e->getMessage();
}
$conn=null;