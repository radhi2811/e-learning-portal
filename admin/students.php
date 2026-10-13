<?php
session_start();
include '../includes/db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

$result = mysqli_query($conn,
"SELECT * FROM users WHERE role='student'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Students</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">Registered Students</h2>

    <table class="table table-bordered table-striped">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>

        <?php } ?>

    </table>

    <a href="dashboard.php"
       class="btn btn-secondary">
       Back
    </a>

</div>

</body>
</html>