<!DOCTYPE html>
<?php
    function showText(){
        if(isset($_POST['btnSubmit'])){ //Har jag tryckt på knappen?
            return $_POST['txtInput']." ".$_POST['txtHidden'];
        }else{
            return "";
        }    
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP-magic</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?=showText();?>
    <form method="post" action="ny.php">
        <input type="text" name="txtInput" id="txtInput" placeholder="Skriv vad du vill!" required autocomplete="off">
        <input type="hidden" name="txtHidden" value="<?=showText();?>">
        <button type="submit" name="btnSubmit" value=".">Tryck!</button>
    </form>
</body>
</html>