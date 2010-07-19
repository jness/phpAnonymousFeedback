<?php
session_start();
if(!isset($_SESSION['login'])) {
header ("Location: login.php");
}

$id = $_GET['id'];
include "head.php";
require_once("mysqlconnect.php");

$handle = fopen("./.htkey", "r");
$key = fread($handle, 10);
fclose($handle);

$query = "SELECT topic, AES_DECRYPT(feedback,'$key') AS feedback from feedback WHERE id='$id'";
$result = @mysql_query ($query);
$row = mysql_fetch_array($result);

echo "<h3>$row[topic]</h3>";
echo "<pre wrap=hard>$row[feedback]</pre>";
?>
