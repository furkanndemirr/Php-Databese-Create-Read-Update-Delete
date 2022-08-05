<html>
<head>
    <title>COMPRO OPENSHIFT</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="img">
<img style="width: 200px" src="logo%20(1).png">
</div>
<h1 class="h1">Backup Test Page</h1>

<?php
error_reporting(0);
include("dbconf.php");
?>

<?php
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    //print "Bağlantı Başarılı!";
}
catch (PDOException $e) {?>
<button><a href="index.php" style="text-decoration: none;color: black">Server Login</a></button>
    <?php
print "<br>Connection could not be established. Error : " . $e->getMessage() . "<br/>";
die();}?>

<?php

?>
<div class="div">

    <form action="?task=insert" method="post"">
        <br><br><br>
        <td>Name :
            <input type="text" name="uname">
        </td>
        <br><br>
        <td>Surname :
            <input type="text" name="sname">
        </td>
        <br><br>
        <td>Age :
            <input type="text" name="age">
        </td>
        <br><br>
        <td>
            <input type="submit" value="Submit" style="margin-right: 15px">
            <button><a href="index.php" style="text-decoration: none;color: black">Server Logout</a>
                <button style="margin-left: 20px;margin-top: 10px"><a href="tabledatadelete.php" style="text-decoration: none;color: black">Table Data Delete</a>
        </td>
    </form>
</div>
<?php
/*
?>
}
catch (PDOException $e)
{
    die($e->getMessage());
}*/
?>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST" and  $_REQUEST['task']=="insert")
{
    $ID = $_REQUEST['id'];
    $uname=$_REQUEST['uname'];
    $sname=$_REQUEST['sname'];
    $age=$_REQUEST['age'];

    $sql = "INSERT INTO users (name ,surname, age)
    VALUES ('$uname','$sname','$age')";
    echo $sql;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // use exec() because no results are returned
        $conn->exec($sql);
        //echo "New record created successfully";
    } catch(PDOException $e) {
        //echo "<br>" . $e->getMessage();
    }
    include("dbconf.php");
    echo $servername , "as";
    $conn=null;

    header('location:testpage.php');
}

?>

    <table>
        <?php
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        echo "<br>";
        $sql=" SELECT * from users" ;
        foreach ($conn->query($sql) as $satir) {
            ?>
            <tr>
                <th><?=$satir['name']?></th>
                <th><?=$satir['surname']?></th>
                <th><?=$satir['age']?></th>
                <th><a id="deletebutton" href="sil.php?id=<?php echo $satir['id'];?>">DELETE</a></th>
                <th><a id="deletebutton" href="update.php?id=<?php echo $satir['id'];?>">UPDATE</a></th>
            </tr>

            <?php
        }
        ?>
    </table>
<?php

?>
</body>
</html>