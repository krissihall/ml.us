<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../connection.php");

$what=$_GET['what'];

if ($what=="delete") { 

$id=$_GET['ad'];

    $q="DELETE from advertise where ad_id='$id' LIMIT 1"; 
    $result = mysql_query($q); 
        //troubleshooting
           //print $q;
           //echo($result) ? "Query OK" : "Query Bad";
   
if ($result){ 
        header("Location:advertise.php?z=success"); 
    } /*else {
        header("Location:pngs.pnp?z=error");
    }*/
	
} //end delete
elseif ($what=="edit") { 

include("../head.php");

$id=$_GET['ad'];

    $query = "select * from advertise where ad_id='$id' LIMIT 1"; 
    $result= mysql_query($query, $connection) or die 
    ("Could not execute query : $query." . mysql_error()); 

while ($row=mysql_fetch_array($result)) 
{ 
    $ad_id=$row["ad_id"]; 
    $url=$row["url"]; 
    $name=$row["name"]; 
    $banner=$row["banner"];
    $date=$row["date"];  
    $viewed=$row["viewed"];  
     
	 echo "<div class='header'>Edit $name: $date</div>";
	 echo "<div class='body'>Please fill out the form completely before hitting submit<br />";
	 
?> 

<form action="process.php?what=submitedit&ad=<?PHP ECHO "$ad_id"; ?>" method="post">
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
    <tr> 
      <td height="25" align="left" class="body">Banner: </td>
      <td height="25" class="body"> <input type="text" name="banner" value="<?PHP ECHO "$banner"; ?>" size="30"> 
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

$id=$_GET['ad'];

$name = $_POST['name'];
$url = $_POST['url'];
$banner = $_POST['banner'];


$q="update advertise set name='$name', url='$url', banner='$banner', date=NOW() where ad_id='$id'";  

	//troubleshooting
		//print $q;

$result= mysql_query($q) or die 
("Could not execute query : $q." . mysql_error()); 

    if ($result) { 
        header("Location:advertise.php?z=edit_success"); 
    } 

} //end submit edit

else {

	header("Location:advertise.php?z=nothing");

} //end something else

} //end check for user login


?>