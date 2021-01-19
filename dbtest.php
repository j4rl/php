<!DOCTYPE html>
<html>
<head>
    <title>dbTest</title>
    <link rel="stylesheet" href="yo.css">
</head>
<?php
$host="localhost";
$user="root";
$pass="";
$dbName="dbsData";
$conn=mysqli_connect($host,$user,$pass,$dbName);
?>
<body>
<?php
if (isset($_POST['btnSubmit'])){
    $dbstatus=$_POST['status'];
    $dblinkURL=$_POST['txtURL'];
    $dblinkDesc=$_POST['txtDesc'];
    $query="INSERT INTO tblLinx (status, linkURL, linkDesc) VALUES ('$dbstatus','$dblinkURL','$dblinkDesc')";
    $result=mysqli_query($conn,$query);
}
    ?>
    <form name="frmLinx" id="frmLinx" action="dbtest.php" method="post">
        <input type="text" name="txtURL" id="txtURL" required placeholder="Ange URL inklusive http://"/>
        <input type="text" name="txtDesc" id="txtDesc" required placeholder="Beskrivning"/>
        <input type="hidden" value="5" name="status"/>
        <button type="submit" name="btnSubmit" value="Lägg till">Lägg till</button>
    </form>
    <?php
?>
</body>
</html>
