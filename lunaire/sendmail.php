<?php
if(isset($_POST['submit'])) {

$to = "lunaire@mysticallegends.com";
$subject = "Email Us@";
$name = $_POST['name'];
$email = $_POST['email'];
$website = $_POST['website'];
$genre = $_POST['genre'];
$message = $_POST['message'];
 
$body = "From: $name\n E-Mail: $email\n Website: $website\n Genre: $genre\n Message:\n $message";
 
echo "Data has been submitted to $to!";
mail($to, $subject, $body);

} else {

header( "Location: http://lunaire.mysticallegends.com/thanks.php" );

}
?>
