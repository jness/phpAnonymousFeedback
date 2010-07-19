<html>
<head>
<title>Anonymous Feedback</title>
<style type="text/css">
<!--
.style1 {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 36px;
        font-weight: bold;
}
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; font-weight: bold; }
.style4 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; font-weight: bold; }
.style5 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; }

-->
</style>
</head>

<body>
<?php session_start(); 
if (isset($_SESSION['login'])) {
?>
<table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="697"><span class="style4"><a href=./logout.php><font color=black>Logout</font></a> | <a href=./changepassword.php><font color=black>Change Password</font></a></span></td>
  </tr>
</table>
<?php
}
?>

<table width="800" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td width="68"><a href=./index.php><img border=0 src="images.jpeg" width="68" height="66" /></a></td>
    <td width="697"><span class="style1">Anonymous Feedback </span></td>
  </tr>
</table>

