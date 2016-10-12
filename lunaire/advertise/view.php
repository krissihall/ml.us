<?php
include ('connection.php');

$ad_id=$_GET['ad_id'];

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
$query="SELECT * from advertise where ad_id='$ad_id'";
$result= mysql_query($query) or die 
("Could not execute query : $query." . mysql_error());

while ($row=mysql_fetch_array($result))
{
//fetching table fields 
$ad_id=$row["ad_id"]; 
$url=$row["url"]; 
$name=$row["name"];
$banner=$row["banner"];  
$date=$row["date"]; 
$viewed=$row["viewed"];
header('Location: '.$url);

$query="update advertise set viewed=viewed+1 where ad_id='$ad_id'";
$result= mysql_query($query) or die 
("Could not execute query : $query." . mysql_error());

}

} else {

//The referrer is not your site, we redirect to your home page
header("Location: http://lunaire.mysticallegends.com");
exit(); //Stop running the script

}
?> 