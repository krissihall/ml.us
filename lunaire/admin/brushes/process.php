<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../connection.php");

$what=$_GET['what'];

if ($what=="delete") { 

$id=$_GET['brush'];

    $q="DELETE from brushes where brush_id='$id' LIMIT 1"; 
    $result = mysql_query($q); 
        //troubleshooting
           //print $q;
           //echo($result) ? "Query OK" : "Query Bad";
   
if ($result){ 
        header("Location:brushes.php?z=success"); 
    } /*else {
        header("Location:pngs.pnp?z=error");
    }*/
	
} //end delete
elseif ($what=="edit") { 

include("../head.php");

$id=$_GET['brush'];

    $query = "select * from brushes where brush_id='$id' LIMIT 1"; 
    $result= mysql_query($query, $connection) or die 
    ("Could not execute query : $query." . mysql_error()); 

while ($row=mysql_fetch_array($result)) 
{ 
    $brush_id=$row["brush_id"]; 
    $brush_name=$row["brush_name"]; 
    $number=$row["number"]; 
    $designer=$row["designer"];
    $thumb=$row["thumb"];  
    $zip=$row["zip"];  
    $date=$row["date"]; 
     
	 echo "<div class='header'>Edit $brush_name: $date</div>";
	 echo "<div class='body'>Please fill out the form completely before hitting submit<br />";
	 
?> 

<form action="process.php?what=submitedit&brush=<?PHP ECHO "$brush_id"; ?>" method="post">
  <table border="0" cellspacing="0" cellpadding="0" class="tables">
    <tr> 
      <td align="left" class="body">Name: </td>
      <td class="body"> <input type="text" name="brush_name" value="<?PHP ECHO "$brush_name"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body"># of Brushes: </td>
      <td height="25" class="body"> <input type="text" name="number" value="<?PHP ECHO "$number"; ?>" size="30"> 
      </td>
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
      <td height="25" align="left" class="body">ZIP: </td>
      <td height="25" class="body"> <input type="text" name="zip" value="<?PHP ECHO "$zip"; ?>" size="30"> 
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

$id=$_GET['brush'];

$brush_name = $_POST['brush_name'];
$number = $_POST['number'];
$designer = $_POST['designer'];
$thumb = $_POST['thumb'];
$zip = $_POST['zip'];

$q="update brushes set brush_name='$brush_name', number='$number', designer='$designer', thumb='$thumb', zip='$zip', date=NOW() where brush_id='$id'";  

	//troubleshooting
		//print $q;

$result= mysql_query($q) or die 
("Could not execute query : $q." . mysql_error()); 

    if ($result) { 
        header("Location:brushes.php?z=edit_success"); 
    } 

} //end submit edit

else {

	header("Location:brushes.php?z=nothing");

} //end something else

} //end check for user login


?>