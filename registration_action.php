<?php

   include_once("top.txt");
   require_once("scripts.txt");



$passwords = $_POST["pword"];

if (validate($_POST) == "OK") {
    $dbh = new PDO('mysql:host=localhost;dbname=microblog', 'danish', 'danish');

    $checkUserStmt = $dbh->prepare("select * from users where username = ?");
    $checkUserStmt->bindParam(1, $name);
    $name = $_POST["name"];
    $checkUserStmt->execute();

    if ($checkUserStmt->rowCount() == 0) {

        $stmt = $dbh->prepare("insert into users (username, email, password) values (?, ?, ?)");

        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $pword);

        $name = $_POST["name"];
        $email = $_POST["email"];
        $pword = $passwords[0];

        $stmt->execute();

        echo "<p>Thank you for registering!</p>";?>
  	<form action="index.php">
        <input type="submit" value="Press To Continue"/></form>
		
		<?php

    } else {

        echo "<p>There is already a user with that name: </p>";

        $users = $dbh->query("SELECT * FROM users");
        while ($row = $users->fetch()) {
            echo $row["username"] . " -- " . $row["email"] . "<br />";
        }

    }
    $dbh = null;


} else {
    echo "<p>There was a problem with your registration:</p>";
    echo validate($_POST);?>
	
    <a href="registration.php">Please try again.</a>;
<?php
}

?>

<?php

   include("bottom.txt");

?>
