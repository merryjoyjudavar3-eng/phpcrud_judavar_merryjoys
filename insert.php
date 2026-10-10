<?php
include 'database.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

mysqli_query($conn, "INSERT INTO students (firstname, lastname) 
VALUES ('$firstname', '$lastname')");

header("Location: index.php");
exit;