<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form name="frmConny" action="start.php" method="get">
        <input name="txtWhatevs" type="text" value="<?=$_POST['txtStuff'];?>">
        <!-- <button name="btnConny" type="submit">Skicka tebaks!</button>  -->
        <input type="submit" name="btnConny" value="Skicka tebaks!">
    </form>
    <br>
    <?php 
        echo($_POST['txtStuff']);
    ?>
</body>
</html>