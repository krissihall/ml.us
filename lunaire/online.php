<?php

$db=mysql_connect("localhost","mystica","92eB5C4!7") or die(mysql_error());
mysql_select_db("mystica_lunaire",$db);

$time        = time();
$clear_time  = $time - 600;
$update_time = $time - 30;
$ip          = $_SERVER['REMOTE_ADDR'];


$onQuery = mysql_query("SELECT ip FROM online WHERE ip = '".$ip."' LIMIT 1") or die(mysql_error());
$onCount = mysql_num_rows($onQuery);

if($onCount < 1) {
    
    mysql_query("INSERT INTO online (time, ip) VALUES (".$time.", '".$ip."')") or die(mysql_error());

} else {

    // Use the MySQL results of the query we created on the top of the script, this contains the table-time
    $onResults = mysql_fetch_assoc($onQuery);
    
    // $update_time contains the time of 30 seconds ago, if the table time is older, update the record.
    if($onResults['time'] < $update_time) {
        
        // Update time
        mysql_query("UPDATE online SET time = ".$time." WHERE ip = '”.$ip.”' LIMIT 1") or die(mysql_error());
    
    }

}

mysql_query("DELETE FROM online WHERE time < ".$clear_time) or die(mysql_error());

$coQuery = mysql_query("SELECT COUNT(ip) FROM online") or die(mysql_error());
list($coResult) = mysql_fetch_row($coQuery);

if($coResult == 1) {
    
    echo '1 visitor online';

}  else {

    echo $coResult.' visitors online.';            

}



?>