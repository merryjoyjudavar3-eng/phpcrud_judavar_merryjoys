`2<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Student List</h2>

        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add">
            Add New Student
        </button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM students");
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    echo "<tr>";
                    echo "<td>".$row['firstname']."</td>";
                    echo "<td>".$row['lastname']."</td>";
                    echo "<td>
                        <a href='update.php?id=$id' class='btn btn-sm btn-warning'>Edit</a>
                        <a href='delete.php?id=$id' class='btn btn-sm btn-danger'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="add" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="insert.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
