<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php");

if ($submit){

include('../connection.php');

  echo "<div class=\"header\">Add Tutorial</div>"; 
  echo "<div class=\"body\">"; 

  $sql = "INSERT INTO tutorials (id, date, title, category, writer, description, image, view, pcount) VALUES ('$id',NOW(),'$title','$category','$writer','$description','image','view','pcount')";
  mysql_query($sql);
  echo "Your tutorial has been added.";
  echo "</div>";

}
else {
?>

<div class="header">Add Tutorial</div>
<div class="body">Please fill out the form below to add and entry and hit submit only once.
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td align="right">Title:</td>
    <td><input type="text" name="title"></td>
  </tr>
  <tr>
    <td align="right">Writer:</td>
    <td><input type="text" name="writer"></td>
  </tr>
  <tr>
    <td align="right">Image:</td>
    <td><input type="text" name="image"></td>
  </tr>
  <tr>
    <td align="right">View:</td>
    <td><input type="text" name="view"></td>
  </tr>
  <tr>
    <td align="right">Category:</td>
    <td><select name="category">
    	   <option>PHP</option>
    	   <option>MySQL</option>
    	   <option>XHTML</option>
    	   <option>CSS</option>
    	   <option>Javascript</option>
    	   <option>Photoshop</option>
    	   <option>Paint Shop Pro</option>
        </select></td>
  </tr>
  <tr>
    <td align="right" valign="top">Description:</td>
    <td><textarea name="description" cols="40" rows="8"></textarea></td>
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
