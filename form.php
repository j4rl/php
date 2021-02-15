<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="yo.css">
</head>
<body>
<?php 
    if(isset($_POST['btnSubmit'])){
        echo "<h1>".$_POST['txtField']."</h1>";
        if(isset($_GET['stuff'])) echo "<h2>".$_GET['stuff']."</h2>";
    } 
?>
    <form name="frmForm" id="frmForm" action="form.php?stuff=Kim%20Hultgren" method="POST">
        <input type="text" name="txtField" id="txtField" placeholder="Personnummer 12 siffror" pattern="(19|20)[0-9]{6}-[0-9]{4}" title="yyyymmdd-nnnn">
        <button type="submit" name="btnSubmit" id="btnSubmit" value="-">Tryck</button>
    </form>
</body>
</html>
