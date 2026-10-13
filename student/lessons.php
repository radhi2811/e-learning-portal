<?php
session_start();
include '../includes/db.php';

if($_SESSION['role'] != 'student')
{
    header("Location: ../login.php");
    exit();
}

if(!isset($_GET['course_id']))
{
    header("Location: courses.php");
    exit();
}

$course_id = $_GET['course_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lessons</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<h2 class="mb-4">Course Lessons</h2>

<?php

$result = mysqli_query($conn,

"SELECT * FROM lessons
 WHERE course_id='$course_id'");

while($row =
      mysqli_fetch_assoc($result))
{
?>

<div class="card shadow mb-3">

<div class="card-body">

<h4>
<?php echo $row['lesson_title']; ?>
</h4>

<p>
<?php echo $row['lesson_content']; ?>
</p>

</div>

</div>

<?php } ?>
<a href="courses.php"
       class="btn btn-secondary">
       Back
    </a>

</div>

</body>
</html>
