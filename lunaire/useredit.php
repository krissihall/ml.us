<?
/**
 * UserEdit.php
 *
 * This page is for users to edit their account information
 * such as their password, email address, etc. Their
 * usernames can not be edited. When changing their
 * password, they must first confirm their current password.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("include/session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Edit Your Profile</title>
<link href="members/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<div style="position: absolute; top: 0px; left: 0px;">
<img src="admin/images/cpanel.jpg" border="0">
</div>
<div style="position: absolute; width: 230px; height: 120px; top: 155px; left: 118px;">
<div class="form">

<?
/**
 * User has submitted form without errors and user's
 * account has been edited successfully.
 */
if(isset($_SESSION['useredit'])){
   unset($_SESSION['useredit']);
   
   echo "<div class=\"head\">User Account Edit Success!</div>";
   echo "<b>$session->username</b>, your account has been successfully updated. "
       ."<a href=\"main.php\">Main</a>.";
}
else{
?>

<?
/**
 * If user is not logged in, then do not display anything.
 * If user is logged in, then display the form to edit
 * account information, with the current email address
 * already in the field.
 */
if($session->logged_in){
?>

<div class="head">User Account Edit : <? echo $session->username; ?></div>
<?
if($form->num_errors > 0){
   echo "<td><font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font></td>";
}
?>
<form action="process.php" method="POST">
<table align="left" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>Current Password:</td>
<td><input type="password" name="curpass" maxlength="30" value="
<?echo $form->value("curpass"); ?>" class="input" /></td>
<td><? echo $form->error("curpass"); ?></td>
</tr>
<tr>
<td>New Password:</td>
<td><input type="password" name="newpass" maxlength="30" value="
<? echo $form->value("newpass"); ?>" class="input" /></td>
<td><? echo $form->error("newpass"); ?></td>
</tr>
<tr>
<td>Email:</td>
<td><input type="text" name="email" maxlength="50" value="
<?
if($form->value("email") == ""){
   echo $session->userinfo['email'];
}else{
   echo $form->value("email");
}
?>" class="input" />
</td>
<td><? echo $form->error("email"); ?></td>
</tr>
<tr><td colspan="2" align="right"><br />
<input type="hidden" name="subedit" value="1" />
<input type="submit" value="Edit Account" class="input" /></td></tr>
<tr><td colspan="2" align="left"></td></tr>
</table>
</form>

</div>
</div>

<?
}
}

?>

</body>
</html>
