<?php

session_start();
if($username=="") {
Header("Location: http://lunaire.mysticallegends.com/admin/admin.php");
} else {
?>

<?php include("../head.php"); ?>

<?php

$target_path = "../../avatars/icons/";

$target_path = $target_path . basename( $_FILES['upload']['name']); 

if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['upload']['name']). 
    " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}


?>

<?php include("../foot.php"); ?>

<?php
}
?>