<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php"); 

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="header">Edit/Delete Transparent PNG Entry</td>
  </tr>
  <tr>
    <td class="body">
     Please choose a transparent PNG to edit or delete <br />


        <?php
	//if user was sent here from process page, add this error message
		if(isset($_GET['z'])){
			if ($_GET['z']=="added"){
				print "<em>PNG was added successfully.</em><br />";
			}
		} ?>


        <?php
	//if user was sent here from process page, add this error message
		if(isset($_GET['z'])){
			if ($_GET['z']=="success"){
				print "<em>PNG was deleted successfully.</em><br />";
			}
		} ?>


        <?php
	//if user was sent here from process page, add this error message
		if(isset($_GET['z'])){
			if ($_GET['z']=="error"){
				print "<em>There was an error when you tried to delete entry<br />
                                       <?php echo mysql_error(); ?></em><br />";
			}
		} ?>


        <?php
	//if user was sent here from process page, add this error message
		if(isset($_GET['z'])){
			if ($_GET['z']=="error"){
				print "<em>This is not a real function.</em><br />";
			}
		} ?>

        <?php
	//if user was sent here from process page, add this error message
		if(isset($_GET['z'])){
			if ($_GET['z']=="edit_success"){
				print "<em>Your PNG has been editted successfully.</em><br />";
			}
		} ?>

<?PHP 

include('../connection.php'); 


echo "<table width=\"100%\" class=\"edit\">"; 

$query = "select * from `pngs` order by png_id desc"; 
$result= mysql_query($query, $connection) or die 
("Could not execute query : $query." . mysql_error());


/*
$screen = $_GET['screen']; 
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
*/


while ($row=mysql_fetch_array($result)) 
{ 
    $png_id=$row["png_id"]; 
    $series=$row["series"]; 
    $characters=$row["characters"]; 
    $dimensions=$row["dimensions"];
    $file_size=$row["file_size"];  
    $designer=$row["designer"];   
    $category=$row["category"];  
    $thumb=$row["thumb"];   
    $download=$row["download"];  
    $date=$row["date"]; 

    echo "<tr> <td class=\"edit\">$png_id</td><td class=\"edit\">$designer</td><td class=\"edit\" align=\"center\"><img src=\"$thumb\" width=\"75\" height=\"75\" border=\"0\" /></td><td class=\"edit\"><a href=\"process.php?what=delete&png=$png_id\">Delete</a></td><td class=\"edit\"><a href=\"process.php?what=edit&png_id=$png_id\">Edit</a></td>"; } echo "</table>"; 
	

/*
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
*/
	
	?>
	
 </td></tr></table>
 <?php include("../foot.php"); 
       }
  ?>