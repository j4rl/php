<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ex.css">
</head>
<body>
    <div class="content">
        <div class="result">
        <?php 
            if(isset($_POST['btnSubmit'])){
                $result=(double)$_POST['tal1']+(double)$_POST['tal2'];
                echo "Result: $result";                
            }
        ?>
        </div>
        <form action="ex.php" method="post" name="frmForm" id="frmForm">
            <input type="text" name="tal1">
            &nbsp;+&nbsp;<input type="text" name="tal2">
            <button type="submit" value="submit" name="btnSubmit" id="btnSubmit">Add</button>
        </form>
    </div>
</body>
</html>

