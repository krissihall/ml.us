<?php
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

//chooses which table in the brushes to load from
$query="SELECT * from brushes where brush_id='$brush_id'";
$result= mysql_query($query) or die 
("Could not execute query : $query." . mysql_error());

while ($row=mysql_fetch_array($result))
{
//fetching table fields 
$brush_id=$row["brush_id"]; 
$brush_name=$row["brush_name"]; 
$number=$row["number"]; 
$designer=$row["designer"]; 
$thumb=$row["thumb"]; 
$zip=$row["zip"]; 
$date=$row["date"];
$dcount=$row["dcount"];
header('Location: '.$zip);

$query="update brushes set dcount=dcount+1 where brush_id='$brush_id'";
$result= mysql_query($query) or die 
("Could not execute query : $query." . mysql_error());

}

} else {

//The referrer is not your site, we redirect to your home page
header("Location: http://lunaire.mysticallegends.com");
exit(); //Stop running the script

}
?> 