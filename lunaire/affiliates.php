<?php 

//calling the database connection files
include ('connection.php'); 

//running the database query
$query = "select * from `links` where genre='affiliate' order by 'link_id' desc "; 
$result= mysql_query($query, $connection) or die 
("Could not execute query : $query." . mysql_error()); 

//fetching database fields
while ($row=mysql_fetch_array($result)) 
{ 
$link_id=$row["link_id"]; 
$banner=$row["banner"]; 
$name=$row["name"]; 
$genre=$row["genre"]; 
$url=$row["url"];  
$date=$row["date"]; 
$dcount=$row["dcount"];

//displaying the affiliates
echo "<a href=\"http://lunaire.mysticallegends.com/links/click.php?link_id=$link_id\" target=\"_blank\"><img src=\"$banner\" width=\"88\" height=\"31\" border=\"0\" /> ";
}

?>