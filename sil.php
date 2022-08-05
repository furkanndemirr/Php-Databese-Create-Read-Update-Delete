<?php
include("dbconf.php");

$dosya = fopen('servername.txt', 'r');
$dizi = array();
$i = 0;
while (!feof($dosya)) {
    $dizi[$i] = fgetc($dosya);
    $i++;
}
fclose($dosya);

$son = implode("", $dizi);


$ID = $_GET['id'];
$delete = ("delete from users where id = '$ID'");
try {
    $conn = new PDO("mysql:host=$son;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // use exec() because no results are returned
    $conn->exec($delete);
    //echo "New record created successfully";
    header("Location: testpage.php");
} catch(PDOException $e) {
    //echo "<br>" . $e->getMessage();
}
$conn=null;