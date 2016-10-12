<?php

session_start();
if($username=="") {
Header("Location: http://lunaire.mysticallegends.com/admin/admin.php");
} else {
?>

<?php include("../head.php"); ?>

<?php

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



?>


<?php include("../foot.php"); ?>