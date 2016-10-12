<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php");

$z=$_GET['z'];

if ($z=="submit"){

include('../connection.php');


$name=$_POST['name'];
$website=$_POST['website'];
$genre=$_POST['genre'];
$banner=$_POST['banner'];


// header and error message for adding information into the database
  echo "<div class=\"header\">Add Links</div>"; 
  echo "<div class=\"body\">"; 


// upload the banner to the proper directory
$tempFile = $HTTP_POST_FILES['upload']['tmp_name'];
$destination = "../../links/banner/" . $HTTP_POST_FILES['upload']['name'];
copy($tempFile, $destination); 
$thumb = $HTTP_POST_FILES['upload']['name'];


// commented out to try a new method of upload
/* $target_path = "../../links/banner/";

$target_path = $target_path . basename( $_FILES['upload']['name']); 

if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)) {
    echo "The banner ".  basename( $_FILES['upload']['name']). 
    " has been uploaded<br /><br />";
} else{
    echo "There was an error uploading the file, please try again!<br /><br />";
} */





  $sql = "INSERT INTO links (link_id, name, url, genre, banner, date) VALUES (NULL,'$name','$website','$genre','http://lunaire.mysticallegends.com/links/banner/$thumb',NOW())";
  $result = mysql_query($sql);
     // use this code for troubleshooting, comment out later
         //print $sql;
         //echo($result) ? "query OK" : "query Bad";
  echo "Your link has been added.";
  echo "</div>";

}
else {
?>

<div class="header">Add Links</div>
<div class="body">Please fill out the form below to add and entry and hit submit only once.
<form method="post" action="add.php?z=submit"  enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td align="right">Site name:</td>
    <td><input type="text" name="name" /></td>
  </tr>
  <tr>
    <td align="right">URL:</td>
    <td><input type="text" name="website" /></td>
  </tr>
  <tr>
    <td align="right">Banner:</td>
    <td><input type="file" name="upload" /></td>
  </tr>
  <tr>
    <td align="right">Genre:</td>
    <td><select name="genre">
      <option>affiliate</option>
      <option>link exchange</option>
      <option>personal</option>
      <option>rotation</option>
      <option>graphics</option>
      <option>gallery</option>
      <option>tutorials</option>
      <option>brushes</option>
      <option>directory</option>
      <option>pngs</option>
    </select></td>
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
