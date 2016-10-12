<?php


include("../../include/session.php");


if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {


include("../head.php"); 

?>

<div class="header">Upload Icons</div>
<div class="body">
<table border="0" cellpadding="2" cellspacing="0">
<tr>
<form action="multi_upload.php" method="post" enctype="multipart/form-data" name="form" id="form">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="0">
<tr>
<td>Browse your harddrive for the icons you wish to upload, then follow along with the instructions to finish posting.</td>
</tr>
<tr>
<td>Select file
<input name="ufile[]" type="file" size="50" /></td>
</tr>
<tr>
<td>Select file
<input name="ufile[]" type="file" size="50" /></td>
</tr>
<tr>
<td>Select file
<input name="ufile[]" type="file" size="50" /></td>
</tr>
<tr>
<td>Select file
<input name="ufile[]" type="file" size="50" /></td>
</tr>
<tr>
<td>Select file
<input name="ufile[]" type="file" size="50" /></td>
</tr>
<tr>
<td>Select file
<input name="ufile[]" type="file" size="50" /></td>
</tr>
<tr>
<td>Select file
<input name="ufile[]" type="file" size="50" /></td>
</tr>
<tr>
<td>Select file
<input name="ufile[]" type="file" size="50" /></td>
</tr>
<tr>
<td>Select file
<input name="ufile[]" type="file" size="50" /></td>
</tr>
<tr>
<td>Select file
<input name="ufile[]" type="file" size="50" /></td>
</tr>
<tr>
<td>Select file
<input name="ufile[]" type="file" size="50" /></td>
</tr>
<tr>
<td>Select file
<input name="ufile[]" type="file" size="50" /></td>
</tr>
<tr>
<td align="center"><input type="submit" name="Submit" value="Upload" /></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</div>

<?php 
include("../foot.php");
}
?>