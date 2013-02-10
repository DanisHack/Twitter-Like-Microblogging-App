<?php 
session_start();
include_once("header.php");
include_once("functions.txt");
include("top.txt");

if(isset($_SESSION['userid'])){

?>



<h1>List of Followers :)</h1>
<?php

$follower_array = follower($_SESSION['userid']);

if (count($follower_array)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500'>
<?php
foreach ($follower_array as $value){
  echo "<tr valign='top'>\n";?>
	<td><b><a href="follower.php" color="blue"><?php echo show_user_by_id($value)?></a></b></td>
	<?php
	echo "</tr>\n";
}
?>
</table>
<?php
}else{
?>
<p><b>You have no followers :( !</b></p>
<?php
}
} else{ echo "You're not a member yet.";

?>
</br></br>
<form action="registration.php">
<input type="submit" value="Register To Continue"/>
</form>
</br></br>
<p>If already a member?
</br></br>
<form action="index.php">
<input type="submit" value="Login"/>
</form>
<?php
}
include("bottom.txt");
?>
