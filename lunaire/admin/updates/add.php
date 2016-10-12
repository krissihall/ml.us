<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php");

if ($submit){

include('../connection.php');

  echo "<div class=\"header\">Add Update</div>";
  echo "<div class=\"body\">";

  $sql = "INSERT INTO admin_updates (update_id, category, title, update, name, avatar, date) VALUES (NULL, '$category', '$title', '$information', '$name', '$avatar', NOW())";
  $result = mysql_query($sql);
      // use this code for troubleshooting, comment out later
         print $sql . "<br /><br />";
         echo($result) ? "query OK" : "query Bad";
  //echo "Your update has been added.";
  echo "</div>";

}
else {
?>
<div class="header">Add Update</div>
<div class="body">Please fill out the form below to add and entry and hit submit only once.
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td align="right">Title:</td>
    <td><input type="text" name="title" /></td>
  </tr>
  <tr>
    <td align="right">Your Name:</td>
    <td><input type="text" name="name" /></td>
  </tr>
  <tr>
    <td align="right">Avatar:</td>
    <td><input type="text" name="avatar" /></td>
  </tr>
  <tr>
    <td align="right">Category:</td>
    <td><select name="category">
    	   <option value="fixed">fixed</option>
    	   <option value="added">added</option>
    	   <option value="working">working</option>
    	   <option value="changed">changed</option>
        </select></td>
  </tr>
  <tr>
    <td align="right" valign="top">Update:</td>
    <td><textarea name="information" cols="40" rows="8"></textarea></td>
  </tr>
  <tr><td colspan="2" align="center"><input type="Submit" name="submit" value="Add Entry" /></td>
  </tr>
</table>
</form>
</div>

<?php
}
include("../foot.php");
}
?>
