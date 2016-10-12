<?php

include("../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../main.php");
} else {

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>|| ~ Administration Panel ~ ||</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="expand.js"></script>
</head>

<body>
<div id="wrapper">
  <div id="head"><table width="780" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/layout_01.png" width="782" height="79" /></td>
  </tr>
  <tr>
    <td><img src="images/layout_02.png" width="782" height="79" /></td>
  </tr>
  <tr>
    <td><img src="images/layout_03.png" width="782" height="79" /></td>
  </tr>
  <tr>
    <td><img src="images/layout_04.png" width="782" height="79" /></td>
  </tr>
  <tr>
    <td><img src="images/layout_05.png" width="782" height="79" /></td>
  </tr>
  <tr>
    <td><img src="images/layout_06.png" width="782" height="79" /></td>
  </tr>
</table>
</div>
  <div id="content">
  <table width="100%">
  <tr>
  <td>
    <div id="navi"><?php include("side.php"); ?></div>
    <div id="body">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="header">Welcome</td>
  </tr>
  <tr>
    <td class="body">This is the Control Panel for Lunaire. Use the links on the side of the layout to navigate through the cpanel.</td>
  </tr>
</table>

<br />

<div>
<?php

include("../connection.php");
$query = "select * from admin_updates order by date desc";
$result= mysql_query($query, $connection) or die
("Could not execute query : $query." . mysql_error());



while ($row=mysql_fetch_array($result))
{
$update_id=$row["update_id"];
$category=$row["category"];
$title=$row["title"];
$update=$row["update"];
$name=$row["name"];
$avatar=$row["avatar"];
$date=$row["date"];

echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
       <tr><td class=\"header\">$title</td></tr>
       <tr><td class=\"body\"><img src=\"$avatar\" border=\"0\" align=\"left\" />Category: $category<br /><br />$update<br /><br />
    Posted by: $name on $date</td></tr></table><br />
";
}
?>
</div>

</div>
    </td>
    </tr>
    </table>
  </div>
</div>
  <div id="bottom"></div>
</body>
</html>

<?php
}
?>