<?php 
session_start();
include("connection.php");

$q="SELECT * from admin_login where username='$username' and pw='$pw'";
$result= mysql_query($q, $connection) or die
("Could not execute query : $q." . mysql_error());

if (mysql_num_rows($result) == 0)
{

echo "<div align=center><b>Oops! Your login is wrong. Please click back and try again.</b></div>";

}
else 
{
$r=mysql_fetch_array($result);
$login_username=$r["username"];
session_register("login_username");
Header("Location: index.php");
}
?>
