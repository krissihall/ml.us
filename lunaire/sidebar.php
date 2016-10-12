<div class="lbg">
<div class="head">Calendar</div>
<div class="links" align="center"><center><?php get_calendar(); ?></center>
<br />
<?php include("counter.php") ?><br /><br />
<?php include("stats/stats.php") ?><br />
IP: <?php $ip=$_SERVER['REMOTE_ADDR']; echo "$ip"; ?>
</div>
</div>
<p>&nbsp;</p>

<div class="lbg">
<div class="head">Browse</div>
<div class="links">
<a href="http://lunaire.mysticallegends.com/index.php" class="luna">Main</a>
<a href="http://lunaire.mysticallegends.com/related.php" class="luna">Site Related</a>
<a href="http://lunaire.mysticallegends.com/wp-admin/" class="luna">Admin</a>
<a href="http://lunaire.mysticallegends.com/admin/admin.php" class="luna">CPanel</a>
</div>
</div>
<p>&nbsp;</p>

<div class="lbg">
<div class="head">Content</div>
<div class="links">
<a href="http://lunaire.mysticallegends.com/terms.php" class="luna">Terms of Usage</a>
<a href="http://lunaire.mysticallegends.com/designs/index.php" class="luna">Layouts</a>
<a href="http://lunaire.mysticallegends.com/avatars/index.php?section=100x100" class="luna">Icons</a>
<a href="http://lunaire.mysticallegends.com/brushes/index.php" class="luna">Brushes</a>
<a href="http://lunaire.mysticallegends.com/textures/index.php" class="luna">Textures</a>
<a href="http://lunaire.mysticallegends.com/pngs/index.php" class="luna">Transparent PNGs</a>
<a href="http://lunaire.mysticallegends.com/tutorial/index.php" class="luna">Tutorials</a>
</div>
</div>
<p>&nbsp;</p>

<div class="lbg">
<div class="head">Graphic Count</div>
<div class="links">
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td>
<?php include("count.php"); ?>
</td>
</tr>
</table>
</div>
</div>
<p>&nbsp;</p>

<div class="lbg">
<div class="head">Themes</div>
<div class="links" align="center">
<a href="http://lunaire.mysticallegends.com/index.php?wptheme=xxxHolic">
<img src="http://lunaire.mysticallegends.com/wpt06.png" border="0"></a>
<a href="http://lunaire.mysticallegends.com/index.php?wptheme=Ayumi">
<img src="http://lunaire.mysticallegends.com/wpt05.png" border="0"></a>
<a href="http://lunaire.mysticallegends.com/index.php?wptheme=Kitten">
<img src="http://lunaire.mysticallegends.com/wpt04.png" border="0"></a><br />
<a href="http://lunaire.mysticallegends.com/index.php?wptheme=Aoi+Miyazaki">
<img src="http://lunaire.mysticallegends.com/wpt03.png" border="0"></a><br />
<a href="http://lunaire.mysticallegends.com/index.php?wptheme=Chiaki+Kuriyama">
<img src="http://lunaire.mysticallegends.com/wpt02.png" border="0"></a><br />
</div>
</div>
<p>&nbsp;</p>

<div class="lbg">
<div class="head">Affiliates</div>
<div class="links" align="center"><br /><?php include("affiliates.php"); ?></div>
<div class="tfooter">
[ <a href="http://lunaire.mysticallegends.com/contact/contact.php">Apply?</a> | <a href="http://lunaire.mysticallegends.com/links/stats.php">Stats</a> ]<br />
<em>[ 

<?php

include("connection.php");
// Counting the number of rows
$count = "select * from links where genre='affiliate'";
$result = mysql_query($count);
$num2 = mysql_num_rows($result);

$count = 10-$num2;

echo "$count";

?>

 positions ]</em></div>
</div>
<p>&nbsp;</p>

<div class="lbg">
<div class="head">Rotations</div>
<div class="links" align="center">
<!-- Screenshot Exchange begin -->
<a href="http://she-says.com/screenshot" target="_blank"><img src="http://she-says.com/screenshot/images/top.gif" border="0" title="Join Screenshot Exchange"></a><br />
<iframe src="http://she-says.com/screenshot/work.php?ID=Lunaire" width=133 height=98 marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling="no" target="_blank"></iframe><br />
<a href="http://she-says.com/screenshot" target="_blank"><img src="http://she-says.com/screenshot/images/bottom.gif" border="0" title="Join Screenshot Exchange"></a>
<!-- Screenshot Exchange end -->


<!-- MysticalLegends Rotation code begin -->
<div align="center">
<iframe src="http://www.mysticallegends.com/linkrotate/work.php?ID=Lunaire" width=88 height=31 marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling="no"></iframe><br>
<a href="http://www.mysticallegends.com/rotation.php" target="_blank"><img src="http://www.mysticallegends.com/linkrotate/banner/bottom.gif" border="0" title="Join MysticalLegends Rotation"></a>
</div>
<!-- MysticalLegends Rotation code end -->


<!-- Hushabye Rotation -->
<div align="center">
<iframe src="http://silentatmosphere.com/hushabye/EasyBannerFree/work.php?ID=Lunaire" width=88 height=31 marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling="no"></iframe><br>
<a target="_blank" href="http://silentatmosphere.com/hushabye/"><img border="0" src="http://www.silentatmosphere.com/hushabye/images/bottom.gif"></a>
</div>
<!-- Hushabye Rotation -->
</div>
</div>