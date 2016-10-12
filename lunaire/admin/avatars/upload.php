<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php");

?>

<div class="header">Upload Avatar</div>
<div class="body">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td align="right">Upload File:</td>
    <td><form enctype="multipart/form-data" method="post" action="process.php">
  <input type="file" name="upload" /><br /></td>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input type="submit" value="Upload File" />
</form></td>
  </tr>
</table>
</div>


<?php 
include("../foot.php");
}
?>