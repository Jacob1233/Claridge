<?php
$servername = "localhost";
$username = "clardige";
$password = "password1233";
$db = "claridge";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
