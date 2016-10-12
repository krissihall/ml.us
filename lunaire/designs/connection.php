<?PHP 
$hostname="localhost"; 
$user="mystica_lunaire"; 
$pass="luna9736"; 
$dbase="mystica_lunaire"; 
$connection = mysql_connect("$hostname" , "$user" , "$pass"); 
$db = mysql_select_db($dbase , $connection); 





$preview_frame = 'Y'; // Show a copyright frame if required.

$preview_copyright_frame_height = '90%'; // The height of the copyright frame.

$preview_frame_height = '10%';// The hight of the preview frame.
?>