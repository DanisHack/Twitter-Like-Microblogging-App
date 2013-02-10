<?php 
session_start();
include_once('header.php');
include_once('functions.txt');
include("top.txt");
if(isset($_SESSION['userid'])){

if (isset($_SESSION['message'])){
  echo "<b>". $_SESSION['message']."</b>";
	unset($_SESSION['message']);
}
?>
<form method='post' action='add.php'>
<p>Your status:</p>
<textarea name='body' rows='5' cols='40' wrap=VIRTUAL></textarea>
<p><input type='submit' value='submit'/></p>
</form>

<?php
$following = following($_SESSION['userid']);
$posts_array=show_posts($_SESSION["userid"]);
if (count($posts_array)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500'>
<?php
foreach ($posts_array as $key => $list){
	echo "<tr valign='top'>\n";?>
	
	<td><b><a href="profile.php" color="blue"><?php echo $_SESSION['username'] ?></a></b></td>
	<?php
	echo "<td>".$list['body'] ."<br/>\n";
	echo "<small>".$list['stamp'] ."</small></td>\n";
	echo "</tr>\n";
}
?>
</table>
<?php
}else{
?>
<p><b>You haven't posted anything yet!</b></p>
<?php
}

echo "<h2>Users you're following</h2>";



if (count($following)){
?>
<ul>
<?php
foreach ($following as $value){
	?>
	<li> <b><a href="profile.php" color="blue"><?php echo show_user_by_id($value);?></a></b></li>
<?php
}
?>
</ul>
<?php
}else{
?>
<p><b>You're not following anyone yet!</b></p>
<?php
}

foreach($following as $value)
{
  $posts_array2=show_posts($value);

if (count($posts_array2)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500'>
<?php
foreach ($posts_array2 as $key => $list){
	echo "<tr valign='top'>\n";?>
	<td><b><a href="profile.php" color="blue"><?php echo show_user_by_id($list['userid'])?></a></b></td>
	<?php
	echo "<td>".$list['body'] ."<br/>\n";
	echo "<small>".$list['stamp'] ."</small></td>\n";
	echo "</tr>\n";
}
?>
</table>
<?php
}else{
?>
<p><b>No posts!</b></p>
<?php
}}
} else{ echo "You're not a member yet.";

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
