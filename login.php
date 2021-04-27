<?php session_start(); //Gotta have dis to start session, othervise we can't make own session variables ?>
<!DOCTYPE html>
    <?php
        $host="localhost";
        $user="root";
        $pass="";
        $db="dbsdata";
        $conn=mysqli_connect($host,$user,$pass,$db) or die("Couldn't connect!");
        if(isset($_POST['btnLogin'])){
            $username=$_POST['username']; //Gotta make variable for the SQL
            $password=$_POST['password'];
            $strQuery="SELECT * FROM tblUser WHERE username='$username' AND password='$password';";  
            if($result=mysqli_query($conn,$strQuery)){ //Was it possible to question the database for this?
                if(!mysqli_num_rows($result)==1){   //It was, now check if it didn't was just one row
                   //echo "Inte inloggad!";  //Batty boy!
                   //Now reset all session variables:
                   $_SESSION['userid']="";
                   $_SESSION['level']="";
                   $_SESSION['name']="";                   
                }else{  //You made it! you are authorized!
                    $raden=mysqli_fetch_assoc($result);   //Get the row with data
                    //echo "Välkommen ".strtoupper($raden['username']); //use this to print name
                    //Now set all our session variables. You could have secret names for these session variables 
                    $_SESSION['userid']=$raden['userID'];
                    $_SESSION['level']=$raden['userlevel'];
                    $_SESSION['name']=$raden['username'];
                    //$skrivutvariabeln=$_SESSION['name'];
                    //echo "<br><div class='showname'>Inloggad som ".strtoupper($_SESSION['name'])."</div><br>";
                    header("Location:ny.php");
                    if(intval($_SESSION['level'])>30){
                        //echo "Ohhh, admin!";
                    }
                }
                ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
 </head>
<body>
    <div class="content">
    <!-- If someone tries to log in -->
<?php
            }else{
                echo "Oh, noo!<br>Anyway...";
            }   
        }else{  //else Show form   ?>
        <div class="formbox">
            <form action="login.php" method="post" id="frmLogin">
                <input type="text" name="username" id="username" placeholder="Username" required autocomplete="off">
                <input type="password" name="password" id="password" required autocomplete="off">
                <input type="submit" name="btnLogin" id="btnLogin" value="Login">
            </form>
        </div>
        <?php }   //Who dis? New phone ?>
    </div>   
</body>
</html>