<?php
// ------------------------------------------------Connect to database
$host="localhost";
$user="root";
$pass="";
$db="dbsData";
$conn=mysqli_connect($host,$user,$pass,$db) or die("Couldn't connect!");
//--------------------------------------------------------------------

 /**
  * data2JSON
  * Returns data from database formatted as JSON with the object name data
  * @param object $connOBJ the database connection object.
  * @param string $txtSQL String with SQL-formatted question.
  * @return string JSON formatted string
  */
  function data2JSON($connOBJ, $txtSQL){
     $result = mysqli_query($connOBJ, $txtSQL) or die(mysqli_error($conn));
     $str= '{"data":[';
         while($rad=$result->fetch_assoc()){
             $userID=$rad['userID'];
             $username=$rad['username'];
             $password=$rad['password'];
             $userlevel=$rad['userlevel'];
             $str=$str.'{"userID":'.$userID.',"username":"'.$username.'","password":"'.$password.'","userlevel":'.$userlevel.'},';
         };   
         $str=rtrim($str, ",");
         $str=$str."]}";
         return $str;
 }
echo data2JSON($conn, "SELECT * FROM tbluser");

/*
//--------------------------------Plain QD solution with echo
    $sql="SELECT * FROM tbluser";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    echo '{"data":[';
        while($rad=$result->fetch_assoc()){
            $userID=$rad['userID'];
            $username=$rad['username'];
            $password=$rad['password'];
            $userlevel=$rad['userlevel'];
            echo '{"userID":'.$userID.',"username":"'.$username.'","password":"'.$password.'","userlevel":'.$userlevel.'},';
       };   
        echo "]}";
//-----------------------------------------------------------
*/
?>