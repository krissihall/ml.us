<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php");

$z = $_GET['z'];

if ($z == "submit"){

  echo "<div class=\"header\">Add 1024x768 Texture</div>"; 
  echo "<div class=\"body\">"; 

$dimensions = $_POST['dimensions'];
$designer = $_POST['designer'];

// get the variable for the thumbnail image sent from the form
$tempFile = $HTTP_POST_FILES['thumb']['tmp_name'];
$destination = "../../textures/thumb/" . $HTTP_POST_FILES['thumb']['name'];
copy($tempFile, $destination); 
$thumb = $HTTP_POST_FILES['thumb']['name'];


// get the variable for the png image sent from the form
$tempFile = $HTTP_POST_FILES['download']['tmp_name'];
$destination = "../../textures/tex/" . $HTTP_POST_FILES['download']['name'];
$size = $HTTP_POST_FILES['download']['size'];
copy($tempFile, $destination); 
$download = $HTTP_POST_FILES['download']['name'];



  $sql = "INSERT INTO textures (tex_id, dimensions, file_size, designer, thumb, download, date) VALUES ('$tex_id','$dimensions','$size','$designer','http://lunaire.mysticallegends.com/textures/thumb/$thumb','http://lunaire.mysticallegends.com/textures/tex/$download',NOW())";
  mysql_query($sql);
  echo "Your texture has been added.";
  echo "</div>";

}
else {
?>

<div class="header">Add 1024x768 Texture</div>
<div class="body">Please fill out the form below to add and entry and hit submit only once.
<form method="post" action="add.php?z=submit" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<input type="hidden" name="dimensions" value="1024x768" />
  <tr>
    <td align="right">Designer:</td>
    <td><input type="text" name="designer" /></td>
  </tr>
  <tr>
    <td align="right">Thumbnail:</td>
    <td><input type="file" name="thumb" /></td>
  </tr>
  <tr>
    <td align="right">Download:</td>
    <td><input type="file" name="download" /></td>
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
