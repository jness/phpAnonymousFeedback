<?php
session_start();

if(!isset($_SESSION['login'])) {
header ("Location: index.php");
}

 if ($_POST['submit']) {
 
 $password = $_POST[password];
 $password1 = $_POST[password1];

 if ("$password" == "$password1") {

 require_once("mysqlconnect.php");
 $query = "UPDATE password SET password='$password'";
 $result = @mysql_query ($query);
 if ($result) {
 $message = "Password reset";
 }

 }else{
 $message = "Password's do not match";
 }
 
 }

include "head.php";
?>
<br><br><center>
<?php echo "<font color=red>$message</font>"; ?>
<form id="form1" name="form1" method="post" action="changepassword.php">
<table width="400" border="0" cellspacing="0" cellpadding="10">
 <tr>
  <td class="style3"><font color=black>Password:</font></td>
  <td class="style3"><font color=black>
  <input type=password name=password></input><br>
  <input type=password name=password1></input> <input type="submit" name="submit" value="Login" />
  </font></td>
 </tr>
</table>
</form>
</center>
</html>
