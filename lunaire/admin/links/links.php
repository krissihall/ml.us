<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php"); 

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="header">Edit/Delete Link Entry</td>
  </tr>
  <tr>
    <td class="body">
     Please choose an link to edit or delete <br />

<?PHP 

include('../connection.php'); 

if ($what=="") { 

echo "<table width=\"100%\" class=\"edit\">"; 

$query = "select * from `links` order by link_id desc"; 
$result= mysql_query($query, $connection) or die 
("Could not execute query : $query." . mysql_error());



 


while ($row=mysql_fetch_array($result)) 
{ 
    $link_id=$row["link_id"]; 
    $banner=$row["banner"]; 
    $name=$row["name"]; 
    $url=$row["url"];
    $genre=$row["genre"];  
    $date=$row["date"];  
    $dcount=$row["dcount"];

    echo "<tr> <td class=\"edit\">$link_id</td><td class=\"edit\">$name</td><td class=\"edit\" align=\"center\"><img src=\"$banner\" width=\"88\" height=\"31\" border=\"0\" /></td><td class=\"edit\"><a href=\"links.php?what=delete&link_id=$link_id\">Delete</a></td><td class=\"edit\"><a href=\"links.php?what=edit&link_id=$link_id\">Edit</a></td>"; } echo "</table>"; } 

elseif ($what=="delete") { 

    $q="DELETE from `links` where `link_id`='$link_id'"; 
    $result = mysql_query($q); 
    if ($result) { 
    echo "Link deleted."; 
    } 
} 

elseif ($what=="edit") { 

    $query = "select * from links where link_id='$link_id' LIMIT 1"; 
    $result= mysql_query($query, $connection) or die 
    ("Could not execute query : $query." . mysql_error()); 

while ($row=mysql_fetch_array($result)) 
{ 
    $link_id=$row["link_id"]; 
    $banner=$row["banner"]; 
    $name=$row["name"]; 
    $url=$row["url"];
    $genre=$row["genre"];  
    $date=$row["date"];  
    $dcount=$row["dcount"]; 
     
?> 

<form action="links.php?what=submitedit&link_id=<?PHP ECHO "$link_id"; ?>" method="post">
  <table border="0" cellspacing="0" cellpadding="0" class="tables">
    <tr> 
      <td align="left" class="body">Name: </td>
      <td class="body"> <input type="text" name="name" value="<?PHP ECHO "$name"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">URL: </td>
      <td height="25" class="body"> <input type="text" name="url" value="<?PHP ECHO "$url"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Banner: </td>
      <td height="25" class="body"> <input type="text" name="banner" value="<?PHP ECHO "$banner"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Genre: </td>
      <td height="25" class="body"> <select name="select2">
          <option name="<?PHP ECHO "$genre"; ?>" value="<?PHP ECHO "$genre"; ?>"><?PHP ECHO "$genre"; ?></option>
          <option name="" value="">-------------------</option>
          <option name="affiliate" value="affiliate">affiliate</option>
          <option name="link_exchange" value="link exchange">link exchange</option>
          <option name="graphics" value="graphics">graphics</option>
          <option name="personal" value="personal">personal</option>
          <option name="iframes" value="graphics">rotation</option>
          <option name="gallery" value="gallery">gallery</option>
          <option name="tutorials" value="tutorials">tutorials</option>
          <option name="brushes" value="brushes">brushes</option>
          <option name="directory" value="directory">directory</option>
        </select> </td>
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


$q="update links set link_id='$link_id', banner='$banner', name='$name', url='$url', genre='$genre', date='$date' where `link_id`='$link_id'"; 

$result= mysql_query($q) or die 
("Could not execute query : $q." . mysql_error()); 

    if ($result) { 
        echo "Link has been updated."; 
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