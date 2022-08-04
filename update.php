
<?php

include ("dbconf.php");

$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
?>
<div class="fotoekle">
    <?php

        $id=$_REQUEST['id'];
        $sql=" SELECT * from users where id = $id" ;
        $sonuc = $conn->prepare($sql);
        $sonuc->execute();
        $satir=$sonuc->fetch(PDO::FETCH_ASSOC);
        if($sonuc->rowCount()>0)
        {
            ?>
            <br>**********NEW RECORD EDIT MENU***************** <br><br>
            <form method="post" action="">
                Name and Surname : <input type="text" name="name" value="<?=$satir['name']?>"><br>
                Bolum : <input type="text" name="surname" value="<?=$satir['surname']?>"><br>
                Pass : <input type="text" name="age" value="<?=$satir['age']?>"><br>
                <input type="submit" value="Update">
            </form>
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
