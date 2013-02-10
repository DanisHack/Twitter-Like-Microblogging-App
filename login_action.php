<?php
session_start();

require("scripts.txt");

$name = $_POST["username"];
$pword = $_POST["password"];
if(strlen($name)>0 || strlen($pword)>0){

$dbh = new PDO('mysql:host=localhost;dbname=microblog', 'danish', 'danish');

$stmt = $dbh->prepare("select * from users where username = :user and password = :pword");

$stmt->bindParam("user", $name);
$stmt->bindParam("pword", $pword);



$stmt->execute();

$loginOK = false;

if ($row = $stmt->fetch()) {
    $loginOK = true;
    $_SESSION["username"] = $row["username"];
    $_SESSION["email"] = $row["email"];
  $_SESSION["userid"] = $row["id"];
}

$dbh = null;

include("top.txt");

if ($loginOK) {
    echo "You are logged in.  Thank you!";
?>
<form action="profile.php"/>
<input type="submit" value="Press To Continue"/>
<?php
} else {
    echo "There is no user account with that username and password.";
	?><a href="index.php">Please try again.</a><?php
}
}else{  
    include("top.txt");
    echo "You have left empty space"?>
	<a href="index.php">Please try again.</a>
	<?php
    }
include("bottom.txt");
?>
