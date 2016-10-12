<?php require_once("/home/mystica/public_html/lunaire/wp-blog-header.php");?> 
<?php get_header(); ?>

<div class="header">Brushes</div>
<div class="body">
These brushes are for personal use <strong>ONLY</strong>. Please do not post these for people to download on your website, journal, forum, etc. The newest brushes are the ones at the top part of the page. These brushes were made for and with Photoshop.
</div>

<br />


<?php 

//calling the database connection files
include ('connection.php'); 

//running the database query
$query = "select * from brushes order by brush_id desc"; 
$result= mysql_query($query, $connection) or die 
("Could not execute query : $query." . mysql_error()); 

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
$brush_id=$row["brush_id"]; 
$brush_name=$row["brush_name"]; 
$number=$row["number"]; 
$designer=$row["designer"]; 
$thumb=$row["thumb"]; 
$zip=$row["zip"]; 
$date=$row["date"];
$dcount=$row["dcount"];

//displaying the avatars
echo "<table class=\"table\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
  <tr>
    <td class=\"header\">Brush: $brush_name</td>
  </tr>
  <tr>
    <td class=\"body\">
     <table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"2\">
      <tr>
        <td width=\"275\"><img src=\"$thumb\" width=\"275\" height=\"100\" border=\"0\" align=\"left\" /></td>
        <td valign=\"middle\">Number of Brushes: $number<br />
            Designer: $designer<br />
            Added on: $date<br />
            Downloaded - [ $dcount ]</td>
      </tr>
    </table>
   </td>
  </tr>
  <tr>
    <td class=\"tfooter\">[ <a href=\"dload.php?brush_id=$brush_id\">Download</a> ]</td>
  </tr>
</table>
<br />";
}

// Counting the number of rows
$count = "select * from brushes ";
$result = mysql_query($count);
$num = mysql_num_rows($result);

echo "<div align=\"center\">There are <strong>$num</strong> Photoshop brush entries.</div>";


//navigation code
        // create the dynamic links 
        if ($screen > 0) { 
        $j = $screen - 1; 
        $url = "$PHP_SELF?category=$category&page=$j"; 
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
                $url = "$PHP_SELF?category=$category&page=$j" . $i; 
                $j = $i + 1; 
                echo " <a href=\"$url\">$j</a> "; 
            } 
        } 
         
        for ($i=$screen;$i<$upper;$i++) { 
            $url = "$PHP_SELF?category=$category&page=" . $i; 
            $j = $i + 1; 
            echo " <a href=\"$url\">$j</a> "; 
        } 
         
        if ($screen < $pages-1) { 
        $j = $screen + 1; 
        $url = "$PHP_SELF?category=$category&page=$j"; 
        echo "<a href=\"$url\">&raquo; </a>";   // I replaced the Next with the &raquo; which is >> 
        } 
?>


<?php get_footer(); ?> 