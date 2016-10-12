<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php");

$z=$_GET['z'];

if ($z=="submit"){

  //echo "<div class=\"header\">Add Design</div>"; 
  //echo "<div class=\"body\">"; 

$name=$_POST['name'];
$series=$_POST['series'];
$category=$_POST['category'];
$designer=$_POST['designer'];
$download=$_POST['download'];

// get the variable for the thumbnail image sent from the form
$tempFile = $HTTP_POST_FILES['thumb']['tmp_name'];
$destination = "../../designs/screens/" . $HTTP_POST_FILES['thumb']['name'];
copy($tempFile, $destination); 
$thumb = $HTTP_POST_FILES['thumb']['name'];

  $sql = "INSERT INTO designs (id, date, name, series, category, designer, image, preview, download) VALUES (NULL, NOW(), '$name', '$series', '$category', '$designer', 'http://lunaire.mysticallegends.com/designs/screens/$thumb', '$preview', '$download')";
  $result=mysql_query($sql);
  //echo "Your design has been added.";
  //echo "</div>";

    if($result){
       header("Location:designs.php?z=successful");
    }

}
else {
?>

<div class="header">Add Design</div>
<div class="body">Please fill out the form below to add and entry and hit submit only once.
<form method="post" action="add.php?z=submit" enctype="multipart/form-data">
<input type="hidden" name="designer" value="<?php echo $_SESSION['username']; ?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td align="right">Name:</td>
    <td><input type="text" name="name"></td>
  </tr>
  <tr>
    <td align="right">Series:</td>
    <td><input type="text" name="series"></td>
  </tr>
  <tr>
    <td align="right">Category:</td>
    <td><select name="category">
      <option name="category" value="tables">Tables</option>
      <option name="category" value="divs">Div Layers</option>
      <option name="category" value="iframes">iFrames</option>
    </select></td>
  </tr>
  <tr>
    <td align="right">Thumbnail:</td>
    <td><input type="file" name="thumb"></td>
  </tr>
  <tr>
    <td align="right">Preview:</td>
    <td><input type="text" name="preview"></td>
  </tr>
  <tr>
    <td align="right">Download:</td>
    <td><input type="text" name="download"></td>
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
