<?php 
//fill in some basic info
$server = "localhost"; 
$db_user = "mystica"; 
$db_pass = "92eB5C4!7"; 
$database = "mystica_lunaire"; 
$timeoutseconds = 300; 

//get the time
$timestamp = time(); 
$timeout = $timestamp-$timeoutseconds; 

//connect to database
include('connection.php');

//insert the values
$insert = mysql_db_query($database, "INSERT INTO useronline VALUES
('$timestamp','$REMOTE_ADDR','$PHP_SELF')"); 
if(!($insert)) { 
print "Useronline Insert Failed > "; 
} 

//delete values when they leave
$delete = mysql_db_query($database, "DELETE FROM useronline WHERE timestamp<$timeout"); 
if(!($delete)) { 
print "Useronline Delete Failed > "; 
} 

//grab the results
$result = mysql_db_query($database, "SELECT DISTINCT ip FROM useronline WHERE file='$PHP_SELF'"); 
if(!($result)) { 
print "Useronline Select Error > "; 
} 

//number of rows = the number of people online
$user = mysql_num_rows($result); 


//spit out the results
mysql_close(); 
if($user == 1) { 
print("$user visitor online\n"); 
} else { 
print("$user visitors online\n"); 
} 
?>
