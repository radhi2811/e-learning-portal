<?php
session_start();
include '../includes/db.php';

if($_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

if(isset($_POST['add_lesson']))
{
    $course_id = $_POST['course_id'];
    $lesson_title = $_POST['lesson_title'];
    $lesson_content = $_POST['lesson_content'];

    $sql = "INSERT INTO lessons
            (course_id, lesson_title, lesson_content)
            VALUES
            ('$course_id','$lesson_title','$lesson_content')";

    mysqli_query($conn,$sql);
}

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM lessons WHERE lesson_id='$id'");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Lessons</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<h2 class="mb-4">Manage Lessons</h2>

<div class="card shadow mb-4">
<div class="card-body">

<form method="POST">
<div class="mb-3">

<label>Select Course</label>

<select name="course_id"
        class="form-control"
        required>

<option value="">
Select Course
</option>

<?php

$courses = mysqli_query($conn,
           "SELECT * FROM courses");

while($course =
      mysqli_fetch_assoc($courses))
{
?>

<option value="<?php echo $course['course_id']; ?>">
<?php echo $course['course_name']; ?>
</option>

<?php } ?>

</select>

</div>
<div class="mb-3">
    <label>Lesson Title</label>

    <input type="text"
           name="lesson_title"
           class="form-control"
           required>
</div>

<div class="mb-3">
    <label>Lesson Content</label>

    <textarea
        name="lesson_content"
        class="form-control"
        rows="5"
        required></textarea>
</div>

<button
    type="submit"
    name="add_lesson"
    class="btn btn-success">
    Add Lesson
</button>

</form>

</div>
</div>
<h3>Available Lessons</h3>

<table class="table table-bordered">

<tr>
    <th>ID</th>
    <th>Course</th>
    <th>Lesson</th>
    <th>Action</th>
</tr>

<?php

$result = mysqli_query($conn,

"SELECT lessons.*,
courses.course_name

FROM lessons

INNER JOIN courses

ON lessons.course_id =
courses.course_id");

while($row =
      mysqli_fetch_assoc($result))
{
?>

<tr>

<td>
<?php echo $row['lesson_id']; ?>
</td>

<td>
<?php echo $row['course_name']; ?>
</td>

<td>
<?php echo $row['lesson_title']; ?>
</td>

<td>
<a href="delete_lesson.php?id=<?php echo $row['lesson_id']; ?>"
class="btn btn-sm btn-danger"
onclick="return confirm('Delete this lesson?')">
<i class="fas fa-trash"></i>
 Delete
</a>
</td>

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