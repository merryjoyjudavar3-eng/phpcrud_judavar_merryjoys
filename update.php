<?php
include 'database.php';

// ✅ Get ID from URL, NOT from POST
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("No ID provided! Go back.");
}
$id = $_GET['id'];

// ✅ Get existing data first
$result = mysqli_query($conn, "SELECT * FROM students WHERE id = '$id'");
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Record not found!");
}

// ✅ Handle form submission
if (isset($_POST['update'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);

    // ✅ Complete UPDATE query with WHERE clause
    $sql = "UPDATE students SET firstname = '$firstname', lastname = '$lastname' WHERE id = '$id'";
    
    mysqli_query($conn, $sql);
    
    header("Location: index.php");
    exit;
}
?>

<!-- ✅ The Edit Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    
    <form method="POST" action="">
        <label>First Name:</label><br>
        <input type="text" name="firstname" value="<?= htmlspecialchars($row['firstname']) ?>" required><br><br>
        
        <label>Last Name:</label><br>
        <input type="text" name="lastname" value="<?= htmlspecialchars($row['lastname']) ?>" required><br><br>
        
        <button type="submit" name="update">Update</button>
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>