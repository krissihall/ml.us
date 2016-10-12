<?php

$design_id=$_GET['id'];

include ('connection.php');

//prevent outside site leeching
$yoursite = "lunaire.mysticallegends.com"; //subdomain
$yoursite2 = "mysticallegends.com/lunaire"; //site without www.
$yoursite3 = "www.mysticallegends.com/lunaire"; //site with www.

$referer = $_SERVER['HTTP_REFERER'];

//Check if browser sends referrer url or not
if ($referer == "") { //If not, set referrer as your domain
$domain = $yoursite;
} else {
$domain = parse_url($referer); //If yes, parse referrer
}

if($domain['host'] == $yoursite || $domain['host'] == $yoursite2 || $domain['host'] == $yoursite3) {


//chooses which table in the layout to load from
$db_query="SELECT * from designs where id='$design_id' LIMIT 1";
$db_result= mysql_query($db_query) or die 
("Could not execute query : $db_query." . mysql_error());

while ($row=mysql_fetch_array($db_result))
{
//fetching table fields 
$id=$row["id"]; 
$date=$row["date"]; 
$name=$row["name"]; 
$series=$row["series"]; 
$category=$row["category"]; 
$designer=$row["designer"];
$image=$row["image"];
$preview=$row["preview"]; 
$download=$row["download"]; 
$dcount=$row["dcount"]; 
$pcount=$row["pcount"];

//the counter
$db2_query="update designs set pcount=pcount+1 where id='$id'";
$db2_result= mysql_query($db2_query) or die 
("Could not execute query : $db2_query." . mysql_error());


}

if ($preview_frame == 'Y') {

echo "<frameset rows=\"$preview_copyright_frame_height,$preview_frame_height\" FRAMEBORDER=\"NO\" FRAMESPACING=\"0\" BORDER=\"0\">
<frame src=\"$preview\" noresize=\"noresize\">
<frame src=\"copyright.php?id=$id\" noresize=\"noresize\"></frameset>";


}

else

{

header ("Location: $preview");

}



} else {

//If the referrer is not the site, we redirect to your home page
header("Location: http://lunaire.mysticallegends.com");
exit(); //Stop running the script

?> 

<?php
}
?>