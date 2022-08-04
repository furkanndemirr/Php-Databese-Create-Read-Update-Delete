<html>
<head>
    <title>COMPRO OPENSHIFT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<img style="width: 200px;margin-left: 570px" src="logo%20(1).png">
<h1 class="h1">Backup Test Page</h1>
<div class="fotoekle">

    <form action="?task=insert" method="post" style="width: 15%; margin: auto;">
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
            <input style="margin-left: 50px" type="submit" value="Submit">
        </td>
    </form>
</div>

<?php
include("dbconf.php");
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
    $conn=null;
    header("location: index.php");
}

?>

    <table>
        <?php
        echo "Hello";
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