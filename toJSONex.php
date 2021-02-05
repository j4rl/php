<?php


// Connect to database
$host="localhost";
$user="root";
$pass="";
$db="dbsData";
$conn=mysqli_connect($host,$user,$pass,$db) or die("Couldn't connect!");

/**data2JSON
 * Returns data from database formatted as JSON with the object name data
 * @param $connOBJ {object} the database connection object.
 * @return $txtSQL {string} String with SQL-formatted question.
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

?>