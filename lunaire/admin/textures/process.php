<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../connection.php");

$what=$_GET['what'];

if ($what=="delete") { 

$tex_id = $_GET['tex_id'];

    $q="DELETE from `textures` where `tex_id`='$tex_id'"; 
    $result = mysql_query($q); 
    
    if ($result) { 
    	echo "Texture deleted."; 
    } 
} 

else if ($what=="edit") {

include('../head.php');

$tex_id = $_GET['tex_id'];

    $query = "select * from `textures` where `tex_id`='$tex_id' LIMIT 1"; 
    $result= mysql_query($query, $connection) or die 
    ("Could not execute query : $query." . mysql_error()); 

while ($row=mysql_fetch_array($result)) 
{ 
    $tex_id=$row["tex_id"]; 
    $dimensions=$row["dimensions"]; 
    $file_size=$row["file_size"]; 
    $designer=$row["designer"];
    $thumb=$row["thumb"];  
    $download=$row["download"]; 
     
?> 

<form action="textures.php?what=submitedit&tex_id=<?PHP ECHO "$tex_id"; ?>" method="post">
  <table border="0" cellspacing="0" cellpadding="0" class="tables">
    <tr> 
      <td height="25" align="left" class="body">Dimensions: </td>
      <td height="25" class="body"> <select name="select2">
          <option name="<?PHP ECHO "$dimensions"; ?>" value="<?PHP ECHO "$dimensions"; ?>"><?PHP ECHO "$dimensions"; ?></option>
          <option name="" value="">-------------------</option>
          <option name="tables" value="1024x768">1024x768</option>
          <option name="divs" value="divs">100x100</option>
        </select> </td>
    </tr
    <tr> 
      <td height="25" align="left" class="body">File Size: </td>
      <td height="25" class="body"> <input type="text" name="file_size" value="<?PHP ECHO "$file_size"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Designer: </td>
      <td height="25" class="body"> <input type="text" name="designer" value="<?PHP ECHO "$designer"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Thumbnail: </td>
      <td height="25" class="body"> <input type="text" name="thumb" value="<?PHP ECHO "$thumb"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Download: </td>
      <td height="25" class="body"> <input type="text" name="download" value="<?PHP ECHO "$download"; ?>" size="30"> 
      </td>
    </tr>
    <tr>
      <td class="body">&nbsp;</td>
      <td class="body"><input type="submit" name="submit" value="Submit" class="input"></td>
    </tr>
  </table>
</form>

<?PHP 
include('../foot.php');

	} 
} 

elseif ($what=="submitedit") { 

$tex_id = $_GET['tex_id'];

$tex_id=$_POST['tex_id']; 
$dimensions=$_POST['dimensions']; 
$file_size=$_POST['file_size']; 
$designer=$_POST['designer'];
$thumb=$_POST['thumb'];  
$download=$_POST['download'];

$q="update `textures` set `dimensions`='$dimensions', `file_size`='$file_size', `designer`='$designer', `thumb`='$thumb', `download`='$download' where `tex_id`='$tex_id'"; 

$result= mysql_query($q) or die 
("Could not execute query : $q." . mysql_error()); 

    if ($result) { 
        echo "Texture has been updated."; 
    } 

} 

}
?>