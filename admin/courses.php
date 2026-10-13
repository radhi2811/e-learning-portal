<?php
session_start();
include '../includes/db.php';

if($_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

if(isset($_POST['add_course']))
{
    $course_name = $_POST['course_name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO courses(course_name, description)
            VALUES('$course_name','$description')";

    mysqli_query($conn,$sql);
}
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM courses WHERE course_id='$id'");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Courses</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">Manage Courses</h2>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form method="POST">
            <h3>Available Courses</h3>

<table class="table table-bordered">

    <tr>
        <th>ID</th>
        <th>Course Name</th>
        <th>Description</th>
        <th>Action</th>
    </tr>

<?php

$result = mysqli_query($conn,
          "SELECT * FROM courses");

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>
    <td><?php echo $row['course_id']; ?></td>
    <td><?php echo $row['course_name']; ?></td>
    <td><?php echo $row['description']; ?></td>

   <td>
<a href="delete_course.php?id=<?php echo $row['course_id']; ?>"
class="btn btn-sm btn-danger"
onclick="return confirm('Delete this course?')">
<i class="fas fa-trash"></i>
 Delete
</a>
</td>
</tr>

<?php
}
?>

</table>

</div>

</body>
</html>

                <div class="mb-3">
                    <label>Course Name</label>
                    <input type="text"
                           name="course_name"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea
                        name="description"
                        class="form-control"
                        rows="3"
                        required></textarea>
                </div>

                <button
                    type="submit"
                    name="add_course"
                    class="btn btn-primary">
                    Add Course
                </button>
         
         <a href="dashboard.php"
       class="btn btn-secondary">
       Back
    </a>

            </form>

        </div>
    </div>