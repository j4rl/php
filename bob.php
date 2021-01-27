<!DOCTYPE html>
<?php require_once "bobutil.php";?>
<?php require_once "util.php";?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pagetitle?></title>
</head>
<body>
    <div class="upper">
        <div class="logo"><?=$logoName?></div>
        <div class="subtext"><?=$subText?></div>
    </div>
    <div class="main"><?=listEx("Mr")?>
    <br>
    <?php 
        $randomText="Hej";
        $krypt=new Crypt();
        $showText=$krypt->enc($randomText);
        echo $randomText."<br>";
        echo $showText."<br>";
        echo $krypt->dec($showText);
    ?>
    
    </div>

</body>
</html>