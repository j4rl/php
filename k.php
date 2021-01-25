<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="k.css">
</head>
<body>
    <form action="k.php" method="post" name="frmBil" id="frmBil">
        <input type="text" name="txtVendor" placeholder="Bilmärke" required>
        <input type="text" name="txtModel" placeholder="Bilmodell" required>
        <input type="text" name="txtHP" placeholder="Antal hästkrafter" required>
        <input type="color" name="clrColor">
        <input type="submit" name="btnSubmit" value="Registrera">
    </form>
    <?php
        if(isset($_POST['btnSubmit'])){
            $vendor=$_POST['txtVendor'];
            $model=$_POST['txtModel'];
            $hrsprs=$_POST['txtHP'];
            $color=$_POST['clrColor'];
            ?>
                <div class="showCar">
                    <h1><?=$vendor?></h1>
                    <h2><?=$model?></h2>
                    <div class="hrsprs">Hästkrafter: <?=$hrsprs?></div>
                    <div class="color" style="background-color:<?=$color?>;">Färg</div>
                </div>

            <?php
        }
    ?>
    <?php   //for use most of the times ?>
    <?  //for use when to print a single var ?>
</body>
</html>