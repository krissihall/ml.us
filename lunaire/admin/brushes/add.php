<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php");

$z = $_GET['z'];

if ($z=="submit"){

  echo "<div class=\"header\">Add Brush Set</div>"; 
  echo "<div class=\"body\">"; 

$brush_name = $_POST['brush_name'];
$number = $_POST['number'];
$designer = $_POST['designer'];

// get the variable for the thumbnail image sent from the form
$tempFile = $HTTP_POST_FILES['thumb']['tmp_name'];
$destination = "../../brushes/thumb/" . $HTTP_POST_FILES['thumb']['name'];
copy($tempFile, $destination); 
$thumb = $HTTP_POST_FILES['thumb']['name'];


// get the variable for the png image sent from the form
$tempFile = $HTTP_POST_FILES['download']['tmp_name'];
$destination = "../../brushes/brush/" . $HTTP_POST_FILES['download']['name'];
$size = $HTTP_POST_FILES['download']['size'];
copy($tempFile, $destination); 
$download = $HTTP_POST_FILES['download']['name'];


  $sql = "INSERT INTO brushes (brush_id, brush_name, number, designer, thumb, zip, date) VALUES (NULL,'$brush_name','$number','$designer','http://lunaire.mysticallegends.com/brushes/thumb/$thumb','http://lunaire.mysticallegends.com/brushes/brush/$download',NOW())";
  mysql_query($sql);
  echo "Your brush has been added.";
  echo "</div>";

}
else {
?>

<div class="header">Add Brush Set</div>
<div class="body">Please fill out the form below to add and entry and hit submit only once.
<form method="post" action="add.php?z=submit" enctype="multipart/form-data">
<input type="hidden" name="designer" value="<?php echo $_SESSION['username']; ?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td align="right">Brush Name:</td>
    <td><input type="text" name="brush_name"></td>
  </tr>
  <tr>
    <td align="right">Number of Brushes:</td>
    <td><input type="text" name="number"></td>
  </tr>
  <tr>
    <td align="right">Thumbnail:</td>
    <td><input type="file" name="thumb"></td>
  </tr>
  <tr>
    <td align="right">Download:</td>
    <td><input type="file" name="download"></td>
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