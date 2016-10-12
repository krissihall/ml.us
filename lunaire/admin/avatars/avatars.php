<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php"); 

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="header">Edit/Delete Avatar Entry</td>
  </tr>
  <tr>
    <td class="body">
     Please choose an avatar to edit or delete <br />

<?PHP 

include('../connection.php'); 

if ($what=="") { 

echo "<table width=\"100%\" class=\"edit\">"; 

$query = "select * from `avatars` order by icon_id desc"; 
$result= mysql_query($query, $connection) or die 
("Could not execute query : $query." . mysql_error());





while ($row=mysql_fetch_array($result)) 
{ 
    $icon_id=$row["icon_id"]; 
    $series=$row["series"]; 
    $characters=$row["characters"]; 
    $url=$row["url"];
    $designer=$row["designer"]; 
    $category=$row["category"];  
    $date=$row["date"];

    echo "<tr> <td class=\"edit\">$icon_id</td><td class=\"edit\">$designer</td><td class=\"edit\" align=\"center\"><img src=\"$url\" width=\"75\" height=\"75\" border=\"0\" /></td><td class=\"edit\"><a href=\"avatars.php?what=delete&icon_id=$icon_id\">Delete</a></td><td class=\"edit\"><a href=\"avatars.php?what=edit&icon_id=$icon_id\">Edit</a></td>"; } echo "</table>"; } 

elseif ($what=="delete") { 

    $q="DELETE from `avatars` where `icon_id`='$icon_id'"; 
    $result = mysql_query($q); 
    if ($result) { 
    echo "Avatar deleted."; 
    } 
} 

elseif ($what=="edit") { 

    $query = "select * from `avatars` where `icon_id`='$icon_id' LIMIT 1"; 
    $result= mysql_query($query, $connection) or die 
    ("Could not execute query : $query." . mysql_error()); 

while ($row=mysql_fetch_array($result)) 
{ 
    $icon_id=$row["icon_id"]; 
    $series=$row["series"]; 
    $characters=$row["characters"]; 
    $url=$row["url"];
    $designer=$row["designer"]; 
    $category=$row["category"];  
    $date=$row["date"];  
     
?> 

<form action="avatars.php?what=submitedit&icon_id=<?PHP ECHO "$icon_id"; ?>" method="post">
  <table border="0" cellspacing="0" cellpadding="0" class="tables">
    <tr> 
      <td align="left" class="body">Series: </td>
      <td class="body"> <input type="text" name="series" value="<?PHP ECHO "$series"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Character: </td>
      <td height="25" class="body"> <input type="text" name="characters" value="<?PHP ECHO "$characters"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Category: </td>
      <td height="25" class="body"> <select name="category">
          <option name="<?PHP ECHO "$category"; ?>" value="<?PHP ECHO "$category"; ?>"><?PHP ECHO "$category"; ?></option>
          <option name="" value="">-------------------</option>
          <option value="anime">anime</option>
          <option value="celebrity">celebrity</option>
          <option value="model">model</option>
          <option value="movie">movie</option>
          <option value="game">game</option>
          <option value="nature">nature</option>
          <option value="scenic">scenic</option>
          <option value="abstract">abstract</option>
          <option value="misc">misc</option>
        </select> </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Avatar URL: </td>
      <td height="25" class="body"> <input type="text" name="url" value="<?PHP ECHO "$url"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Designer: </td>
      <td height="25" class="body"> <input type="text" name="designer" value="<?PHP ECHO "$designer"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Date: </td>
      <td height="25" class="body"> <input type="text" name="date" value="<?PHP ECHO "$date"; ?>" size="30"> 
      </td>
    </tr>
    <tr>
      <td class="body">&nbsp;</td>
      <td class="body"><input type="submit" name="submit" value="Submit" class="input"></td>
    </tr>
  </table>
</form>

<?PHP 
} 
} 

elseif ($what=="submitedit") { 


$q="update avatars set series='$series', category='$category', characters='$characters', url='$url', designer='$designer', date='$date' where `icon_id`='$icon_id'"; 

$result= mysql_query($q) or die 
("Could not execute query : $q." . mysql_error()); 

    if ($result) { 
        echo "Avatar has been updated."; 
    } 

} 







?>

</td>
</tr>
</table>

<?php 
include("../foot.php"); 
}
?>