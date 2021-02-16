<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="linx.css">
</head>
<?php 
    $host ="localhost";
    $user="root";
    $pass="";
    $db ="dbsData";
    $conn=mysqli_connect($host,$user,$pass,$db) or die("Couldn't connect!");


    if(isset($_POST['btnSubmit'])){
        $URL=$_POST['txtURL'];
        $Desc=$_POST['txtDesc'];
        $sql="INSERT INTO `tbllinx`(`linkDesc`, `linkURL`) VALUES ('$Desc','$URL')";
        $result = mysqli_query($conn, $sql) or die("Couldn't exterminate!");
    }


?>

<body>
    <div class="main">
        <form action="linx.php" method="post">
            <input type="text" name="txtURL" id="txtURL" placeholder="Skriv din länk här inklusive http://">
            <input type="text" name="txtDesc" id="txtDesc" placeholder="Beskrivning">
            <button type="submit" name="btnSubmit" value="Submit">Lägg in</button>
        </form>
        <?php 
            $sql = "SELECT * FROM tbllinx LIMIT 3";
            $result = mysqli_query($conn, $sql);
            while($rad=mysqli_fetch_assoc($result)){
                echo "<br><hr><a href='".$rad['linkURL']."'>".$rad['linkDesc']."</a><br>"; 
            }
        ?>
    </div>
</body>
</html>