<?PHP 
$hostname="localhost"; 
$user="mystica_lunaire"; 
$pass="luna9736"; 
$dbase="mystica_lunaire"; 
$connection = mysql_connect("$hostname" , "$user" , "$pass"); 
$db = mysql_select_db($dbase , $connection); 
?>