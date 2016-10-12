<?php require_once("/home/mystica/public_html/lunaire/wp-blog-header.php");?> 
<?php get_header(); ?>

<?php
include ('connection.php');

$keyword= $_POST['keyword'];
$query="SELECT * FROM avatars WHERE characters LIKE '%$keyword%' OR series LIKE '%$keyword%' OR designer LIKE '%$keyword%' ORDER BY 'id'"; 
$result= mysql_query($query, $connection) or die 
("Could not execute query : $query." . mysql_error()); 

$found=mysql_num_rows($result); // Number of rows found

echo"<div class=\"header\">Search Results</div><div class=\"body\">Your search for \"$keyword\". has found <b>$found</b> record(s):</div><br />";

//fetching database fields
while ($row=mysql_fetch_array($result)) 
{ 
$icon_id=$row["icon_id"]; 
$designer=$row["designer"]; 
$characters=$row["characters"]; 
$series=$row["series"]; 
$url=$row["url"]; 
$date=$row["date"];

//displaying the avatars
echo "<img src=\"$url\" id=\"icons\" alt=\"$icon_id | $series | $characters | $designer | $date\"  title=\"$icon_id | $series | $characters | $designer | $date\"/>";
}

{echo "</div> ";
}


echo"<br /><br />
Go back and <a href=\"javascript:history.go(-1)\">search again?</a>";
?>

<?php get_footer(); ?> 