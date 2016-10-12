<?
/**
 * Main.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("include/session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login</title>
<link href="members/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<div style="position: absolute; top: 0px; left: 0px;">
<img src="admin/images/cpanel.jpg" border="0">
</div>
<div style="position: absolute; width: 230px; height: 120px; top: 155px; left: 145px;">
<div class="form">



<?
/**
 * User has already logged in, so display relevant links, including
 * a link to the admin center if the user is an administrator.
 */
if($session->logged_in){
   echo "<div class=\"head\"><strong>Logged In</strong></div>";
   echo "<div class=\"logged_in\">Welcome <strong>$session->username</strong>, you are logged in.<br /><br />"
       ."[<a href=\"userinfo.php?user=$session->username\">My Account</a>] &nbsp;&nbsp;"
       ."[<a href=\"useredit.php\">Edit Account</a>] &nbsp;&nbsp;";
   if($session->isAdmin()){
      echo "[<a href=\"admin/index.php\">Admin Center</a>] &nbsp;&nbsp;";
   }
   echo "[<a href=\"process.php\">Logout</a>]</div><br />";
}
else{
?>

<?
/**
 * User not logged in, display the login form.
 * If user has already tried to login, but errors were
 * found, display the total number of errors.
 * If errors occurred, they will be displayed.
 */
if($form->num_errors > 0){
   echo "There are ".$form->num_errors." error(s) found";
}
?>
<form action="process.php" method="POST">
<table border="0" cellspacing="0" cellpadding="3" class="form">
<tr><td>Username:</td><td><input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>" class="input" /></td><td><? echo $form->error("user"); ?></td></tr>
<tr><td>Password:</td><td><input type="password" name="pass" maxlength="30" value="<? echo $form->value("pass"); ?>" class="input" /></td><td><? echo $form->error("pass"); ?></td></tr>
<tr><td colspan="2" align="left" class="small"><input type="checkbox" name="remember" class="input" <? if($form->value("remember") != ""){ echo "checked"; } ?>>
Remember me
<input type="hidden" name="sublogin" value="1">
<input type="submit" value="Login" class="input"></td></tr>
<tr><td colspan="2" align="left" class="small">[ <a href="forgotpass.php">Forgot Password?</a> | <a href="register.php">Sign-Up</a> ]<br /><br /></td></tr>
</table>
</form>

<?
}

/**
 * Just a little page footer, tells how many registered members
 * there are, how many users currently logged in and viewing site,
 * and how many guests viewing site. Active users are displayed,
 * with link to their user information.
 */

echo "<div class=\"constrict\"><b>Member Total:</b> ".$database->getNumMembers()."<br />";
echo "There are $database->num_active_users registered members and ";
echo "$database->num_active_guests guests viewing the site.<br />";
echo "</div>";

include("include/view_active.php");

?>
</div><!-- constrict div close -->
</div><!-- form div close -->
</div><!-- positioning div close -->


</body>
</html>
