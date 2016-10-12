<?php require_once("/home/mystica/public_html/lunaire/wp-blog-header.php");?> 
<?php get_header(); ?>

<?php

include('connection.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid ID specified.");
}

$id = (int)$_GET['id'];
$sql = "SELECT * FROM designs WHERE id='$id' LIMIT 1";













//running the database query
$query = "select * from designs where id='$id'"; 
$result= mysql_query($query, $connection) or die 
("Could not execute query : $query." . mysql_error());


//fetching database fields
while ($row=mysql_fetch_array($result)) 
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



//displaying the layouts
echo "<table class=\"table\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
  <tr>
    <td class=\"header\">Layout: $name</td>
  </tr>
  <tr>
    <td class=\"body\">
     <table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"2\">
      <tr>
        <td width=\"200\"><img border=\"0\" src=\"$image\" align=\"left\" width=\"200\" height=\"150\" /></td>
        <td valign=\"middle\">Series: $series<br />
            Designer: $designer<br />
            Type: $category<br />
            Added on: $date<br />
            Viewed - [ $pcount ]<br />
            Downloaded - [ $dcount ]<br />
            <a href=\"comments.php?id=".$id."\">".$num_rows." comments</a>
            </td>
      </tr>
    </table>
   </td>
  </tr>
  <tr>
    <td class=\"tfooter\">[ <a href=\"pview.php?id=$id\" target=\"_blank\">Preview</a> ] | [ <a href=\"dload.php?id=$id\" target=\"_blank\">Download</a> ]</td>
  </tr>
</table>
<br />"; 
} 















$result = mysql_query($sql) or print ("Can't select entry from table 'designs'.<br />" . $sql . "<br />" . mysql_error());

//$timestamp = strtotime("now");

$sql = "SELECT * FROM design_comments WHERE entry='$id' ORDER BY timestamp";
$result = mysql_query ($sql) or print ("Can't select comments from table design_comments.<br />" . $sql . "<br />" . mysql_error());
while($row = mysql_fetch_array($result)) {
    $timestamp = date("l F d Y");
    printf("<br />");
    print("<div class=\"body\">" . stripslashes($row['comment']) . "</div>");
    printf("<div class=\"tfooter\">Comment by <a href=\"%s\">%s</a> @ %s</div>", stripslashes($row['url']), stripslashes($row['name']), $timestamp);
    printf("<br />");
}
?>

<form method="post" action="process.php">

<input type="hidden" name="entry" id="entry" value="<?php echo $id; ?>" />
<!-- <input type="hidden" name="timestamp" id="timestamp" value="<?php echo $timestamp; ?>"> -->

<table border="0" cellpadding="2" cellspacing="2" width="100%">
<tr>
<td>Name:</td>
<td><input type="text" name="name" id="name" size="25" /></td>
</tr>
<tr>
<td>E-mail:</td>
<td><input type="text" name="email" id="email" size="25" /></td>
</tr>
<tr>
<td>URL:</td>
<td><input type="text" name="url" id="url" size="25" value="http://" /></td>
</tr>
<tr>
<td>Comment:</td>
<td><textarea cols="25" rows="5" name="comment" id="comment"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit_comment" id="submit_comment" value="Add Comment" /></td>
</tr>
</table>

</form>


<?php get_footer(); ?>