<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="server">
    <img style="width: 200px;margin-left: 70px;padding-top: 20px" src="logo%20(1).png">
    <form method="post">
        <br><br><br>
        <td>Servername :
            <input id="control" type="text" name="sername">
        </td>
        <!--<td>Password :
            <input type="text" name="pass">
        </td>-->
        <td>
            <input style="margin-left: 20px" type="submit" value="Server Save">
        </td>
    </form>
    <?php
    error_reporting(0);
    $file = fopen("servername.txt",'w');
    $sonuc=fwrite($file,$_POST['sername']);
    fclose($file);
    /*
    $dosya = fopen('servername.txt','r');
    $dizi=array();
    $i=0;
    while(!feof($dosya)){
        $dizi[$i]=fgetc($dosya);
        $i++;
    }
    fclose($dosya);
    for($i=0;$i<count($dizi);$i++)
    {
        echo $dizi[$i];
    }
    $son=implode("",$dizi);
    echo $son;*/
    ?>
    <td>

        <a href="testpage.php"><input style="margin-left: 140px;margin-top: 10px" type="submit" value="Go TestPage"></a>
    </td>
</div>
</body>
</html>