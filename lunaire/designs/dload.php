<?php
include ('connection.php');

$id=$_GET['id'];

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
$query="SELECT * from designs where id='$id'";
$result= mysql_query($query) or die 
("Could not execute query : $query." . mysql_error());

while ($row=mysql_fetch_array($result))
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
header('Location: '.$download);

$query="update designs set dcount=dcount+1 where id='$id'";
$result= mysql_query($query) or die 
("Could not execute query : $query." . mysql_error());

}

} else {

//The referrer is not your site, we redirect to your home page
header("Location: http://lunaire.mysticallegends.com");
exit(); //Stop running the script

}
?> 