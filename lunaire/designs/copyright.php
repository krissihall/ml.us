<?php

$design_id=$_GET['id'];

include ('connection.php');


//chooses which table in the layout to load from
$db_query="SELECT * from designs where id='$design_id' LIMIT 1";
$db_result= mysql_query($db_query) or die 
("Could not execute query : $db_query." . mysql_error());


//fetching database fields
while ($row=mysql_fetch_array($db_result)) 
{ 
$id=$row["id"]; 
$date=$row["date"]; 
$name=$row["name"]; 
$series=$row["series"]; 
$category=$row["category"]; 
$designer=$row["designer"];
$image=$row["image"];
$preview=$row["preview"]; 
$download=$row["download"]; 
$dcount=$row["dcount"]; 
$pcount=$row["pcount"];


// comment system
$result2 = mysql_query ("SELECT id FROM design_comments WHERE entry='$id'");
$num_rows = mysql_num_rows($result2);





// Begin HTML for the page
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Frameset//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>";

?>

<style>
<?php require_once("/home/mystica/public_html/lunaire/wp-blog-header.php");?> 
<?php get_style(); ?>
</style>

<?php

echo "
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
<title>
Previewing - $id: $name
</title>
</head>";






echo "<div class=\"preview\">
        <div class=\"pre_head\">Layout: $name | Series: $series | Added by $designer on $date</div>
           <div class=\"pre_body\"><a href=\"dload.php?id=$id\">Download</a> [ $dcount ]<br />
                                   :: Please read our Terms of Use before using them.<br />
                                   :: To use: click on the <strong>Download</strong> button above.<br />
                                   :: Do not remove any of the credit links from the layouts. </div>
      </div>

";

?> 

<?php
}
?>