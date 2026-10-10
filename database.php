<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'phpcrud_judavar_merryjoy';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
