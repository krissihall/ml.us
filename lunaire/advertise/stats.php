<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
  <td class="out_head">ID:</td>
  <td class="out_head">Name:</td>
  <td class="out_head">Banner:</td>
  <td class="out_head">Added:</td>
  <td class="out_head">Hits:</td>
</tr>

<?php 

//calling the database connection files
include ('connection.php'); 

//running the database query
$query = "select * from advertise order by ad_id"; 
$result= mysql_query($query, $connection) or die 
("Could not execute query : $query." . mysql_error()); 

//for the navigation
$screen = $_GET['page']; 
$PHP_SELF = $_SERVER['PHP_SELF']; 
$rows_per_page=10;         // number of records per page 
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
$ad_id=$row["ad_id"]; 
$url=$row["url"]; 
$name=$row["name"];
$banner=$row["banner"];  
$date=$row["date"]; 
$viewed=$row["viewed"];

//displaying the entries
echo "<tr><td class=\"out_body\">$ad_id</td>
      <td class=\"out_body\"><a href=\"http://lunaire.mysticallegends.com/advertise/view.php?ad_id=$ad_id\" target=\"_blank\">$name</a></td>
      <td class=\"out_body\"><img src=\"$banner\" border=\"0\" width=\"150\" height=\"26\" /></td>
      <td class=\"out_body\">$date</td>
      <td class=\"out_body\">[ $viewed ]</td></tr>";
}

{echo "</table>";
}

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