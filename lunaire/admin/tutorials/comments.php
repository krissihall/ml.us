<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php"); 

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="header">Edit/Delete Tutorial Comment</td>
  </tr>
  <tr>
    <td class="body">
     Please choose a comment to edit or delete <br /><br />


<?php
	//if user was sent here from comment page, add this success message
		if(isset($_GET['z'])){
			if ($_GET['z']=="comment"){
				print "<div align='center'><em>Comment was deleted successfully.</em></div><br /><br />";
			}
		}


include('../connection.php'); 

if ($what=="") { 

echo "<table width=\"100%\" class=\"edit\">"; 

$query = "select * from `tutorial_comments` order by id desc"; 
$result= mysql_query($query, $connection) or die 
("Could not execute query : $query." . mysql_error()); 



while ($row=mysql_fetch_array($result)) 
{ 
    $id=$row["id"]; 
    $entry=$row["entry"]; 
    $name=$row["name"]; 
    $email=$row["email"];
    $url=$row["url"];  
    $comment=$row["comment"];
    $timestamp=$row["timestamp"];

    echo "<tr> <td class=\"edit\">$id</td><td class=\"edit\">$email</td><td class=\"edit\" align=\"center\">$name</td><td class=\"edit\" align=\"center\">$comment</td><td class=\"edit\"><a href=\"comments.php?what=delete&id=$id\">Delete</a></td><td class=\"edit\"><a href=\"comments.php?what=edit&id=$id\">Edit</a></td>"; } echo "</table>"; } 

elseif ($what=="delete") { 

    $q="DELETE from `tutorial_comments` where `id`='$id'"; 
    $result = mysql_query($q); 
    if ($result) { 
    header("Location:comments.php?z=comment");
    } 
} 

elseif ($what=="edit") { 

    $query = "select * from `tutorial_comments` where `id`='$id' LIMIT 1"; 
    $result= mysql_query($query, $connection) or die 
    ("Could not execute query : $query." . mysql_error()); 

while ($row=mysql_fetch_array($result)) 
{ 
    $id=$row["id"]; 
    $entry=$row["entry"]; 
    $name=$row["name"]; 
    $email=$row["email"];
    $url=$row["url"];  
    $comment=$row["comment"];
    $timestamp=$row["timestamp"];
     
?> 

<form action="comments.php?what=submitedit&id=<?PHP ECHO "$id"; ?>" method="post">
  <table border="0" cellspacing="0" cellpadding="0" class="tables">
    <tr> 
      <td align="left" class="body">Entry No.: </td>
      <td class="body"> <input type="text" name="entry" value="<?PHP ECHO "$entry"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Name: </td>
      <td height="25" class="body"> <input type="text" name="name" value="<?PHP ECHO "$name"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Email: </td>
      <td height="25" class="body"> <input type="text" name="email" value="<?PHP ECHO "$email"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Url: </td>
      <td height="25" class="body"> <input type="text" name="url" value="<?PHP ECHO "$url"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Comment: </td>
      <td height="25" class="body"><textarea name="comment"><?php echo "$comment"; ?></textarea></td>
    </tr>
    <tr>
      <td class="body">Date:</td>
      <td class="body"><input type="text" name="timestamp" value="<?php echo "$timestamp"; ?>" class="input"></td>
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


$q="update tutorial_comments set name='$name', entry='$entry', email='$email', url='$url', comment='$comment', timestamp='$timestamp' where id='$id'"; 

$result= mysql_query($q) or die 
("Could not execute query : $q." . mysql_error()); 

    if ($result) { 
        echo "Comment has been updated."; 
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