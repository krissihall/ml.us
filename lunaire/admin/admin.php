<?
/**
 * Admin.php
 *
 * This is the Admin Center page. Only administrators
 * are allowed to view this page. This page displays the
 * database table of users and banned users. Admins can
 * choose to delete specific users, delete inactive users,
 * ban users, update user levels, etc.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("head.php");
include("../include/session.php");

/**
 * displayUsers - Displays the users database table in
 * a nicely formatted html table.
 */
function displayUsers(){
   global $database;
   $q = "SELECT username,userlevel,email,timestamp "
       ."FROM ".TBL_USERS." ORDER BY userlevel DESC,username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"center\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Username</b></td><td><b>Level</b></td><td><b>Email</b></td><td><b>Last Active</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname  = mysql_result($result,$i,"username");
      $ulevel = mysql_result($result,$i,"userlevel");
      $email  = mysql_result($result,$i,"email");
      $time   = mysql_result($result,$i,"timestamp");

      echo "<tr><td>$uname</td><td>$ulevel</td><td>$email</td><td>$time</td></tr>\n";
   }
   echo "</table>";
}

/**
 * displayBannedUsers - Displays the banned users
 * database table in a nicely formatted html table.
 */
function displayBannedUsers(){
   global $database;
   $q = "SELECT username,timestamp "
       ."FROM ".TBL_BANNED_USERS." ORDER BY username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"left\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>Username</b></td><td><b>Time Banned</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname = mysql_result($result,$i,"username");
      $time  = mysql_result($result,$i,"timestamp");

      echo "<tr><td>$uname</td><td>$time</td></tr>\n";
   }
   echo "</table><br />\n";
}
   
/**
 * User not an administrator, redirect to main page
 * automatically.
 */
if(!$session->isAdmin()){
   header("Location: ../main.php");
}
else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */
?>
<html>
<title>Registered Members</title>
<body>
<div class="header">Admin Center</div>
<div class="body">
Logged in as <? echo $session->username; ?><br /><br />
Back to [<a href="../main.php">Main Page</a>]<br /><br />
</div><br />
<?
if($form->num_errors > 0){
   echo "&nbsp;"
       ."!*** Error with request, please fix<br /><br />";
}
?>
<table align="center" border="0" width="100%" cellspacing="5" cellpadding="5">
<tr><td class="body">
<?
/**
 * Display Users Table
 */
?>
<div class="header">Users Table Contents:</div><br />
<?
displayUsers();
?>
<br />
</td></tr>
<tr>
<td>
<br />
<?
/**
 * Update User Level
 */
?>
<div class="header">Update User Level</div>
<div class="body">
<? echo $form->error("upduser"); ?>
<table>
<form action="adminprocess.php" method="POST">
<tr><td>
Username:<br />
<input type="text" name="upduser" maxlength="30" value="<? echo $form->value("upduser"); ?>">
</td>
<td>
Level:<br />
<select name="updlevel">
<option value="1">1
<option value="9">9
</select>
</td>
<td>
<br />
<input type="hidden" name="subupdlevel" value="1">
<input type="submit" value="Update Level">
</td></tr>
</form>
</table>
</div>
</td>
</tr>
<tr>
<td><br /></td>
</tr>
<tr>
<td>
<?
/**
 * Delete User
 */
?>
<div class="header">Delete User</div>
<div class="body">
<? echo $form->error("deluser"); ?>
<form action="adminprocess.php" method="POST">
Username:<br>
<input type="text" name="deluser" maxlength="30" value="<? echo $form->value("deluser"); ?>">
<input type="hidden" name="subdeluser" value="1">
<input type="submit" value="Delete User">
</form>
</div>
</td>
</tr>
<tr>
<td><br /></td>
</tr>
<tr>
<td>
<?
/**
 * Delete Inactive Users
 */
?>
<div class="header">Delete Inactive Users</div>
<div class="body">
This will delete all users (not administrators), who have not logged in to the site
within a certain time period. You specify the days spent inactive.<br /><br />
<table>
<form action="adminprocess.php" method="POST">
<tr><td>
Days:<br />
<select name="inactdays">
<option value="3">3
<option value="7">7
<option value="14">14
<option value="30">30
<option value="100">100
<option value="365">365
</select>
</td>
<td>
<br />
<input type="hidden" name="subdelinact" value="1">
<input type="submit" value="Delete All Inactive">
</td>
</form>
</table>
</div>
</td>
</tr>
<tr>
<td><br /></td>
</tr>
<tr>
<td>
<?
/**
 * Ban User
 */
?>
<div class="header">Ban User</div>
<? echo $form->error("banuser"); ?>
<div class="body">
<form action="adminprocess.php" method="POST">
Username:<br>
<input type="text" name="banuser" maxlength="30" value="<? echo $form->value("banuser"); ?>">
<input type="hidden" name="subbanuser" value="1">
<input type="submit" value="Ban User">
</form>
</div>
</td>
</tr>
<tr>
<td><br /></td>
</tr>
<tr><td>
<?
/**
 * Display Banned Users Table
 */
?>
<div class="header">Banned Users Table Contents:</div>
<div class="body">
<?
displayBannedUsers();
?>
</div>
</td></tr>
<tr>
<td><br /></td>
</tr>
<tr>
<td>
<?
/**
 * Delete Banned User
 */
?>
<div class="header">Delete Banned User</div>
<div class="body">
<? echo $form->error("delbanuser"); ?>
<form action="adminprocess.php" method="POST">
Username:<br />
<input type="text" name="delbanuser" maxlength="30" value="<? echo $form->value("delbanuser"); ?>">
<input type="hidden" name="subdelbanned" value="1">
<input type="submit" value="Delete Banned User">
</form>
</div>
</td>
</tr>
</table>
</body>
</html>
<?
}

include("foot.php");
?>

