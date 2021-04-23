<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="linkapp.css">
</head>
<body>
<?php

$host="localhost";
$user="root";
$pass="";
$dbName="dbsData";
$conn=mysqli_connect($host,$user,$pass,$dbName) or die("Couldn't connect to database");

    if(isset($_POST['btnAddLink'])){
        $URL=htmlspecialchars($_POST['txtURL']);
        $desc=htmlspecialchars($_POST['txtDesc']);
        //echo "<a href='$URL'>$desc</a>";
        $sql="INSERT INTO `tbllinx`(`linkDesc`, `linkURL`) VALUES ('$desc','$URL')";
        $result=mysqli_query($conn, $sql) or die("AAAHHHH!!");
    }
?>
    <form action="linkapp.php" method="post" name="frmAdd" id="frmAdd">
        <input type="text" name="txtURL" id="txtURL" placeholder="Skriv URL här">
        <input type="text" name="txtDesc" id="txtDesc" placeholder="Beskrivning">
        <button type="submit" name="btnAddLink" id="btnAddLink" value="UwU">Lägg in</button>
    </form>
    <?php
        $sqlStr="SELECT * FROM tbllinx";
        $result=mysqli_query($conn, $sqlStr);
        while($rad=$result->fetch_assoc()){
    ?>
    <a href="<?=$rad['linkURL']?>"><?=$rad['linkDesc']?></a><br>
    <?php
        }
        
        mysqli_close($conn);
    ?>
</body>
</html>