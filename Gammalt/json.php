<?php 
require_once 'util.php';
$x=new Database("dbsdata");
echo $x->data2JSON("SELECT * FROM tbluser");
?>