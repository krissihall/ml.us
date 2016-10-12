<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php"); 

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="header">Edit/Delete Update Entry</td>
  </tr>
  <tr>
    <td class="body">
     Please choose an update to edit or delete <br />

<?PHP 

include('../connection.php'); 

if ($what=="") { 

echo "<table width=\"100%\" class=\"edit\">"; 

$query = "select * from `admin_updates` order by update_id desc"; 
$result= mysql_query($query, $connection) or die 
("Could not execute query : $query." . mysql_error()); 

while ($row=mysql_fetch_array($result)) 
{ 
    $update_id=$row["update_id"]; 
    $category=$row["category"]; 
    $title=$row["title"]; 
    $update=$row["update"];
    $name=$row["name"];  
    $avatar=$row["avatar"];
    $date=$row["date"];


    echo "<tr> <td class=\"edit\">$update_id</td><td class=\"edit\">$name</td><td class=\"edit\" align=\"center\">$title</td><td class=\"edit\" align=\"center\">$date</td><td class=\"edit\"><a href=\"updates.php?what=delete&update_id=$update_id\">Delete</a></td><td class=\"edit\"><a href=\"updates.php?what=edit&update_id=$update_id\">Edit</a></td>"; } echo "</table>"; } 

elseif ($what=="delete") { 

    $q="DELETE from `admin_updates` where `update_id`='$update_id'"; 
    $result = mysql_query($q); 
    if ($result) { 
    echo "Update deleted."; 
    } 
} 

elseif ($what=="edit") { 

    $query = "select * from `admin_updates` where `update_id`='$update_id' LIMIT 1"; 
    $result= mysql_query($query, $connection) or die 
    ("Could not execute query : $query." . mysql_error()); 

while ($row=mysql_fetch_array($result)) 
{ 
    $update_id=$row["update_id"]; 
    $category=$row["category"]; 
    $title=$row["title"]; 
    $update=$row["update"];
    $name=$row["name"];  
    $avatar=$row["avatar"];
    $date=$row["date"];
     
?> 

<form action="updates.php?what=submitedit&update_id=<?PHP ECHO "$update_id"; ?>" method="post">
  <table border="0" cellspacing="0" cellpadding="0" class="tables">
    <tr> 
      <td align="left" class="body">Title: </td>
      <td class="body"> <input type="text" name="title" value="<?PHP ECHO "$title"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Your Name: </td>
      <td height="25" class="body"> <input type="text" name="name" value="<?PHP ECHO "$name"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Avatar: </td>
      <td height="25" class="body"> <input type="text" name="avatar" value="<?PHP ECHO "$avatar"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body" valign="top">Update: </td>
      <td height="25" class="body"> <textarea name="update" cols="40" rows="8"><?PHP ECHO "$update"; ?></textarea> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Category: </td>
      <td height="25" class="body"> <select name="select2">
          <option name="<?PHP ECHO "$category"; ?>" value="<?PHP ECHO "$category"; ?>"><?PHP ECHO "$category"; ?></option>
          <option name="" value="">-------------------</option>
          <option name="fixed" value="fixed">fixed</option>
          <option name="added" value="added">added</option>
          <option name="working" value="working">working</option>
          <option name="changed" value="changed">changed</option>
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


$q="update `admin_updates` set `title`='$title', `name`='$name', `type`='$type, `avatar`='$avatar', `update`='$update', `date`='$date' where `update_id`='$update_id'"; 

$result= mysql_query($q) or die 
("Could not execute query : $q." . mysql_error()); 

    if ($result) { 
        echo "Update has been editted."; 
    } 

} 

//navigation code
        // create the dynamic links 
        if ($screen > 0) { 
        $j = $screen - 1; 
        $url = "$PHP_SELF?category=$category&page=$j"; 
        echo "<a href=\"$url\">&laquo;</a>";    // I replaced the Prev with the &laquo; which is << 
        } 
         
        // page numbering links now 
        $p = 5;                                // number of links to display per page 
        $lower = $p;                    // set the lower limit to $p 
        $upper = $screen+$p;        // set the upper limit to current page + number of links per page 
        while($upper>$pages){ 
            $p = $p-1; 
            $upper = $screen+$p; 
        } 
        if($p<$lower){ 
            $y = $lower-$p; 
            $to = $screen-$y; 
            while($to<0){ 
                $to++; 
            } 
        } 
         
        if(!empty($to)) 
        { 
            for ($i=$to;$i<$screen;$i++){ 
                $url = "$PHP_SELF?category=$category&page=$j" . $i; 
                $j = $i + 1; 
                echo " <a href=\"$url\">$j</a> "; 
            } 
        } 
         
        for ($i=$screen;$i<$upper;$i++) { 
            $url = "$PHP_SELF?category=$category&page=" . $i; 
            $j = $i + 1; 
            echo " <a href=\"$url\">$j</a> "; 
        } 
         
        if ($screen < $pages-1) { 
        $j = $screen + 1; 
        $url = "$PHP_SELF?category=$category&page=$j"; 
        echo "<a href=\"$url\">&raquo; </a>";   // I replaced the Next with the &raquo; which is >> 
        } 


?>

</td>
</tr>
</table>

<?php include("../foot.php"); ?>

<?php
}
?>