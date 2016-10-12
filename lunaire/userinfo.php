<?
/**
 * UserInfo.php
 *
 * This page is for users to view their account information
 * with a link added for them to edit the information.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("include/session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Account Information</title>
<link href="members/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<div style="position: absolute; top: 0px; left: 0px;">
<img src="admin/images/cpanel.jpg" border="0">
</div>
<div style="position: absolute; width: 230px; height: 120px; top: 155px; left: 118px;">
<div class="form">

<?
/* Requested Username error checking */
$req_user = trim($_GET['user']);
if(!$req_user || strlen($req_user) == 0 ||
   !eregi("^([0-9a-z])+$", $req_user) ||
   !$database->usernameTaken($req_user)){
   die("Username not registered");
}

/* Logged in user viewing own account */
if(strcmp($session->username,$req_user) == 0){
   echo "<div class=\"head\">Account Information</div>";
}
/* Visitor not viewing own account */
else{
   echo "<div class=\"head\">User Info</div>";
}

/* Display requested user information */
$req_user_info = $database->getUserInfo($req_user);

/* Username */
echo "<strong>Username:</strong> ".$req_user_info['username']."<br />";

/* Email */
echo "<strong>Email:</strong> ".$req_user_info['email']."<br />";

/**
 * Note: when you add your own fields to the users table
 * to hold more information, like homepage, location, etc.
 * they can be easily accessed by the user info array.
 *
 * $session->user_info['location']; (for logged in users)
 *
 * ..and for this page,
 *
 * $req_user_info['location']; (for any user)
 */

/* If logged in user viewing own account, give link to edit */
if(strcmp($session->username,$req_user) == 0){
   echo "<br /><div align=\"center\">[ <a href=\"useredit.php\">Edit Account Information</a> ]</div><br />";
}

/* Link back to main */
echo "<br>Back To [ <a href=\"main.php\">Main</a> ]<br />";

?>
</div>
</div>
</div>
</body>
</html>
