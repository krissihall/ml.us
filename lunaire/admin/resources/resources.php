<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php"); 

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="header">Edit/Delete Resource Entry</td>
  </tr>
  <tr>
    <td class="body">
     Please choose a resources to edit or delete <br />

<?php 

include("../connection.php"); 

if ($what=="") { 

echo "<table width=\"100%\" class=\"edit\">"; 

$query = "select * from `resources` order by resource_id desc"; 
$result= mysql_query($query, $connection) or die 
("Could not execute query : $query." . mysql_error());




 

while ($row=mysql_fetch_array($result)) 
{ 
    $resource_id=$row["resource_id"]; 
    $name=$row["name"]; 
    $url=$row["url"]; 
    $category=$row["category"];

    echo "<tr><td class=\"edit\">$resource_id</td><td class=\"edit\">$name</td><td class=\"edit\">$category</td><td class=\"edit\"><a href=\"resources.php?what=delete&resource_id=$resource_id\">Delete</a></td><td class=\"edit\"><a href=\"resources.php?what=edit&resource_id=$resource_id\">Edit</a></td>"; } echo "</table>"; } 

elseif ($what=="delete") { 

    $q="DELETE from `resources` where `resource_id`='$resource_id'"; 
    $result = mysql_query($q); 
    if ($result) { 
    echo "Resource deleted."; 
    } 
} 

elseif ($what=="edit") { 

    $query = "select * from `resources` where `resource_id`='$resource_id' LIMIT 1"; 
    $result= mysql_query($query, $connection) or die 
    ("Could not execute query : $query." . mysql_error()); 

while ($row=mysql_fetch_array($result)) 
{ 
    $resource_id=$row["resource_id"]; 
    $name=$row["name"]; 
    $url=$row["url"]; 
    $category=$row["category"];  
     
?> 

<form action="resources.php?what=submitedit&resource_id=<?PHP ECHO "$resource_id"; ?>" method="post">
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
      <td height="25" align="left" class="body">Category: </td>
      <td height="25" class="body"> <select name="category">
          <option name="<?PHP ECHO "$category"; ?>" value="<?PHP ECHO "$category"; ?>"><?PHP ECHO "$category"; ?></option>
          <option name="" value="">-------------------</option>
          <option name="software" value="software">software</option>
          <option name="brushes" value="brushes">brushes</option>
          <option name="images" value="images">images</option>
          <option name="tutorials" value="tutorials">tutorials</option>
        </select> </td>
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


$q="update `resources` set `name`='$name', `url`='$url', `category`='$category' where `resource_id`='$resource_id'"; 

$result= mysql_query($q) or die 
("Could not execute query : $q." . mysql_error()); 

    if ($result) { 
        echo "Resource has been updated."; 
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