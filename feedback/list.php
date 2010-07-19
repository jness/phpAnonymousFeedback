<?php
session_start();
if(!isset($_SESSION['login'])) {
header ("Location: login.php");
}

include "head.php";
require_once("mysqlconnect.php");

$handle = fopen("./.htkey", "r");
$key = fread($handle, 10);
fclose($handle);

$query = "SELECT id, topic, AES_DECRYPT(feedback, '$key') AS feedback, time from feedback ORDER by id";
$result = @mysql_query ($query);
echo '
<table width="950" border="0" cellspacing="0" cellpadding="10">
 <tr bgcolor=black>
  <td width=125 class="style3"><font color=white>Topic</font></td>
  <td class="style3"><font color=white>Feedback</font></td>
  <td width=125 class="style3"><font color=white>Time</font></td>
  <td width=5 class="style3"><font color=white>Remove</font></td>
 </tr>
';

$color2 = "#F8F8F8";
$color1 = "#EAEAEA";
$row_count = 0;

while ($row =  mysql_fetch_array($result)) {

$row_color = ($row_count % 2) ? $color1 : $color2;

 $limit = 100;
 if (strlen($row[feedback]) > $limit) {
 $content = substr($row[feedback], 0, strrpos(substr($row[feedback], 0, $limit), ' ')) . ' .......';
 } else {
 $content = $row[feedback];
 }
?>

        <tr bgcolor=<?php echo "$row_color"; ?>>
          <td valign='top' class="style5"><a href='view.php?id=<?php echo $row[id]; ?>'><?php echo $row[topic]; ?></a></td>
          <td class="style5"><?php echo $content; ?></td>
          <td valign='top' class="style5"><?php echo $row[time]; ?></td>
          <td valign='top' class="style5"><a href='remove.php?id=<?php echo $row[id]; ?>'>Remove</a></td>
        <tr>

<?
$row_count++;
}
echo '</table>';
?>
