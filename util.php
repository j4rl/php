<?php


class Crypt{
    private $password;

    function __construct($passkey="My current passkey is 100% safe!")
    {
        $this->password=$passkey;
    }

    function enc($plaintext) {
        $method="AES-256-CBC";
        $key = hash('sha256', $this->password, true);
        $iv = openssl_random_pseudo_bytes(16);
        $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
        $hash = hash_hmac('sha256', $ciphertext, $key, true);
        return $iv . $hash . $ciphertext;
    }

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

class Database extends Crypt
{


    function __construct($db_name, $host="localhost", $username="root", $password="") {
        $this->mysqli = mysqli_connect($host, $username, $password, $db_name);
    }


    public function runQuery($strQuery){
        return $this->mysqli->query($strQuery);
    }

    public function delRow($ID,$table){
        $strTable=strtolower(substr($table,3,strlen($table)));
        $tmpSTrID=$strTable."ID";
        $query="DELETE FROM $table WHERE $tmpSTrID=$ID";
        return $this->mysqli->query($query);
    }


    public function getAll($table)
    {
        $query = "SELECT * FROM $table";
        return $this->mysqli->query($query)->fetch_all();
    }

    public function close(){
        return $this->mysqli->close();
    }

}


?>