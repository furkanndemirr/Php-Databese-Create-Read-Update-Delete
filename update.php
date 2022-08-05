<link rel="stylesheet" href="style.css">
<?php
error_reporting(0);
include ("dbconf.php");

$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
?>
<div>
    <?php

        $id=$_REQUEST['id'];
        $sql=" SELECT * from users where id = $id" ;
        $sonuc = $conn->prepare($sql);
        $sonuc->execute();
        $satir=$sonuc->fetch(PDO::FETCH_ASSOC);
        if($sonuc->rowCount()>0)
        {
            ?>
            <br>
            <p style="text-align: center">
                **************NEW RECORD EDIT MENU***************** </p>
            <br>
            <div class="div2">
                <form method="post">
                    Name and Surname : <br><input type="text" name="name" value="<?=$satir['name']?>"><br>
                    Bolum : <br><input type="text" name="surname" value="<?=$satir['surname']?>"><br>
                    Pass : <br><input type="text" name="age" value="<?=$satir['age']?>"><br>
                    <input type="submit" value="Update" style="margin-top: 10px;margin-left: 50px">
                </form>
            </div>

            <?php


        }//kayıt boş değilse
    //GUNCELLEME
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $surname = $_REQUEST['surname'];
        $age= $_REQUEST['age'];
        $sql = "UPDATE users SET name='$name',surname='$surname', age='$age' where id = '$id' ";
        $conn->exec($sql);
        header("Location: index.php");
    }


    ?>
</div>
