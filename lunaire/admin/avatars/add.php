<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php"); 


if ($submit){

include('../connection.php');

  echo "<div class=\"header\">Add Avatar</div>"; 
  echo "<div class=\"body\">";


// get the variable for the thumbnail image sent from the form
$tempFile = $HTTP_POST_FILES['avatar']['tmp_name'];
$destination = "../../avatars/icons/" . $HTTP_POST_FILES['avatar']['name'];
copy($tempFile, $destination); 
$thumb = $HTTP_POST_FILES['avatar']['name'];



  $sql = "INSERT INTO pngs (icon_id, series, characters, file_size, category, designer, url, date) VALUES (NULL,'$series','$characters','$size','$category','$designer','http://lunaire.mysticallegends.com/avatars/icons/$avatar',NOW())";

  mysql_query($sql);
  echo "Your avatar has been added.";
  echo "</div>";

}
else {
?>

<div class="header">Add Avatar</div>
<div class="body">Please fill out the form below to add and entry and hit submit only once.
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
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
    <td align="right">Designer:</td>
    <td><input type="text" name="designer" /></td>
  </tr>
  <tr>
    <td align="right">Avatar:</td>
    <td><input type="file" name="avatar" /></td>
  </tr>
  <tr>
    <tr> 
      <td height="25" align="right">Category: </td>
      <td height="25" class="body"> <select name="category">
          <option name="<?PHP ECHO "$category"; ?>" value="<?PHP ECHO "$category"; ?>"><?PHP ECHO "$category"; ?></option>
          <option name="" value="">-------------------</option>
          <option name="anime" value="anime">anime</option>
          <option name="celebrity" value="celebrity">celebrity</option>
          <option name="model" value="model">model</option>
          <option name="movie" value="movie">movie</option>
          <option name="game" value="game">game</option>
          <option name="nature" value="nature">nature</option>
          <option name="scenic" value="scenic">scenic</option>
          <option name="abstract" value="abstract">abstract</option>
          <option name="misc" value="misc">misc</option>
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
