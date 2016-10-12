<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php");

$z=$_GET['z'];

if ($z=="submit"){

  echo "<div class=\"header\">Add Advertisement</div>"; 
  echo "<div class=\"body\">"; 

$name = $_POST['name'];
$website = $_POST['website'];

// upload the banner
$tempFile = $HTTP_POST_FILES['banner']['tmp_name'];
$destination = "../../advertise/banners/" . $HTTP_POST_FILES['banner']['name'];
copy($tempFile, $destination); 
$banner = $HTTP_POST_FILES['banner']['name'];


  $sql = "INSERT INTO advertise (ad_id, url, name, banner, date) VALUES (NULL,'$website','$name','http://lunaire.mysticallegends.com/advertise/banners/$banner',NOW())";
  $result = mysql_query($sql);
  // use this for trouble-shooting
     //print $sql;
     //echo($result) ? "query OK" : "query Bad";
  echo "Your advertisement has been added.";
  echo "</div>";

} else {
?>
<div class="header">Add Advertisement</div>
<div class="body">Please fill out the form below to add and entry and hit submit only once.
<form method="post" action="add.php?z=submit" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td align="right">Name:</td>
    <td><input type="text" name="name" /></td>
  </tr>
  <tr>
    <td align="right">URL:</td>
    <td><input type="text" name="website" /></td>
  </tr>
  <tr>
    <td align="right">Upload Banner:</td>
    <td><input type="file" name="banner" /></td>
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
