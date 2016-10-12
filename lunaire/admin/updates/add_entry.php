<?php

session_start();
if($username=="") {
Header("Location: http://lunaire.mysticallegends.com/admin/admin.php");
} else {
?>

<?php include("../head.php"); ?>


      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="header">Add Update</td>
  </tr>
  <tr>
    <td class="body">
Please fill out the form below to add an entry and hit the submit button only once.<br /><br />
<?php include("add.php"); ?>
</td>
  </tr>
</table>

<?php include("../foot.php"); ?>

<?php
}
?>