<?php 
session_start();
include_once("header.php");
include_once("functions.txt");
include("top.txt");
if(isset($_SESSION['userid'])){
?>



<h1>List of Users</h1>
<?php
$users_array = show_users();
$following_array = following($_SESSION['userid']);

if (count($users_array)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500'>
<?php
foreach ($users_array as $key => $value){
  echo "<tr valign='top'>\n";
	echo "<td>".$value;
	if (in_array($key,$following_array)){
		echo " <small><a href='action.php?id=$key&do=unfollow'>unfollow</a></small>";
	}else{
	      if($key == $_SESSION['userid'])
		  {
		    echo "<small><a href=''>This is You! :)</a></small>";
		  }
		  else{
		        echo "<small><a href='action.php?id=$key&do=follow'>follow</a></small>";}
	}
	echo "</td>\n";
	echo "</tr>\n";
}
?>
</table>
<?php
}else{
?>
<p><b>There are no users in the system!</b></p>
<?php
}
} else{ 
    $users_array = show_users();
	if (count($users_array)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500'>
<?php
foreach ($users_array as $key => $value){
	echo "<tr valign='top'>\n";
	echo "<td>".$value;
	echo "<small><a href='index.php'>follow</a></small>";
	}
	echo "</td>\n";
	echo "</tr>\n";
}
?>
</table>
</br>
</br>
<?php

   echo "You can be friends and follow them.";

?>
</br></br>
<form action="registration.php">
<input type="submit" value="Register To Continue"/></form>
</br></br>
<p>If already a member?
</br></br>
<form action="index.php">
<input type="submit" value="Login"/></form>
<?php
}
include("bottom.txt");
?>
