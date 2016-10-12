<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../connection.php");

$what=$_GET['what'];

if ($what=="delete") { 

$id=$_GET['png'];

    $q="DELETE from pngs where png_id='$id' LIMIT 1"; 
    $result = mysql_query($q); 
        //troubleshooting
           //print $q;
           //echo($result) ? "Query OK" : "Query Bad";
   
if ($result){ 
        header("Location:pngs.php?z=success"); 
    } /*else {
        header("Location:pngs.pnp?z=error");
    }*/
	
} //end delete
elseif ($what=="edit") { 

include("../head.php");

$id=$_GET['png_id'];

    $query = "select * from pngs where png_id='$id' LIMIT 1"; 
    $result= mysql_query($query, $connection) or die 
    ("Could not execute query : $query." . mysql_error()); 

while ($row=mysql_fetch_array($result)) 
{ 
    $png_id=$row["png_id"]; 
    $series=$row["series"]; 
    $characters=$row["characters"]; 
    $dimensions=$row["dimensions"];
    $file_size=$row["file_size"];  
    $designer=$row["designer"];   
    $category=$row["category"];  
    $thumb=$row["thumb"];   
    $download=$row["download"];  
    $date=$row["date"];  
     
	 echo "<div class='header'>Edit $series: $characters</div>";
	 echo "<div class='body'>Please fill out the form completely before hitting submit<br />";
	 
?> 

<form action="process.php?what=submitedit&png_id=<?PHP ECHO "$png_id"; ?>" method="post">
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
      <td height="25" align="left" class="body">Dimensions: </td>
      <td height="25" class="body"> <input type="text" name="dimensions" value="<?PHP ECHO "$dimensions"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">File Size: </td>
      <td height="25" class="body"> <input type="text" name="file_size" value="<?PHP ECHO "$file_size"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Thumbnail: </td>
      <td height="25" class="body"> <input type="text" name="thumb" value="<?PHP ECHO "$thumb"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Designer: </td>
      <td height="25" class="body"> <input type="text" name="designer" value="<?PHP ECHO "$designer"; ?>" size="30"> 
      </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Category: </td>
      <td height="25" class="body"> <select name="category">
          <option name="<?PHP ECHO "$category"; ?>" value="<?PHP ECHO "$category"; ?>"><?PHP ECHO "$category"; ?></option>
          <option name="" value="">-------------------</option>
          <option name="anime" value="anime">anime</option>
          <option name="actor" value="actor">actor</option>
          <option name="nature" value="nature">nature</option>
          <option name="model" value="model">model</option>
          <option name="game" value="game">game</option>
        </select> </td>
    </tr>
    <tr> 
      <td height="25" align="left" class="body">Download URL: </td>
      <td height="25" class="body"> <input type="text" name="download" value="<?PHP ECHO "$download"; ?>" size="30"> 
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
echo "</div>";
	} //end edit while loop

include("../foot.php");

} //end edit
elseif ($what=="submitedit") { 

$id=$_GET['png_id'];

$series = $_POST['series'];
$characters = $_POST['characters'];
$dimensions = $_POST['dimensions'];
$category = $_POST['category'];
$file_size = $_POST['file_size'];
$thumb = $_POST['thumb'];
$download = $_POST['download'];
$date = $_POST['date'];
$designer = $_POST['designer'];


$q="update pngs set series='$series', characters='$characters', dimensions='$dimensions', category='$category', file_size='$file_size', thumb='$thumb', designer='$designer', download='$download', date='$date' where png_id='$id'";  

	//troubleshooting
		//print $q;

$result= mysql_query($q) or die 
("Could not execute query : $q." . mysql_error()); 

    if ($result) { 
        header("Location:pngs.php?z=edit_success"); 
    } 

} //end submit edit

else {

	header("Location:pngs.php?z=nothing");

} //end something else

} //end check for user login


?>