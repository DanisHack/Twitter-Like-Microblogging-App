<?php
session_start();
include_once("header.php");
include_once("functions.txt");

$userid = $_SESSION['userid'];
$body = substr($_POST['body'],0,140);

add_post($userid,$body);
$_SESSION['message'] = "Your post has been updated!";

header("Location:profile.php");
?>
