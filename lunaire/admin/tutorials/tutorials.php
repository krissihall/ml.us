<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php"); 

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="header">Edit/Delete Tutorial Entry</td>
  </tr>
  <tr>
    <td class="body">
     Please choose a tutorial to edit or delete <br />

<?PHP 

include('../connection.php'); 

if ($what=="") { 

echo "<table width=\"100%\" class=\"edit\">"; 

$query = "select * from `tutorials` order by id desc"; 
$result= mysql_query($query, $connection) or die 
("Could not execute query : $query." . mysql_error()); 



while ($row=mysql_fetch_array($result)) 
{ 
    $id=$row["id"]; 
    $date=$row["date"]; 
    $title=$row["title"]; 
    $category=$row["category"];
    $writer=$row["writer"];  
    $description=$row["description"];
    $image=$row["image"];
    $view=$row["view"];
    $pcount=$row["pcount"];

    echo "<tr> <td class=\"edit\">$id</td><td class=\"edit\">$writer</td><td class=\"edit\" align=\"center\">$title</td><td class=\"edit\" align=\"center\">$description</td><td class=\"edit\"><a href=\"tutorials.php?what=delete&id=$id\">Delete</a></td><td class=\"edit\"><a href=\"tutorials.php?what=edit&id=$id\">Edit</a></td>"; } echo "</table>"; } 

elseif ($what=="delete") { 

    $q="DELETE from `tutorials` where `id`='$id'"; 
    $result = mysql_query($q); 
    if ($result) { 
    echo "Tutorial deleted."; 
    } 
} 

elseif ($what=="edit") { 

    $query = "select * from `tutorials` where `id`='$id' LIMIT 1"; 
    $result= mysql_query($query, $connection) or die 
    ("Could not execute query : $query." . mysql_error()); 

while ($row=mysql_fetch_array($result)) 
{ 
    $id=$row["id"]; 
    $date=$row["date"]; 
    $title=$row["title"]; 
    $category=$row["category"];
    $writer=$row["writer"];  
    $description=$row["description"];
    $image=$row["image"];
    $view=$row["view"];
    $pcount=$row["pcount"];
     
?> 

<form action="tutorials.php?what=submitedit&id=<?PHP ECHO "$id"; ?>" method="post">
  <table border="0" cellspacing="0" cellpadding="0" class="tables">
    <tr> 
      <td align="left" class="body">Title: </td>
      <td class="body"> <input type="text" name="title" value="<?PHP ECHO "$title"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Writer: </td>
      <td height="25" class="body"> <input type="text" name="writer" value="<?PHP ECHO "$writer"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Image: </td>
      <td height="25" class="body"> <input type="text" name="image" value="<?PHP ECHO "$image"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">View: </td>
      <td height="25" class="body"> <input type="text" name="view" value="<?PHP ECHO "$view"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Category: </td>
      <td height="25" class="body"> <select name="category">
          <option name="<?PHP ECHO "$category"; ?>" value="<?PHP ECHO "$category"; ?>"><?PHP ECHO "$category"; ?></option>
          <option name="" value="">-------------------</option>
          <option name="PHP" value="PHP">PHP</option>
          <option name="MySQL" value="MySQL">MySQL</option>
          <option name="XHTML" value="XHTML">XHTML</option>
          <option name="CSS" value="CSS">CSS</option>
          <option name="Javascript" value="Javascript">Javascript</option>
          <option name="Photoshop" value="Photoshop">Photoshop</option>
          <option name="PaintShopPro" value="Paint Shop Pro">Paint Shop Pro</option>
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


$q="update tutorials set title='$title', writer='$writer', image='$image', view='$view', category='$category', date='$date' where id='$id'"; 

$result= mysql_query($q) or die 
("Could not execute query : $q." . mysql_error()); 

    if ($result) { 
        echo "Tutorial has been updated."; 
    } 

} 


?>

</td>
</tr>
</table>

<?php include("../foot.php"); ?>

<?php
}
?>