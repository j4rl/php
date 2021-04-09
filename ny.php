<!DOCTYPE html>
<?php
    //------------------------------Connect to database
    $host="localhost";
    $user="root";
    $pass="";
    $db ="dbsData";
    $conn=mysqli_connect($host, $user, $pass, $db);
    //------------------------------------------------

    //--------------------------------If FORM is sent, 
    //---take data from textbox and put it in database
    if(isset($_POST['btnSubmit'])){
        $txtText=$_POST['txtInput'];
        $sql="INSERT INTO `tbltext`(`text`) VALUES ('$txtText')";
        $result=mysqli_query($conn, $sql);
    }
    //-----------------------------------------------
    
    if(isset($_GET['del'])){
        $delid=$_GET["del"];
        $sql="DELETE FROM `tbltext` WHERE TextID=$delid";
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
        //-------------------Get all data from table, and print it
        $sql="SELECT * FROM tblText";
        $result=mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result)){
            echo $row['text']."&nbsp;<a href='ny.php?del=".$row['TextID']."'>X</a><br>";
        }
        //--------------------------------------------------------
    ?>
    </div>
</body>
</html>