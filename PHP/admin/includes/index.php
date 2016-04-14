<?php
$servername = "localhost";
$username = "jacob";
$password = "Frankie1233!";
$db = "jacob_claridge_lib";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
