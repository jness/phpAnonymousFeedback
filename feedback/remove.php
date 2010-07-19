<?php
session_start();
if(!isset($_SESSION['login'])) {
header ("Location: login.php");
}

 $id = $_GET['id'];
 require_once ("mysqlconnect.php");
 
 $query = "DELETE FROM feedback WHERE id='$id'";
 $result = @mysql_query ($query);
 if ($result) {
 header ("Location: list.php");
 }else{
 echo "Error removing";
 }

?>
