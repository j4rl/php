<?php
/**
 * Database
 */
class Database
{

    /**
     * Constructor
     * connects to a database with the given parameters otherwise default values are set.
     * @param string $db_name
     * @param string $host (default value localhost)
     * @param string $username (default value root)
     * @param string $password (default value blank)
     */
    function __construct($db_name, $host="localhost", $username="root", $password="") {
        $this->mysqli = mysqli_connect($host, $username, $password, $db_name);
    }
    /**
     * fix
     * Takes a string and fixes malicous stuff in it, for use with SQL questions
     * @param string $strFix The string to be fixed
     * @return string The fixed string
     */
    public function fix($strFix){
        return $this->mysqli->real_escape_string($strFix);
    }
    /**
     * runQuery
     * Runs a SQL-question to the database and returns the resulting object or value
     * @param string $strQuery
     * @return object or integer
     */
    public function runQuery($strQuery){
        $strSQL=$this->fix($strQuery);
        return $this->mysqli->query($strSQL);
    }
    /**
     * delRow
     * Deletes a row from the database
     * @param integer $ID
     * @param string $table
     * @return boolean
     */
    public function delRow($ID,$table){
        $strTable=strtolower(substr($table,3,strlen($table)));
        $tmpSTrID=$strTable."ID";
        $query=$this->fix("DELETE FROM $table WHERE $tmpSTrID=$ID");
        return $this->mysqli->query($query);
    }

    /**
    * data2JSON
    * Returns data from database formatted as JSON with the object name data
    * Requires a specific table layout to work at all. But you can easily modify this to your needs
    * @param $connOBJ {object} the database connection object.
    * @param $txtSQL {string} String with SQL-formatted question.
    * @return JSON formatted string
    */
    public function data2JSON($txtSQL){
        $txtQuery=$this->fix($txtSQL);
        $result = $this->mysqli->query($txtQuery);
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

    /**
     * getAll
     * Gets all records from a specific table
     * @param string $table
     * @return object or integer
     */
    public function getAll($table)
    {
        $query = $this->fix("SELECT * FROM $table");
        return $this->mysqli->query($query)->fetch_all();
    }
    /**
     * close
     * Closes the database connection
     * @return boolean
     */
    public function close(){
        return $this->mysqli->close();
    }

}

/**
 * data2JSON
 * Returns data from database formatted as JSON with the object name data
 * @param $connOBJ {object} the database connection object.
 * @param $txtSQL {string} String with SQL-formatted question.
 * @return JSON formatted string
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
?>