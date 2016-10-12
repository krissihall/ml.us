<?php
if (getenv('HTTP_X_FORWARDED_FOR'))
{
	$domain=getenv('HTTP_X_FORWARDED_FOR');
} 
else 
{
	$domain=getenv('REMOTE_ADDR');
}
//	$domain = GetHostByName($REMOTE_ADDR);
	$d1=date("Ymd");
	$connect = mysql_connect("localhost", "mystica", "92eB5C4!7") or die ("Check your server connection.");
	mysql_select_db ("mystica_lunaire");
//Check the IP and Date.
	$results=mysql_query ( "SELECT * FROM hit_counter WHERE iIP='$domain' and dDate='$d1'" );
	$num = mysql_num_rows ($results);
	if ( $num > 0 )
	{
		//echo "The IP  is already assigned.<br>";
		//exit;
	}
	else
	{
		$insert="INSERT INTO hit_counter (iID,iIP,dDate) VALUES ('','$domain','$d1')";
		$results = mysql_query($insert) or die(mysql_error());
	}
//Total visit
	$query="select count(*) from hit_counter";
	$result=mysql_query($query) or die(mysql_error()); 
	$querydata=mysql_fetch_row($result);
	$tot=$querydata[0];
	echo "Total: $tot<br />";	
//Curdate visitor.
	$query="select count(*) from hit_counter where dDate='$d1'";
	$result=mysql_query($query) or die(mysql_error()); 
	$querydata=mysql_fetch_row($result);
	$tot=$querydata[0];
	echo "Today: $tot<br />";
//Yesterdays visitors.


  //still trouble-shooting.
    $yesterday = date("Y-m-d", strtotime("-1 days")); 
    //echo "$yesterday<br/>";   

	$query2="select count(*) from hit_counter where dDate='$yesterday'";
	$result2=mysql_query($query2) or die(mysql_error()); 
	$querydata=mysql_fetch_row($result2);
	$yest=$querydata[0];
	echo "Yesterday: $yest";

?>