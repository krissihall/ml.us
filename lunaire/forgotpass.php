<?
/**
 * ForgotPass.php
 *
 * This page is for those users who have forgotten their
 * password and want to have a new password generated for
 * them and sent to the email address attached to their
 * account in the database. The new password is not
 * displayed on the website for security purposes.
 *
 * Note: If your server is not properly setup to send
 * mail, then this page is essentially useless and it
 * would be better to not even link to this page from
 * your website.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("include/session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Forgot Your Password?</title>
<link href="members/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<div style="position: absolute; top: 0px; left: 0px;">
<img src="admin/images/cpanel.jpg" border="0">
</div>
<div style="position: absolute; width: 230px; height: 120px; top: 155px; left: 145px;">
<div class="form">
<div class="constrict">

<?
/**
 * Forgot Password form has been submitted and no errors
 * were found with the form (the username is in the database)
 */
if(isset($_SESSION['forgotpass'])){
   /**
    * New password was generated for user and sent to user's
    * email address.
    */
   if($_SESSION['forgotpass']){
      echo "New Password Generated<br /><br />";
      echo "Your new password has been generated "
          ."and sent to the email associated with your account. "
          ."<a href=\"main.php\">Main</a>.";
   }
   /**
    * Email could not be sent, therefore password was not
    * edited in the database.
    */
   else{
      echo "New Password Failure<br /><br />";
      echo "There was an error sending you the "
          ."email with the new password, so your password has not been changed. "
          ."<a href=\"main.php\">Main</a>.";
   }
       
   unset($_SESSION['forgotpass']);
}
else{

/**
 * Forgot password form is displayed, if error found
 * it is displayed.
 */
?>

<div class="head">Forgot Password?</div>
A new password will be generated for you and sent to the email address
associated with your account, all you have to do is enter your
username.<br /><br />
<? echo $form->error("user"); ?>
<form action="process.php" method="POST">
<b>Username:</b> <input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>" class="input" />
<input type="hidden" name="subforgot" value="1" class="input" /><br /><br />
<input type="submit" value="Get New Password" class="input" />
</form>

</div>
</div>
</div>

<?
}
?>

</body>
</html>
