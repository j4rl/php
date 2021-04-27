<?php
//Connecting people
function nokia(){
    $host="localhost";
    $user="root";
    $pass="";
    $db="dbsdata";
    $conntmp=mysqli_connect($host,$user,$pass,$db);   
    return $conntmp; 
}

function checklogin($usr, $pass, $connobj){
    $strQuery="SELECT * FROM tblUser WHERE username='$usr' AND password='$pass';";  
    if($result=mysqli_query($connobj,$strQuery)){ //Was it possible to question the database for this?
        if(!mysqli_num_rows($result)==1){   //It was, now check if it didn't was just one row
           //echo "Inte inloggad!";  //Batty boy!
           //Now reset all session variables:
           $_SESSION['userid']="";
           $_SESSION['level']="";
           $_SESSION['name']="";   
           $mess="Inte inloggad";                
        }else{  //You made it! you are authorized!
            $raden=mysqli_fetch_assoc($result);   //Get the row with data
            //Now set all our session variables. You could have secret names for these session variables 
            $_SESSION['userid']=$raden['userID'];
            $_SESSION['level']=$raden['userlevel'];
            $_SESSION['name']=$raden['username'];
            $mess="Inloggad";
        }
    }else{
        $mess="Okänt fel";
    } 
    return $mess;
}

function isLevel($lvl){
    if(isset($_SESSION['level'])){
        if(intval($_SESSION['level'])>=$lvl){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}



?>