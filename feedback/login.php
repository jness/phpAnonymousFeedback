<?php
session_start();

if(isset($_SESSION['login'])) {
header ("Location: list.php");
}


if ($_POST['submit']) {

 require_once("mysqlconnect.php");
 $query = "SELECT password FROM password";
 $result = @mysql_query ($query);
 $row = mysql_fetch_array($result);

 $pass = $row[password];
 $password = $_POST['password'];
 if ( "$password" == "$pass" ) {
 $_SESSION['login'] = 'true'; 
 header ("Location: list.php");
 
 }else{
 $message = "<font color=red>Incorrect Password</font>";
 }
 
}

include "head.php";
?>
<br><br><center>
<?php echo $message; ?>
<form id="form1" name="form1" method="post" action="login.php">
<table width="400" border="0" cellspacing="0" cellpadding="10">
 <tr>
  <td class="style3"><font color=black>Password:</font></td>
  <td class="style3"><font color=black>
  <input type=password name=password></input> <input type="submit" name="submit" value="Login" />
  </font></td>
 </tr>
</table>
</form>
</center>
</html>
