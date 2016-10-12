<?php

include("../../include/session.php");

if(!$session->isAdmin()){
   header("Location: ../../main.php");
} else {

include("../head.php");

?>

<div class="header">Uploaded Icons</div>
<div class="body">
<?php

//set where you want to store files
//in this example we keep file in folder upload
//$HTTP_POST_FILES['upload']['name']; = upload file name
//for example upload file name cartoon.gif . $path will be upload/cartoon.gif
$path1= "../../avatars/icons/".$HTTP_POST_FILES['ufile']['name'][0];
$path2= "../../avatars/icons/".$HTTP_POST_FILES['ufile']['name'][1];
$path3= "../../avatars/icons/".$HTTP_POST_FILES['ufile']['name'][2];
$path4= "../../avatars/icons/".$HTTP_POST_FILES['ufile']['name'][3];
$path5= "../../avatars/icons/".$HTTP_POST_FILES['ufile']['name'][4];
$path6= "../../avatars/icons/".$HTTP_POST_FILES['ufile']['name'][5];
$path7= "../../avatars/icons/".$HTTP_POST_FILES['ufile']['name'][6];
$path8= "../../avatars/icons/".$HTTP_POST_FILES['ufile']['name'][7];
$path9= "../../avatars/icons/".$HTTP_POST_FILES['ufile']['name'][8];
$path10= "../../avatars/icons/".$HTTP_POST_FILES['ufile']['name'][9];
$path11= "../../avatars/icons/".$HTTP_POST_FILES['ufile']['name'][10];
$path12= "../../avatars/icons/".$HTTP_POST_FILES['ufile']['name'][11];

//copy file to where you want to store file
copy($HTTP_POST_FILES['ufile']['tmp_name'][0], $path1);
copy($HTTP_POST_FILES['ufile']['tmp_name'][1], $path2);
copy($HTTP_POST_FILES['ufile']['tmp_name'][2], $path3);
copy($HTTP_POST_FILES['ufile']['tmp_name'][3], $path4);
copy($HTTP_POST_FILES['ufile']['tmp_name'][4], $path5);
copy($HTTP_POST_FILES['ufile']['tmp_name'][5], $path6);
copy($HTTP_POST_FILES['ufile']['tmp_name'][6], $path7);
copy($HTTP_POST_FILES['ufile']['tmp_name'][7], $path8);
copy($HTTP_POST_FILES['ufile']['tmp_name'][8], $path9);
copy($HTTP_POST_FILES['ufile']['tmp_name'][9], $path10);
copy($HTTP_POST_FILES['ufile']['tmp_name'][10], $path11);
copy($HTTP_POST_FILES['ufile']['tmp_name'][11], $path12);

//$HTTP_POST_FILES['upload']['name'] = file name
//$HTTP_POST_FILES['upload']['size'] = file size
//$HTTP_POST_FILES['upload']['type'] = type of file
echo "<table cellpadding=\"2\" cellspacing=\"2\" border=\"0\"><tr><td align=\"center\">";

echo "<div class=\"uploaded\">File Name :".$HTTP_POST_FILES['ufile']['name'][0]."<br />";
echo "File Size :".$HTTP_POST_FILES['ufile']['size'][0]."<BR/>";
echo "File Type :".$HTTP_POST_FILES['ufile']['type'][0]."<BR/>";
echo "</div>";

echo "<div class=\"uploaded\">File Name :".$HTTP_POST_FILES['ufile']['name'][1]."<BR/>";
echo "File Size :".$HTTP_POST_FILES['ufile']['size'][1]."<BR/>";
echo "File Type :".$HTTP_POST_FILES['ufile']['type'][1]."<BR/>";
echo "</div>";

echo "<div class=\"uploaded\">File Name :".$HTTP_POST_FILES['ufile']['name'][2]."<BR/>";
echo "File Size :".$HTTP_POST_FILES['ufile']['size'][2]."<BR/>";
echo "File Type :".$HTTP_POST_FILES['ufile']['type'][2]."<BR/>";
echo "</div>";

echo "<div class=\"uploaded\">File Name :".$HTTP_POST_FILES['ufile']['name'][3]."<BR/>";
echo "File Size :".$HTTP_POST_FILES['ufile']['size'][3]."<BR/>";
echo "File Type :".$HTTP_POST_FILES['ufile']['type'][3]."<BR/>";
echo "</div>";

echo "<div class=\"uploaded\">File Name :".$HTTP_POST_FILES['ufile']['name'][4]."<BR/>";
echo "File Size :".$HTTP_POST_FILES['ufile']['size'][4]."<BR/>";
echo "File Type :".$HTTP_POST_FILES['ufile']['type'][4]."<BR/>";
echo "</div>";

echo "<div class=\"uploaded\">File Name :".$HTTP_POST_FILES['ufile']['name'][5]."<BR/>";
echo "File Size :".$HTTP_POST_FILES['ufile']['size'][5]."<BR/>";
echo "File Type :".$HTTP_POST_FILES['ufile']['type'][5]."<BR/>";
echo "</div>";

echo "<div class=\"uploaded\">File Name :".$HTTP_POST_FILES['ufile']['name'][6]."<BR/>";
echo "File Size :".$HTTP_POST_FILES['ufile']['size'][6]."<BR/>";
echo "File Type :".$HTTP_POST_FILES['ufile']['type'][6]."<BR/>";
echo "</div>";

echo "<div class=\"uploaded\">File Name :".$HTTP_POST_FILES['ufile']['name'][7]."<BR/>";
echo "File Size :".$HTTP_POST_FILES['ufile']['size'][7]."<BR/>";
echo "File Type :".$HTTP_POST_FILES['ufile']['type'][7]."<BR/>";
echo "</div>";

echo "<div class=\"uploaded\">File Name :".$HTTP_POST_FILES['ufile']['name'][8]."<BR/>";
echo "File Size :".$HTTP_POST_FILES['ufile']['size'][8]."<BR/>";
echo "File Type :".$HTTP_POST_FILES['ufile']['type'][8]."<BR/>";
echo "</div>";


echo "<div class=\"uploaded\">File Name :".$HTTP_POST_FILES['ufile']['name'][9]."<BR/>";
echo "File Size :".$HTTP_POST_FILES['ufile']['size'][9]."<BR/>";
echo "File Type :".$HTTP_POST_FILES['ufile']['type'][9]."<BR/>";
echo "</div>";


echo "<div class=\"uploaded\">File Name :".$HTTP_POST_FILES['ufile']['name'][10]."<BR/>";
echo "File Size :".$HTTP_POST_FILES['ufile']['size'][10]."<BR/>";
echo "File Type :".$HTTP_POST_FILES['ufile']['type'][10]."<BR/>";
echo "</div>";


echo "<div class=\"uploaded\">File Name :".$HTTP_POST_FILES['ufile']['name'][11]."<BR/>";
echo "File Size :".$HTTP_POST_FILES['ufile']['size'][11]."<BR/>";
echo "File Type :".$HTTP_POST_FILES['ufile']['type'][11]."<BR/>";
echo "</div>";

echo "</tr></td></table>";

///////////////////////////////////////////////////////

// Use this code to display the error or success.

$filesize1=$HTTP_POST_FILES['ufile']['size'][0];
$filesize2=$HTTP_POST_FILES['ufile']['size'][1];
$filesize3=$HTTP_POST_FILES['ufile']['size'][2];
$filesize4=$HTTP_POST_FILES['ufile']['size'][3];
$filesize5=$HTTP_POST_FILES['ufile']['size'][4];
$filesize6=$HTTP_POST_FILES['ufile']['size'][5];
$filesize7=$HTTP_POST_FILES['ufile']['size'][6];
$filesize8=$HTTP_POST_FILES['ufile']['size'][7];
$filesize9=$HTTP_POST_FILES['ufile']['size'][8];
$filesize10=$HTTP_POST_FILES['ufile']['size'][9];
$filesize11=$HTTP_POST_FILES['ufile']['size'][10];
$filesize12=$HTTP_POST_FILES['ufile']['size'][11];

if($filesize1 && $filesize2 && $filesize3 && $filesize4 && $filesize5 && $filesize6 && $filesize7 && $filesize8 && $filesize9 && $filesize10 && $filesize11 && $filesize12 != 0)
{
echo "Your files have been successfully uploaded.";
}

else {
echo "ERROR.....<br />";
}

//////////////////////////////////////////////

// What files that have a problem? (if found)

if($filesize1==0) {
echo "There's an error in your 1st file";
echo "<BR />";
}

if($filesize2==0) {
echo "There's an error in your 2nd file";
echo "<BR />";
}

if($filesize3==0) {
echo "There's an error in your 3rd file";
echo "<BR />";
}

if($filesize4==0) {
echo "There's an error in your 4th file";
echo "<BR />";
}

if($filesize5==0) {
echo "There's an error in your 5th file";
echo "<BR />";
}

if($filesize6==0) {
echo "There's an error in your 6th file";
echo "<BR />";
}

if($filesize7==0) {
echo "There's an error in your 7th file";
echo "<BR />";
}

if($filesize8==0) {
echo "There's an error in your 8th file";
echo "<BR />";
}

if($filesize9==0) {
echo "There's an error in your 9th file";
echo "<BR />";
}

if($filesize10==0) {
echo "There's an error in your 10th file";
echo "<BR />";
}

if($filesize11==0) {
echo "There's an error in your 11th file";
echo "<BR />";
}

if($filesize12==0) {
echo "There's an error in your 12th file";
echo "<BR />";
}

?>

</div>





<?php

if ($submit){

include('../connection.php');


  $sql = "INSERT INTO avatars (designer,series,characters,category,file_size,url,date) VALUES ('$_POST[designer1]','$_POST[series1]','$_POST[characters1]','$_POST[category1]','$_POST[file_size1]','$_POST[url1]','$_POST[date1]')";
  mysql_query($sql);
  echo "<div class=\"header\">Avatar Entry Added</div>
        <div class=\"body\">Avatar 1 Added<br />";


  $sql = "INSERT INTO avatars (designer,series,characters,category,file_size,url,date) VALUES ('$_POST[designer2]','$_POST[series2]','$_POST[characters2]','$_POST[category2]','$_POST[file_size2]','$_POST[url2]','$_POST[date2]')";
  mysql_query($sql);
  echo "Avatar 2 Added<br />";


  $sql = "INSERT INTO avatars (designer,series,characters,category,file_size,url,date) VALUES ('$_POST[designer3]','$_POST[series3]','$_POST[characters3]','$_POST[category3]','$_POST[file_size3]','$_POST[url3]','$_POST[date3]')";
  mysql_query($sql);
  echo "Avatar 3 Added<br />";


  $sql = "INSERT INTO avatars (designer,series,characters,category,file_size,url,date) VALUES ('$_POST[designer4]','$_POST[series4]','$_POST[characters4]','$_POST[category4]','$_POST[file_size4]','$_POST[url4]','$_POST[date4]')";
  mysql_query($sql);
  echo "Avatar 4 Added<br />";


  $sql = "INSERT INTO avatars (designer,series,characters,category,file_size,url,date) VALUES ('$_POST[designer5]','$_POST[series5]','$_POST[characters5]','$_POST[category5]','$_POST[file_size5]','$_POST[url5]','$_POST[date5]')";
  mysql_query($sql);
  echo "Avatar 5 Added<br />";


  $sql = "INSERT INTO avatars (designer,series,characters,category,file_size,url,date) VALUES ('$_POST[designer6]','$_POST[series6]','$_POST[characters6]','$_POST[category6]','$_POST[file_size6]','$_POST[url6]','$_POST[date6]')";
  mysql_query($sql);
  echo "Avatar 6 Added<br />";


  $sql = "INSERT INTO avatars (designer,series,characters,category,file_size,url,date) VALUES ('$_POST[designer7]','$_POST[series7]','$_POST[characters7]','$_POST[category7]','$_POST[file_size7]','$_POST[url7]','$_POST[date7]')";
  mysql_query($sql);
  echo "Avatar 7 Added<br />";


  $sql = "INSERT INTO avatars (designer,series,characters,category,file_size,url,date) VALUES ('$_POST[designer8]','$_POST[series8]','$_POST[characters8]','$_POST[category8]','$_POST[file_size8]','$_POST[url8]','$_POST[date8]')";
  mysql_query($sql);
  echo "Avatar 8 Added<br />";


  $sql = "INSERT INTO avatars (designer,series,characters,category,file_size,url,date) VALUES ('$_POST[designer9]','$_POST[series9]','$_POST[characters9]','$_POST[category9]','$_POST[file_size9]','$_POST[url9]','$_POST[date9]')";
  mysql_query($sql);
  echo "Avatar 9 Added<br />";


  $sql = "INSERT INTO avatars (designer,series,characters,category,file_size,url,date) VALUES ('$_POST[designer10]','$_POST[series10]','$_POST[characters10]','$_POST[category10]','$_POST[file_size10]','$_POST[url10]','$_POST[date10]')";
  mysql_query($sql);
  echo "Avatar 10 Added<br />";


  $sql = "INSERT INTO avatars (designer,series,characters,category,file_size,url,date) VALUES ('$_POST[designer11]','$_POST[series11]','$_POST[characters11]','$_POST[category11]','$_POST[file_size11]','$_POST[url11]','$_POST[date11]')";
  mysql_query($sql);
  echo "Avatar 1 Added<br />";


  $sql = "INSERT INTO avatars (designer,series,characters,category,file_size,url,date) VALUES ('$_POST[designer12]','$_POST[series12]','$_POST[characters12]','$_POST[category12]','$_POST[file_size12]','$_POST[url12]','$_POST[date12]')";
  mysql_query($sql);
  echo "Avatar 12 Added<br />";

}
else {

?>




<p>&nbsp;</p>

<div class="header">Add Avatar/Icon</div>
<div class="body">Please fill out the form below completely and hit the submit button one time.<br /><br />

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

<table cellpadding="0" cellspacing="0" border="0" align="center" class="multi_form">
<tr>
<th colspan="2" align="center">Avatar 1</th>
<tr>
<th colspan="2" align="center"><img src="<?php print $path1; ?>" width="100" height="100" border="0" /></th>
</tr>
</tr>
<tr>
<td>Characters:</td>
<td><input type="text" name="characters1" /></td>
</tr>
<tr>
<td>Series:</td>
<td><input type="text" name="series1" /></td>
</tr>
<tr>
<td>Category:</td>
<td><select name="category1">
      <option>anime</option>
      <option>celebrity</option>
      <option>model</option>
      <option>movie</option>
      <option>game</option>
      <option>nature</option>
      <option>scenic</option>
      <option>abstract</option>
      <option>misc</option>
    </select></td>
</tr>
<tr>
<td>Avatar URL:</td>
<td><input type="text" name="url1" value="http://lunaire.mysticallegends.com/avatars/icons/<?php print $HTTP_POST_FILES['ufile']['name'][0]; ?>" /></td>
</tr>
<tr>
<td>File Size:</td>
<td><input type="text" name="file_size1" value="<?php print $filesize1; ?>" /></td>
</tr>
<tr>
<td>Designer:</td>
<td><input type="text" name="designer1" /></td>
</tr>
<td>Date (YYYY-MM-DD):</td>
<td><input type="text" name="date1" /></td>
</tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>

<table cellpadding="0" cellspacing="0" border="0" align="center" class="multi_form">
<tr>
<th colspan="2" align="center">Avatar 2</th>
</tr>
<tr>
<th colspan="2" align="center"><img src="<?php print $path2; ?>" width="100" height="100" border="0" /></th>
</tr>
<tr>
<td>Characters:</td>
<td><input type="text" name="characters2" /></td>
</tr>
<tr>
<td>Series:</td>
<td><input type="text" name="series2" /></td>
</tr>
<tr>
<td>Category:</td>
<td><select name="category2">
      <option>anime</option>
      <option>celebrity</option>
      <option>model</option>
      <option>movie</option>
      <option>game</option>
      <option>nature</option>
      <option>scenic</option>
      <option>abstract</option>
      <option>misc</option>
    </select></td>
</tr>
<tr>
<td>Avatar URL:</td>
<td><input type="text" name="url2" value="http://lunaire.mysticallegends.com/avatars/icons/<?php print $HTTP_POST_FILES['ufile']['name'][1]; ?>" /></td>
</tr>
<tr>
<td>File Size:</td>
<td><input type="text" name="file_size2" value="<?php print $filesize2; ?>" /></td>
</tr>
<tr>
<td>Designer:</td>
<td><input type="text" name="designer2" /></td>
</tr>
<td>Date (YYYY-MM-DD):</td>
<td><input type="text" name="date2" /></td>
</tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>

<table cellpadding="0" cellspacing="0" border="0" align="center" class="multi_form">
<tr>
<th colspan="2" align="center">Avatar 3</th>
</tr>
<tr>
<th colspan="2" align="center"><img src="<?php print $path3; ?>" width="100" height="100" border="0" /></th>
</tr>
<tr>
<td>Characters:</td>
<td><input type="text" name="characters3" /></td>
</tr>
<tr>
<td>Series:</td>
<td><input type="text" name="series3" /></td>
</tr>
<tr>
<td>Category:</td>
<td><select name="category3">
      <option>anime</option>
      <option>celebrity</option>
      <option>model</option>
      <option>movie</option>
      <option>game</option>
      <option>nature</option>
      <option>scenic</option>
      <option>abstract</option>
      <option>misc</option>
    </select></td>
</tr>
<tr>
<td>Avatar URL:</td>
<td><input type="text" name="url3" value="http://lunaire.mysticallegends.com/avatars/icons/<?php print $HTTP_POST_FILES['ufile']['name'][2]; ?>" /></td>
</tr>
<tr>
<td>File Size:</td>
<td><input type="text" name="file_size3" value="<?php print $filesize3; ?>" /></td>
</tr>
<tr>
<td>Designer:</td>
<td><input type="text" name="designer3" /></td>
</tr>
<td>Date (YYYY-MM-DD):</td>
<td><input type="text" name="date3" /></td>
</tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>

<table cellpadding="0" cellspacing="0" border="0" align="center" class="multi_form">
<tr>
<th colspan="2" align="center">Avatar 4</th>
</tr>
<tr>
<th colspan="2" align="center"><img src="<?php print $path4; ?>" width="100" height="100" border="0" /></th>
</tr>
<tr>
<td>Characters:</td>
<td><input type="text" name="characters4" /></td>
</tr>
<tr>
<td>Series:</td>
<td><input type="text" name="series4" /></td>
</tr>
<tr>
<td>Category:</td>
<td><select name="category4">
      <option>anime</option>
      <option>celebrity</option>
      <option>model</option>
      <option>movie</option>
      <option>game</option>
      <option>nature</option>
      <option>scenic</option>
      <option>abstract</option>
      <option>misc</option>
    </select></td>
</tr>
<tr>
<td>Avatar URL:</td>
<td><input type="text" name="url4" value="http://lunaire.mysticallegends.com/avatars/icons/<?php print $HTTP_POST_FILES['ufile']['name'][3]; ?>" /></td>
</tr>
<tr>
<td>File Size:</td>
<td><input type="text" name="file_size4" value="<?php print $filesize4; ?>" /></td>
</tr>
<tr>
<td>Designer:</td>
<td><input type="text" name="designer4" /></td>
</tr>
<td>Date (YYYY-MM-DD):</td>
<td><input type="text" name="date4" /></td>
</tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>

<table cellpadding="0" cellspacing="0" border="0" align="center" class="multi_form">
<tr>
<th colspan="2" align="center">Avatar 5</th>
</tr>
<tr>
<th colspan="2" align="center"><img src="<?php print $path5; ?>" width="100" height="100" border="0" /></th>
</tr>
<tr>
<td>Characters:</td>
<td><input type="text" name="characters5" /></td>
</tr>
<tr>
<td>Series:</td>
<td><input type="text" name="series5" /></td>
</tr>
<tr>
<td>Category:</td>
<td><select name="category5">
      <option>anime</option>
      <option>celebrity</option>
      <option>model</option>
      <option>movie</option>
      <option>game</option>
      <option>nature</option>
      <option>scenic</option>
      <option>abstract</option>
      <option>misc</option>
    </select></td>
</tr>
<tr>
<td>Avatar URL:</td>
<td><input type="text" name="url5" value="http://lunaire.mysticallegends.com/avatars/icons/<?php print $HTTP_POST_FILES['ufile']['name'][4]; ?>" /></td>
</tr>
<tr>
<td>File Size:</td>
<td><input type="text" name="file_size5" value="<?php print $filesize5; ?>" /></td>
</tr>
<tr>
<td>Designer:</td>
<td><input type="text" name="designer5" /></td>
</tr>
<td>Date (YYYY-MM-DD):</td>
<td><input type="text" name="date5" /></td>
</tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>

<table cellpadding="0" cellspacing="0" border="0" align="center" class="multi_form">
<tr>
<th colspan="2" align="center">Avatar 6</th>
</tr>
<tr>
<th colspan="2" align="center"><img src="<?php print $path6; ?>" width="100" height="100" border="0" /></th>
</tr>
<tr>
<td>Characters:</td>
<td><input type="text" name="characters6" /></td>
</tr>
<tr>
<td>Series:</td>
<td><input type="text" name="series6" /></td>
</tr>
<tr>
<td>Category:</td>
<td><select name="category6">
      <option>anime</option>
      <option>celebrity</option>
      <option>model</option>
      <option>movie</option>
      <option>game</option>
      <option>nature</option>
      <option>scenic</option>
      <option>abstract</option>
      <option>misc</option>
    </select></td>
</tr>
<tr>
<td>Avatar URL:</td>
<td><input type="text" name="url6" value="http://lunaire.mysticallegends.com/avatars/icons/<?php print $HTTP_POST_FILES['ufile']['name'][5]; ?>" /></td>
</tr>
<tr>
<td>File Size:</td>
<td><input type="text" name="file_size6" value="<?php print $filesize6; ?>" /></td>
</tr>
<tr>
<td>Designer:</td>
<td><input type="text" name="designer6" /></td>
</tr>
<td>Date (YYYY-MM-DD):</td>
<td><input type="text" name="date6" /></td>
</tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>

<table cellpadding="0" cellspacing="0" border="0" align="center" class="multi_form">
<tr>
<th colspan="2" align="center">Avatar 7</th>
</tr>
<tr>
<th colspan="2" align="center"><img src="<?php print $path7; ?>" width="100" height="100" border="0" /></th>
</tr>
<tr>
<td>Characters:</td>
<td><input type="text" name="characters7" /></td>
</tr>
<tr>
<td>Series:</td>
<td><input type="text" name="series7" /></td>
</tr>
<tr>
<td>Category:</td>
<td><select name="category7">
      <option>anime</option>
      <option>celebrity</option>
      <option>model</option>
      <option>movie</option>
      <option>game</option>
      <option>nature</option>
      <option>scenic</option>
      <option>abstract</option>
      <option>misc</option>
    </select></td>
</tr>
<tr>
<td>Avatar URL:</td>
<td><input type="text" name="url7" value="http://lunaire.mysticallegends.com/avatars/icons/<?php print $HTTP_POST_FILES['ufile']['name'][6]; ?>" /></td>
</tr>
<tr>
<td>File Size:</td>
<td><input type="text" name="file_size7" value="<?php print $filesize7; ?>" /></td>
</tr>
<tr>
<td>Designer:</td>
<td><input type="text" name="designer7" /></td>
</tr>
<td>Date (YYYY-MM-DD):</td>
<td><input type="text" name="date7" /></td>
</tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>

<table cellpadding="0" cellspacing="0" border="0" align="center" class="multi_form">
<tr>
<th colspan="2" align="center">Avatar 8</th>
</tr>
<tr>
<th colspan="2" align="center"><img src="<?php print $path8; ?>" width="100" height="100" border="0" /></th>
</tr>
<tr>
<td>Characters:</td>
<td><input type="text" name="characters8" /></td>
</tr>
<tr>
<td>Series:</td>
<td><input type="text" name="series8" /></td>
</tr>
<tr>
<td>Category:</td>
<td><select name="category8">
      <option>anime</option>
      <option>celebrity</option>
      <option>model</option>
      <option>movie</option>
      <option>game</option>
      <option>nature</option>
      <option>scenic</option>
      <option>abstract</option>
      <option>misc</option>
    </select></td>
</tr>
<tr>
<td>Avatar URL:</td>
<td><input type="text" name="url8" value="http://lunaire.mysticallegends.com/avatars/icons/<?php print $HTTP_POST_FILES['ufile']['name'][7]; ?>" /></td>
</tr>
<tr>
<td>File Size:</td>
<td><input type="text" name="file_size8" value="<?php print $filesize8; ?>" /></td>
</tr>
<tr>
<td>Designer:</td>
<td><input type="text" name="designer8" /></td>
</tr>
<td>Date (YYYY-MM-DD):</td>
<td><input type="text" name="date8" /></td>
</tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>

<table cellpadding="0" cellspacing="0" border="0" align="center" class="multi_form">
<tr>
<th colspan="2" align="center">Avatar 9</th>
</tr>
<tr>
<th colspan="2" align="center"><img src="<?php print $path9; ?>" width="100" height="100" border="0" /></th>
</tr>
<tr>
<td>Characters:</td>
<td><input type="text" name="characters9" /></td>
</tr>
<tr>
<td>Series:</td>
<td><input type="text" name="series9" /></td>
</tr>
<tr>
<td>Category:</td>
<td><select name="category9">
      <option>anime</option>
      <option>celebrity</option>
      <option>model</option>
      <option>movie</option>
      <option>game</option>
      <option>nature</option>
      <option>scenic</option>
      <option>abstract</option>
      <option>misc</option>
    </select></td>
</tr>
<tr>
<td>Avatar URL:</td>
<td><input type="text" name="url9" value="http://lunaire.mysticallegends.com/avatars/icons/<?php print $HTTP_POST_FILES['ufile']['name'][8]; ?>" /></td>
</tr>
<tr>
<td>File Size:</td>
<td><input type="text" name="file_size9" value="<?php print $filesize9; ?>" /></td>
</tr>
<tr>
<td>Designer:</td>
<td><input type="text" name="designer9" /></td>
</tr>
<td>Date (YYYY-MM-DD):</td>
<td><input type="text" name="date9" /></td>
</tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>

<table cellpadding="0" cellspacing="0" border="0" align="center" class="multi_form">
<tr>
<th colspan="2" align="center">Avatar 10</th>
</tr>
<tr>
<th colspan="2" align="center"><img src="<?php print $path10; ?>" width="100" height="100" border="0" /></th>
</tr>
<tr>
<td>Characters:</td>
<td><input type="text" name="characters10" /></td>
</tr>
<tr>
<td>Series:</td>
<td><input type="text" name="series10" /></td>
</tr>
<tr>
<td>Category:</td>
<td><select name="category10">
      <option>anime</option>
      <option>celebrity</option>
      <option>model</option>
      <option>movie</option>
      <option>game</option>
      <option>nature</option>
      <option>scenic</option>
      <option>abstract</option>
      <option>misc</option>
    </select></td>
</tr>
<tr>
<td>Avatar URL:</td>
<td><input type="text" name="url10" value="http://lunaire.mysticallegends.com/avatars/icons/<?php print $HTTP_POST_FILES['ufile']['name'][9]; ?>" /></td>
</tr>
<tr>
<td>File Size:</td>
<td><input type="text" name="file_size10" value="<?php print $filesize10; ?>" /></td>
</tr>
<tr>
<td>Designer:</td>
<td><input type="text" name="designer10" /></td>
</tr>
<td>Date (YYYY-MM-DD):</td>
<td><input type="text" name="date10" /></td>
</tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>

<table cellpadding="0" cellspacing="0" border="0" align="center" class="multi_form">
<tr>
<th colspan="2" align="center">Avatar 11</th>
</tr>
<tr>
<th colspan="2" align="center"><img src="<?php print $path11; ?>" width="100" height="100" border="0" /></th>
</tr>
<tr>
<td>Characters:</td>
<td><input type="text" name="characters11" /></td>
</tr>
<tr>
<td>Series:</td>
<td><input type="text" name="series11" /></td>
</tr>
<tr>
<td>Category:</td>
<td><select name="category11">
      <option>anime</option>
      <option>celebrity</option>
      <option>model</option>
      <option>movie</option>
      <option>game</option>
      <option>nature</option>
      <option>scenic</option>
      <option>abstract</option>
      <option>misc</option>
    </select></td>
</tr>
<tr>
<td>Avatar URL:</td>
<td><input type="text" name="url11" value="http://lunaire.mysticallegends.com/avatars/icons/<?php print $HTTP_POST_FILES['ufile']['name'][10]; ?>" /></td>
</tr>
<tr>
<td>File Size:</td>
<td><input type="text" name="file_size11" value="<?php print $filesize11; ?>" /></td>
</tr>
<tr>
<td>Designer:</td>
<td><input type="text" name="designer11" /></td>
</tr>
<td>Date (YYYY-MM-DD):</td>
<td><input type="text" name="date11" /></td>
</tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>

<table cellpadding="0" cellspacing="0" border="0" align="center" class="multi_form">
<tr>
<th colspan="2" align="center">Avatar 12</th>
</tr>
<tr>
<th colspan="2" align="center"><img src="<?php print $path12; ?>" width="100" height="100" border="0" /></th>
</tr>
<tr>
<td>Characters:</td>
<td><input type="text" name="characters12" /></td>
</tr>
<tr>
<td>Series:</td>
<td><input type="text" name="series12" /></td>
</tr>
<tr>
<td>Category:</td>
<td><select name="category12">
      <option>anime</option>
      <option>celebrity</option>
      <option>model</option>
      <option>movie</option>
      <option>game</option>
      <option>nature</option>
      <option>scenic</option>
      <option>abstract</option>
      <option>misc</option>
    </select></td>
</tr>
<tr>
<td>Avatar URL:</td>
<td><input type="text" name="url12" value="http://lunaire.mysticallegends.com/avatars/icons/<?php print $HTTP_POST_FILES['ufile']['name'][11]; ?>" /></td>
</tr>
<tr>
<td>File Size:</td>
<td><input type="text" name="file_size12" value="<?php print $filesize12; ?>" /></td>
</tr>
<tr>
<td>Designer:</td>
<td><input type="text" name="designer12" /></td>
</tr>
<td>Date (YYYY-MM-DD):</td>
<td><input type="text" name="date12" /></td>
</tr>
</table>

<p align="center"><input type="submit" name="submit" /></p>
</form>
</div>


<?php
}
?>

<?php include("../foot.php"); ?>

<?php
}
?>