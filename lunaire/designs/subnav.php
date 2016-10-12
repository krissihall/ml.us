<!-- layout category jumpmenu start -->
<form name="type" class="float">
	<select name="selectURL" onChange="document.location.href=document.type.selectURL.options[document.type.selectURL.selectedIndex].value">
        <option>Type:</option>
    	<option value="http://lunaire.mysticallegends.com/designs/type.php?id=divs">divs</option>
    	<option value="http://lunaire.mysticallegends.com/designs/type.php?id=tables">tables</option>
    	<option value="http://lunaire.mysticallegends.com/designs/type.php?id=iframes">iframes</option>
        <option value="http://lunaire.mysticallegends.com/designs/index.php">latest</option>
	</select>
</form>
<!-- layout category jumpmenu end -->



<!-- series jumpmenu start -->
<form name="series" class="float">
	<select name="selectURL" onChange="document.location.href=document.series.selectURL.options[document.series.selectURL.selectedIndex].value">
    	        <option>Series:</option>
				<?php
					include("connection.php");
		
					//run the database query
					$query = "SELECT DISTINCT * FROM designs GROUP BY series";
					$result = mysql_query($query, $connection) or die ("Could not execute query $query" . mysql_error());
					
					//fetching database fields
					while ($row=mysql_fetch_array($result)) 
					{  
					$series=$row["series"]; 	
					
					//create a counting query
					$q = "SELECT COUNT(*) FROM designs WHERE series='$series'";		
					$count = mysql_fetch_array(mysql_query($q));
						
					?>
                <option value="series.php?id=<?php echo "$series"; ?>"><?php echo "$series"; ?> (<?php echo "$count[0]"; ?>)</option>
					<?php } ?>
	</select>
</form>
<!-- series jumpmenu end -->