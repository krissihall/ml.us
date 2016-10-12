<?php 

//calling the database connection files
include ('connection.php'); 

//running the database query
$query = "select * from advertise order by rand() limit 1"; 
$result= mysql_query($query, $connection) or die 
("Could not execute query : $query." . mysql_error()); 

//fetching database fields
while ($row=mysql_fetch_array($result)) 
{ 
$ad_id=$row["ad_id"]; 
$url=$row["url"]; 
$name=$row["name"];
$banner=$row["banner"];  
$date=$row["date"]; 
$viewed=$row["viewed"];

//displaying the advertisement
echo "<a href=\"http://lunaire.mysticallegends.com/advertise/view.php?ad_id=$ad_id\" target=\"_blank\">
<img src=\"$banner\" width=\"300\" height=\"51\" border=\"0\" alt=\"$name\" /></a>" ;
}

?>