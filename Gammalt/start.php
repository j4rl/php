<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
    $stuff="";
        if(isset($_GET['txtWhatevs'])){
            $stuff=$_GET['txtWhatevs'];
        };
    ?>
</head>
<body>
   <form class="frmBenny" action="endgame.php" method="post">
        <input name="txtStuff" type="text" placeholder="Skriv nåt, då för ¤#%¤" value="<?=$stuff;?>">
        <button name="btnKnapp" type="submit">Skicka</button>
   </form>

</body>
</html>