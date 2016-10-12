<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../connection.php");

$what=$_GET['what'];

if ($what=="delete") { 

$id=$_GET['design'];

    $q="DELETE from designs where id='$id' LIMIT 1"; 
    $result = mysql_query($q); 
        //troubleshooting
           //print $q;
           //echo($result) ? "Query OK" : "Query Bad";
   
if ($result){ 
        header("Location:designs.php?z=success"); 
    } /*else {
        header("Location:pngs.pnp?z=error");
    }*/
	
} //end delete
elseif ($what=="edit") { 

include("../head.php");

$id=$_GET['design'];

    $query = "select * from designs where id='$id' LIMIT 1"; 
    $result= mysql_query($query, $connection) or die 
    ("Could not execute query : $query." . mysql_error()); 

while ($row=mysql_fetch_array($result)) 
{ 
    $id=$row["id"]; 
    $date=$row["date"]; 
    $name=$row["name"]; 
    $series=$row["series"];
    $category=$row["category"];  
    $designer=$row["designer"];  
    $image=$row["image"];   
    $preview=$row["preview"];  
    $download=$row["download"]; 
    $pcount=$row["pcount"]; 
    $dcount=$row["dcount"]; 
     
	 echo "<div class='header'>Edit $name: $date</div>";
	 echo "<div class='body'>Please fill out the form completely before hitting submit<br />";
	 
?> 

<form action="process.php?what=submitedit&design=<?PHP ECHO "$id"; ?>" method="post">
  <table border="0" cellspacing="0" cellpadding="0" class="tables">
    <tr> 
      <td align="left" class="body">Name: </td>
      <td class="body"> <input type="text" name="name" value="<?PHP ECHO "$name"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Series: </td>
      <td height="25" class="body"> <input type="text" name="series" value="<?PHP ECHO "$series"; ?>" size="30"> 
      </td>
    <tr> 
      <td height="25" align="left" class="body">Category: </td>
      <td height="25" class="body"> <select name="category">
      									<option value="<?php echo $category; ?>" name="<?php echo $category; ?>"><?php echo $category; ?></option>
                                        <option>-----</option>
      									<option value="tables">Tables</option>
                                        <option value="divs">Div Layers</option>
                                        <option value="iframes">iFrames</option>
      								</select>
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Thumbnail: </td>
      <td height="25" class="body"> <input type="text" name="image" value="<?PHP ECHO "$image"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Preview: </td>
      <td height="25" class="body"> <input type="text" name="preview" value="<?PHP ECHO "$preview"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">ZIP: </td>
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
echo "</div>";
	} //end edit while loop

include("../foot.php");

} //end edit
elseif ($what=="submitedit") { 

$id=$_GET['design'];

$name = $_POST['name'];
$series = $_POST['series'];
$category = $_POST['category'];
$image = $_POST['image'];
$preview = $_POST['preview'];
$download = $_POST['download'];

$q="update designs set name='$name', series='$series', category='$category', image='$image', preview='$preview', download='$download', date=NOW() where id='$id'";  

	//troubleshooting
		//print $q;

$result= mysql_query($q) or die 
("Could not execute query : $q." . mysql_error()); 

    if ($result) { 
        header("Location:designs.php?z=edit_success"); 
    } 

} else if ($what=="commentdelete"){

$id=$_GET['id'];

    $q="DELETE from design_comments where id='$id' LIMIT 1"; 
    $result = mysql_query($q); 
        //troubleshooting
           //print $q;
           //echo($result) ? "Query OK" : "Query Bad";
   
if ($result){ 
        header("Location:comments.php?z=success"); 
    } /*else {
        header("Location:pngs.pnp?z=error");
    }*/
	
} //end delete
elseif ($what=="commentedit") { 

include("../head.php");

$id=$_GET['id'];

    $query = "select * from design_comments where id='$id' LIMIT 1"; 
    $result= mysql_query($query, $connection) or die 
    ("Could not execute query : $query." . mysql_error()); 

while ($row=mysql_fetch_array($result)) 
{ 
    $id=$row["id"]; 
    $name=$row["name"]; 
    $entry=$row["entry"]; 
    $email=$row["email"];
    $url=$row["url"];  
    $comment=$row["comment"];  
    $timestamp=$row["timestamp"]; 
     
	 echo "<div class='header'>Edit $name: $timestamp</div>";
	 echo "<div class='body'>Please fill out the form completely before hitting submit<br />";
	 
?> 

<form action="process.php?what=commentsubmit&id=<?PHP ECHO "$id"; ?>" method="post">
  <table border="0" cellspacing="0" cellpadding="0" class="tables">
    <tr> 
      <td align="left" class="body">Name: </td>
      <td class="body"> <input type="text" name="name" value="<?PHP ECHO "$name"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Email: </td>
      <td height="25" class="body"> <input type="text" name="email" value="<?PHP ECHO "$email"; ?>" size="30"> 
      </td>
    <tr> 
      <td height="25" align="left" class="body">url: </td>
      <td height="25" class="body"> <input type="text" name="url" value="<?PHP ECHO "$url"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Comment: </td>
      <td height="25" class="body"><textarea name="comment"><?php echo $comment; ?></textarea> 
      </td>
    </tr>
    <tr>
      <td class="body">&nbsp;</td>
      <td class="body"><input type="submit" name="submit" value="Submit" class="input"></td>
    </tr>
  </table>
</form>

<?PHP 
echo "</div>";
	} //end edit while loop

include("../foot.php");

} //end edit
elseif ($what=="commentsubmit") { 

$id=$_GET['design'];

$email = $_POST['email'];
$name = $_POST['name'];
$url = $_POST['url'];
$comment = $_POST['comment'];

$q="update design_comments set name='$name', email='$email', url='$url', comment='$comment' where id='$id'";  

	//troubleshooting
		//print $q;

$result= mysql_query($q) or die 
("Could not execute query : $q." . mysql_error()); 

    if ($result) { 
        header("Location:comments.php?z=edit_success"); 
    } 


} //end submit edit

else {

	header("Location:designs.php?z=nothing");

} //end something else

} //end check for user login


?>