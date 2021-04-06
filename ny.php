<!DOCTYPE html>
<?php
    $host="localhost";
    $user="root";
    $pass="";
    $db ="dbsData";
    $conn=mysqli_connect($host, $user, $pass, $db);

    if(isset($_POST['btnSubmit'])){
        $txtText=$_POST['txtInput'];
        $sql="INSERT INTO `tbltext`(`text`) VALUES ('$txtText')";
        $result=mysqli_query($conn, $sql);
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP-magic</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" action="ny.php">
        <input type="text" name="txtInput" id="txtInput" placeholder="Skriv vad du vill!" required autocomplete="off">
        <button type="submit" name="btnSubmit" value=".">Tryck!</button>
    </form>
    <div class="ruta">
    <?php 
        $sql="SELECT * FROM tblText";
        $result=mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result)){
            echo $row['text']."<br>";
        }
    ?>
    </div>
</body>
</html>