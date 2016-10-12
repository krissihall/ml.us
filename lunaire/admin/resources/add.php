<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php");

if ($submit){

  echo "<div class=\"header\">Add Resource</div>"; 
  echo "<div class=\"body\">"; 

  $sql = "INSERT INTO resources (resource_id, name, url, category) VALUES ('$resource_id','$name','$url','$category')";
  mysql_query($sql);
  echo "Your Resource has been added.";
  echo "</div>";

}
else {
?>

<div class="header">Add Resource</div>
<div class="body">Please fill out the form below to add and entry and hit submit only once.
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td align="right">Name:</td>
    <td><input type="text" name="name"></td>
  </tr>
  <tr>
    <td align="right">URL:</td>
    <td><input type="text" name="url"></td>
  </tr>
  <tr>
    <td align="right">Category:</td>
    <td><select name="category">
      <option>software</option>
      <option>brushes</option>
      <option>images</option>
      <option>tutorials</option>
    </select></td>
  </tr>
  <tr><td colspan="2" align="center"><input type="Submit" name="submit" value="Add Entry"></td>
  </tr>
</table>
</form>
</div>

<?php
}
include("../foot.php");
}
?>
