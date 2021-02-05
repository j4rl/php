<?php

/**
 * Crypt
 */
class Crypt{
    private $password;
    /**
     * Constructor
     * sets the passkey to the provided string otherwise a default passkey is set
     * @param string $passkey
     */
    function __construct($passkey="My current passkey is 100% safe!")
    {
        $this->password=$passkey;
    }
    /**
     * enc
     * Encodes the provided string to crypted string
     * @param string $plaintext
     * @return string
     */
    function enc($plaintext) {
        $method="AES-256-CBC";
        $key = hash('sha256', $this->password, true);
        $iv = openssl_random_pseudo_bytes(16);
        $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
        $hash = hash_hmac('sha256', $ciphertext, $key, true);
        return $iv . $hash . $ciphertext;
    }
    /**
     * dec
     * Decodes a crypted string
     * @param string $ivHashCiphertext
     * @return string
     */
    function dec($ivHashCiphertext) {
        $method="AES-256-CBC";
        $iv = substr($ivHashCiphertext, 0, 16);
        $hash = substr($ivHashCiphertext, 16, 32);
        $ciphertext = substr($ivHashCiphertext, 48);
        $key = hash('sha256', $this->password, true);
        if (hash_hmac('sha256', $ciphertext, $key, true) !== $hash) return null;
        return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
    }
}

/**
 * Database
 */
class Database extends Crypt
{

    /**
     * Constructor
     * connects to a database with the given parameters otherwise default values are set.
     * @param string $db_name
     * @param string $host
     * @param string $username
     * @param string $password
     */
    function __construct($db_name, $host="localhost", $username="root", $password="") {
        $this->mysqli = mysqli_connect($host, $username, $password, $db_name);
    }

    /**
     * runQuery
     * Runs a SQL-question to the database and returns the resulting object or value
     * @param string $strQuery
     * @return object or integer
     */
    public function runQuery($strQuery){
        return $this->mysqli->query($strQuery);
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
        $query="DELETE FROM $table WHERE $tmpSTrID=$ID";
        return $this->mysqli->query($query);
    }

    /**
 * data2JSON
 * Returns data from database formatted as JSON with the object name data
 * @param $connOBJ {object} the database connection object.
 * @param $txtSQL {string} String with SQL-formatted question.
 * @return JSON formatted string
 */
 public function data2JSON($txtSQL){
    $result = $this->mysqli->query($txtSQL);
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
        $query = "SELECT * FROM $table";
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