<?php require_once("/home/mystica/public_html/lunaire/wp-blog-header.php");?> 
<?php get_header(); ?>

<div class="header">Avatars</div>
<div class="body">
Newest icons are first on the list. Please remember to give proper credits when using these on your websites, forums, instant messengers, etc.
</div>
<div class="tfooter"><a href="index.php?section=100x100">100x100</a> | <a href="index.php?section=blank">Blank Bases</a></div>

<br />
<br />
<div>
<?php 

//calling the database connection files
include ('connection.php'); 

$section = $_GET['section'];

if(!isset($section)){
	$section = "100x100";
}

//running the database query
$query = "select * from avatars WHERE section='$section' order by icon_id desc"; 
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
$rows_per_page=20;         // number of records per page 
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
$icon_id=$row["icon_id"]; 
$designer=$row["designer"]; 
$characters=$row["characters"]; 
$series=$row["series"];
$file_size=$row["file_size"]; 
$url=$row["url"]; 
$date=$row["date"];



$size=round($file_size/1000);



//displaying the avatars
echo "<img src=\"$url\" id=\"icons\" alt=\"$icon_id | $size kb | $series | $characters | $designer | $date\"  title=\"$icon_id | $size kb | $series | $characters | $designer | $date\"/>";
}

{echo "</div> ";
}

// Counting the number of rows
$count = "select * from avatars WHERE section='$section'";
$result = mysql_query($count);
$num = mysql_num_rows($result);

echo "<div align=\"center\">There are <strong>$num</strong> avatar entries.</div>";


//navigation code
        // create the dynamic links 
        if ($screen > 0) { 
        $j = $screen - 1; 
        $url = "$PHP_SELF?section=$section&category=$category&page=$j"; 
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
                $url = "$PHP_SELF?section=$section&category=$category&page=$j" . $i; 
                $j = $i + 1; 
                echo " <a href=\"$url\">$j</a> "; 
            } 
        } 
         
        for ($i=$screen;$i<$upper;$i++) { 
            $url = "$PHP_SELF?section=$section&category=$category&page=" . $i; 
            $j = $i + 1; 
            echo " <a href=\"$url\">$j</a> "; 
        } 
         
        if ($screen < $pages-1) { 
        $j = $screen + 1; 
        $url = "$PHP_SELF?section=$section&category=$category&page=$j"; 
        echo "<a href=\"$url\">&raquo; </a>";   // I replaced the Next with the &raquo; which is >> 
        } 
?>
 

<?php get_footer(); ?> 