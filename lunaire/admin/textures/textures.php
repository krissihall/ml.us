<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php"); 

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="header">Edit/Delete Texture Entry</td>
  </tr>
  <tr>
    <td class="body">
     Please choose a texture to edit or delete <br />




<?php
	//if user was sent here from process page, add this error message
		if(isset($_GET['z'])){
			if ($_GET['z']=="added"){
				print "<em>Texture was added successfully.</em><br />";
			}
		} 
        
         

include('../connection.php'); 

echo "<table width=\"100%\" class=\"edit\">"; 

$query = "select * from `textures` order by tex_id desc"; 
$result= mysql_query($query, $connection) or die 
("Could not execute query : $query." . mysql_error());







while ($row=mysql_fetch_array($result)) 
{ 
    $tex_id=$row["tex_id"]; 
    $dimensions=$row["dimensions"]; 
    $file_size=$row["file_size"]; 
    $designer=$row["designer"];
    $thumb=$row["thumb"];  
    $download=$row["download"];




// if statement to display the thumbnails at the right dimensions
    echo "<tr> <td class=\"edit\">$tex_id</td><td class=\"edit\">$designer</td><td class=\"edit\" align=\"center\"><img src=\"$thumb\" /></td><td class=\"edit\"><a href=\"process.php?what=delete&tex_id=$tex_id\">Delete</a></td><td class=\"edit\"><a href=\"process.php?what=edit&tex_id=$tex_id\">Edit</a></td>"; } echo "</table>"; 



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
</td>
</tr>
</table>

<?php
include("../foot.php");
}
?>