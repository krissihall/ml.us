<?php


include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {


include("../connection.php");
$query = "select * from admin_updates order by date desc";
$result= mysql_query($query, $connection) or die
("Could not execute query : $query." . mysql_error());



while ($row=mysql_fetch_array($result))
{
$update_id=$row["update_id"];
$category=$row["category"];
$title=$row["title"];
$update=$row["update"];
$name=$row["name"];
$avatar=$row["avatar"];
$date=$row["date"];

echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
       <tr><td class=\"header\">$title</td></tr>
       <tr><td class=\"body\"><img src=\"$avatar\" border=\"0\" align=\"left\" />Category: $category<br /><br />$update<br /><br />
    Posted by: $name on $date</td></tr></table><br />
";
}

}
?>