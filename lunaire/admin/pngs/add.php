<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php"); 


$z=$_GET['z'];

if ($z=="submit"){

include('../connection.php');

  echo "<div class=\"header\">Add Transparent PNG</div>"; 
  echo "<div class=\"body\">";


$series = $_POST['series'];
$characters = $_POST['characters'];
$dimensions = $_POST['dimensions'];
$category = $_POST['category'];
$designer = $_POST['designer'];


// get the variable for the thumbnail image sent from the form
$tempFile = $HTTP_POST_FILES['thumb']['tmp_name'];
$destination = "../../pngs/thumb/" . $HTTP_POST_FILES['thumb']['name'];
copy($tempFile, $destination); 
$thumb = $HTTP_POST_FILES['thumb']['name'];

// get the variable for the png image sent from the form
$tempFile = $HTTP_POST_FILES['download']['tmp_name'];
$destination = "../../pngs/png/" . $HTTP_POST_FILES['download']['name'];
$size = $HTTP_POST_FILES['download']['size'];
copy($tempFile, $destination); 
$download = $HTTP_POST_FILES['download']['name'];


  $sql = "INSERT INTO pngs (png_id, series, characters, dimensions, file_size, category, designer, thumb, download, date) VALUES ('$png_id','$series','$characters','$dimensions','$size','$category','$designer','http://lunaire.mysticallegends.com/pngs/thumb/$thumb','http://lunaire.mysticallegends.com/pngs/png/$download',NOW())";

  $result=mysql_query($sql);
  //echo "Your PNG has been added.";
     //troubleshooting
        //print $sql;
       //echo($result) ? "Query OK" : "Query Bad";
  echo "Successfully added to database.";
  echo "</div>";

  /*if($result){
     header("Location:pngs.php?z=added");
  }*/
  

}
else {
?>

<div class="header">Add Transparent PNG</div>
<div class="body">Please fill out the form below to add and entry and hit submit only once.
<form method="post" action="add.php?z=submit" enctype="multipart/form-data">
<input type="hidden" name="designer" value="<?php echo $_SESSION['username']; ?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td align="right">Series:</td>
    <td><input type="text" name="series" /></td>
  </tr>
  <tr>
    <td align="right">Characters:</td>
    <td><input type="text" name="characters" /></td>
  </tr>
  <tr>
    <td align="right">Dimensions:</td>
    <td><input type="text" name="dimensions" /></td>
  </tr>
  <tr>
    <td align="right">Thumbnail:</td>
    <td><input type="file" name="thumb" /></td>
  </tr>
  <tr>
    <td align="right">Full-size:</td>
    <td><input type="file" name="download" /></td>
  </tr>
  <tr>
    <tr> 
      <td height="25" align="right">Category: </td>
      <td height="25" class="body"> <select name="category">
          <option name="anime" value="anime">anime</option>
          <option name="actor" value="actor">actor</option>
          <option name="nature" value="nature">nature</option>
          <option name="model" value="model">model</option>
          <option name="game" value="game">game</option>
        </select> </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="Submit" name="submit" value="Add Entry"></td>
  </tr>
</table>
</form>
</div>

<?php
}
include("../foot.php");
}
?>