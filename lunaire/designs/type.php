<?php require_once("/home/mystica/public_html/lunaire/wp-blog-header.php");?> 
<?php get_header(); ?>
<?php

$sort = $_GET['id'];

?>


<div class="header">Website Layouts</div>
<div class="body">
Newest layouts are first on the list. Please remember to give proper credits when using these on your websites.
</div>
<div class="tfooter"><?php include("subnav.php"); ?></div>

<p><br />

<?php 

//calling the database connection files
include ('connection.php'); 

//running the database query
$query = "select * from designs where category='$sort' order by id desc"; 
$result= mysql_query($query, $connection) or die 
("Could not execute query : $query." . mysql_error());

echo "<form action=\"results.php\" method=\"post\">
<center>
<b>Enter Keyword:</b>
<input type=\"text\" name=\"keyword\" size=\"20\" class=\"form\">
<input type=\"submit\" value=\"Search\" class=\"form\">
</center>
</form><br />";

//for the navigation
$screen = $_GET['page']; 
$PHP_SELF = $_SERVER['PHP_SELF']; 
$rows_per_page=7;         // number of records per page 
$total_records=mysql_num_rows($result); 
$pages = ceil($total_records / $rows_per_page);        // calculate number of pages required 

if (!isset($screen)) 
$screen=0; 
$start = $screen * $rows_per_page;        // determine start record 
$query .= " LIMIT $start, $rows_per_page";
$result= mysql_db_query($dbase, $query, $connection) or die
("Could not execute query : $q." . mysql_error()); 

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
            Downloaded - [ $dcount ]</td>
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

//navigation code
        // create the dynamic links 
        if ($screen > 0) { 
        $j = $screen - 1; 
        $url = "$PHP_SELF?id=$sort&category=$category&page=$j"; 
        echo "<a href=\"$url\">&laquo;</a>";    // I replaced the Prev with the &laquo; which is << 
        } 
         
        // page numbering links now 
        $p = 5;                                // number of links to display per page 
        $lower = $p;                    // set the lower limit to $p 
        $upper = $screen+$p;        // set the upper limit to current page + number of links per page 
        while($upper>$pages){ 
            $p = $p-1; 
            $upper = $screen+$p; 
        } 
        if($p<$lower){ 
            $y = $lower-$p; 
            $to = $screen-$y; 
            while($to<0){ 
                $to++; 
            } 
        } 
         
        if(!empty($to)) 
        { 
            for ($i=$to;$i<$screen;$i++){ 
                $url = "$PHP_SELF?id=$sort&category=$category&page=$j" . $i; 
                $j = $i + 1; 
                echo " <a href=\"$url\">$j</a> "; 
            } 
        } 
         
        for ($i=$screen;$i<$upper;$i++) { 
            $url = "$PHP_SELF?id=$sort&category=$category&page=" . $i; 
            $j = $i + 1; 
            echo " <a href=\"$url\">$j</a> "; 
        } 
         
        if ($screen < $pages-1) { 
        $j = $screen + 1; 
        $url = "$PHP_SELF?id=$sort&category=$category&page=$j"; 
        echo "<a href=\"$url\">&raquo; </a>";   // I replaced the Next with the &raquo; which is >> 
        } 
?>


<?php get_footer(); ?> 