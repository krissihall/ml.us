<?php require_once("/home/mystica/public_html/lunaire/wp-blog-header.php");?>
<?php get_header(); ?> 
<?php
/////////////////////////////////////////////////
/* COPYRIGHT DO NOT REMOVE 
AUSWEB Email Contact Form. 
Coded by Phill Roberts http://ausweb.com.au */
/////////////////////////////////////////////////
session_start();
?>
<?
 $errors=0;

if (isset($_POST['Submit']) && $_POST['Submit'] == "Submit") {
			$number = $_POST['number'];
			if(md5($number) != $_SESSION['image_value']) {
			$error_message = "<div class=\"header\">Error!</div><div class=\"body\"Validation string not valid! Please try again!</div>";
			}
			else if(!(eregi("^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$",$_POST['email']))) {
			$error_message = "<div class=\"header\">Error!</div><div class=\"body\">The email address <b>'".$_POST['email']."'</b> does not seem to be valid. <BR> Your message could not be sent. Please go back and try again.</div>";
} else {
	
// BOF sanitize input	
$_POST['email'] = preg_replace( "/\n/", " ", $_POST['email'] );
$_POST['name'] = preg_replace( "/\n/", " ", $_POST['name'] );
$_POST['email'] = preg_replace( "/\r/", " ", $_POST['email'] );
$_POST['name'] = preg_replace( "/\r/", " ", $_POST['name'] );
$_POST['email'] = str_replace("Content-Type:","",$_POST['email']);
$_POST['name'] = str_replace("Content-Type:","",$_POST['name']);	
// EOF sanitize input

$email = $_POST['email'];
$name = $_POST['name'];
$website = $_POST['website'];
$genre = $_POST['genre'];
$message = $_POST['message'];
$today = date("M d, Y");

//////////////////////////////////////////////
// Insert your email address for recipient
$recipient = "lunaire@mysticallegends.com";
/////////////////////////////////////////////

// Insert message you wish to show in subject of the email
$subject = "Email Us!";

$forminfo =
"Name: $name\n
Email: $email\n
Website: $website\n
Genre: $genre\n
Message:\n
$message\n\n
Form Submitted: $today\n\n";
$formsend = mail("$recipient", "$subject", "$forminfo", "From: $email\r\nReply-to:$email");
}
}


if(isset($_POST['Submit'])) {
	if(!empty($error_message)) {
?>
		 <div class="header">Contact Us</div>
		 <div class="body"><?= $error_message ?></div>
		 <div class="tfooter"><a href="javascript:history.go(-1);"><b>[ Go Back  ]</b></a></div>
<?
		 }
		 else {
?>

		 <div class="header">Thank You</div>
         <div class="body">Thank you for contacting us, we will get back to you as soon as we can. If you do not hear back from us, we may not have gotten your message so feel free to re-send in a week. <strong>Do no refresh this page!</strong><br /><br />
		 <? echo nl2br($forminfo); ?>
		 </div>
<?
		 }
		 } else {
?>

<!--MAIN CONTENT-->

<div class="header">Contact Us</div>
<div class="body">Have something you'd like to tell us? Found a broken link? Want to affiliate or exchange links? Fill out the form below. If the form does not work, email the same information to <a href="mailto:lunaire@mysticallegends.com">lunaire@mysticallegends.com</a><br /><br />
   * Sections are required
   <p>&nbsp;</p>
<form name="form1" method="post" action="contact.php" onSubmit="return verify_cform(this)">
<table class="sub" cellpadding="5" cellspacing="0" border="0">
 <tr>
  <td>Name:</td>
  <td><input name="name" type="text" id="conf" size="30" maxlength="30"></td>
 </tr>
 <tr>
  <td>Email:</td>
  <td><input name="email" type="text" id="conf" size="30" maxlength="40"></td>
 </tr>
 <tr>
  <td>Website:</td>
  <td><input name="website" type="text" id="conf" size="30" maxlength="30"></td>
 </tr>
 <tr>
  <td>Genre:</td>
  <td>
  	<select name="genre">
    	<option>General</option>
        <option>Affiliate</option>
        <option>Link Exchange</option>
    </select>
  </td>
 </tr>
 <tr>
  <td>Message:</td>
  <td><textarea name="message" id="conf" cols="30" rows="5"></textarea></td>
 </tr>
 <tr><td colspan=2 align="center">
Please enter the string shown in the image in the form.<br> The possible characters are letters from A to Z in capitalized form and the numbers from 0 to 9.</td></tr>
<tr><td align="center" colspan="2"><input name="number" type="text" id=\"number\"></td></tr>
<tr><td colspan="2" align="center"><img src="random_image.php"></td></tr>
 <tr>
  <td colspan="2" align="center"><input name="Submit" type="Submit" value="Submit">&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset"></td>
 </tr>
</table>
</form>
</div>
<!--END MAIN CONTENT-->
<?
		 }

?>

<?php get_footer(); ?> 