<?php

//calling the database connection files
include ('connection.php'); 




//calling the math function (class)
require_once 'func_math.php';


// Counting the number of rows
$count = "select * from avatars WHERE section='100x100'";
$result = mysql_query($count);
$num = mysql_num_rows($result);

echo "<label class=\"label\">Avatars:</label><label class=\"count\">$num</label><br />";

// Counting the number of rows
$count = "select * from avatars WHERE section='blank'";
$result = mysql_query($count);
$num7 = mysql_num_rows($result);

echo "<label class=\"label\">Bases:</label><label class=\"count\">$num7</label><br />";

// Counting the number of rows
$count = "select * from brushes";
$result = mysql_query($count);
$num2 = mysql_num_rows($result);

echo "<label class=\"label\">Brushes:</label><label class=\"count\">$num2</label><br />";

// Counting the number of rows
$count = "select * from designs";
$result = mysql_query($count);
$num3 = mysql_num_rows($result);

echo "<label class=\"label\">Designs:</label><label class=\"count\">$num3</label><br />";

// Counting the number of rows
$count = "select * from pngs";
$result = mysql_query($count);
$num4 = mysql_num_rows($result);

echo "<label class=\"label\">PNGs:</label><label class=\"count\">$num4</label><br />";

// Counting the number of rows
$count = "select * from textures";
$result = mysql_query($count);
$num5 = mysql_num_rows($result);

echo "<label class=\"label\">Textures:</label><label class=\"count\">$num5</label><br />";

// Counting the number of rows
$count = "select * from tutorials";
$result = mysql_query($count);
$num6 = mysql_num_rows($result);

echo "<label class=\"label\">Tutorials:</label><label class=\"count\">$num6</label><br />";




$obj_math = new math();

$sum = $obj_math->add($num, $num7, $num2, $num3, $num4, $num5, $num6);

echo "<label class=\"label\">Total:</label><label class=\"count\">$sum</label>";

?>