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
    if(isset($_POST['txtField'])){
        echo "<h1>".$_POST['txtField']."</h1>";
        if(isset($_GET['stuff'])) echo "<h2>".$_GET['stuff']."</h2>";
    } 
?>
    <form name="frmForm" id="frmForm" action="form.php?stuff=Arne" method="POST">
        <input type="text" name="txtField" id="txtField" placeholder="Skriv vad som helst">
        <button type="submit" name="btnSubmit" id="btnSubmit">Tryck</button>
    </form>
</body>
</html>