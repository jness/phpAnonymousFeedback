<?php
 # Check if POST
 if (isset($_POST['submit'])) {

 # Check for input
 if (isset($_POST['topic']) && isset($_POST['feedback'])) {
 
 if (!empty($_POST['topic'])) {

 if (!empty($_POST['feedback'])) {

 $topic = $_POST['topic'];
 $feedback = $_POST['feedback'];

 # Include Main config
 include 'config.php';
 
 # Sanitize input
 require_once("mysqlconnect.php");
 $topic = mysql_real_escape_string($topic);
 $feedback = mysql_real_escape_string($feedback);

 $handle = fopen("./.htkey", "r");
 $key = fread($handle, 10);
 fclose($handle);
 
 # MySQL Work
 $query = "INSERT INTO feedback (topic, feedback) VALUES ('$topic', AES_ENCRYPT('$feedback','$key'))";
 $result = @mysql_query ($query);
 if ($result) {
 $message = "Feedback successfully submited";

 # Send notification

    $to      = "$email";
    $subject = 'Anonymous Feedback Submission';
    $email = "An Anonymous Feedback has been submitted, 
view this at $url/login.php
";
    $headers = "From: feedback@$domain" . "\r\n" .
    "Reply-To: feedback@$domain" . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $email, $headers);

 }else{
 $message = "Error submitting feedback.";
 }

 }else{
 $message = $message . "Feedback section can not be empty";
 }

 }else{
 $message = $message . "Topic needs to be selected";
 }
  
 }else{
 $message = $message . "POST data not sent to page";
 }

 }
 
include "head.php";
 ?>
<table width="800" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td><form id="form1" name="form1" method="post" action="index.php">
     <center><?php echo "<font color=red>$message</font>"; ?></center> 
     <table width="100%" border="0" cellspacing="5" cellpadding="5">
        <tr>
          <td width="104" class="style3">Topic:</td>
          <td width="661">
            <select name="topic">
              <option value="Technical Team">Technical Team</option>
              <option value="Relationship Team">Relationship Team</option>
            </select>
          </td>
        </tr>
        <tr>
          <td valign='top' class="style3">Feedback:</td>
          <td>
            <textarea name="feedback" cols="85" rows="10"></textarea>
          </td>
        </tr>
        <tr>
          <td class="style3">&nbsp;</td>
          <td>
            <input type="submit" name="submit" value="Submit Feedback" />
          </td>
        </tr>
        <tr>
          <td class="style3">&nbsp;</td>
          <td><div align="right"><a href="./list.php" class="style4"><font color="black">View Feedback</font></a></div></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</body>
</html>

