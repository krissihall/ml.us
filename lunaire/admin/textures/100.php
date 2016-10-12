<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php");


$z=$_GET['z'];

if(!isset($z)){
   $z="";
}


if ($z=="submit"){

  //echo "<div class=\"header\">Add 100x100 Texture</div>"; 
  //echo "<div class=\"body\">"; 


$dimensions=$_POST['dimensions'];
$designer=$_POST['designer'];


// get the variable for the texture image sent from the form
$tempFile = $HTTP_POST_FILES['texture']['tmp_name'];
$destination = "../../textures/100/" . $HTTP_POST_FILES['texture']['name'];
$size = $HTTP_POST_FILES['texture']['size'];
copy($tempFile, $destination); 
$texture = $HTTP_POST_FILES['texture']['name'];



  $sql = "INSERT INTO textures (tex_id, dimensions, file_size, designer, thumb, download, date) VALUES (NULL,'$dimensions','$size','$designer','http://lunaire.mysticallegends.com/textures/100/$texture','http://lunaire.mysticallegends.com/textures/100/$texture',NOW())";
  $result=mysql_query($sql);
  //echo "Your texture has been added.";
  //echo "</div>";

    if($result){
       header("Location:textures.php?z=added");
    } else {
       echo "There was an error with the query.";
    }

}
else {
?>

<div class="header">Add 100x100 Texture</div>
<div class="body">Please fill out the form below to add and entry and hit submit only once.
<form method="post" action="100.php?z=submit" enctype="multipart/form-data">
<input type="hidden" name="designer" value="<?php echo $_SESSION['username']; ?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<input type="hidden" name="dimensions" value="100x100" />
  <tr>
    <td align="right">Texture:</td>
    <td><input type="file" name="texture" /></td>
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
