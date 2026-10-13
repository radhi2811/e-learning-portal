<?php
session_start();
include '../includes/db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student')
{
    header("Location: ../login.php");
    exit();
}

$total_courses = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM courses")
);

$total_lessons = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM lessons")
);

$user_id = $_SESSION['user_id'];

$user = mysqli_fetch_assoc(
    mysqli_query($conn,
    "SELECT * FROM users WHERE user_id='$user_id'")
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Student Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
    background:#f5f7fa;
}

.sidebar{
    width:250px;
    min-height:100vh;
    background:#198754;
}

.sidebar .nav-link{
    color:white;
    border-radius:8px;
    padding:10px;
}

.sidebar .nav-link:hover{
    background:#157347;
}

.card{
    border:none;
    border-radius:15px;
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

</style>

</head>
<body>

<div class="d-flex">

<div class="sidebar p-3">

    <h3 class="text-white mb-4">
        <i class="fas fa-user-graduate"></i>
        Student
    </h3>

    <ul class="nav flex-column">

        <li class="nav-item mb-2">
            <a href="dashboard.php"
               class="nav-link active">
               <i class="fas fa-home"></i>
               Dashboard
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="courses.php"
               class="nav-link">
               <i class="fas fa-book"></i>
               Courses
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="profile.php"
               class="nav-link">
               <i class="fas fa-user"></i>
               Profile
            </a>
        </li>

        <li class="nav-item mt-4">
            <a href="../logout.php"
               class="btn btn-danger w-100">
               Logout
            </a>
        </li>

    </ul>

</div>

<div class="container-fluid p-4">

<div class="card border-0 shadow mb-4">

<div class="card-body">

<h2>
🎓 Welcome,
<?php echo ucfirst($_SESSION['name']); ?>
</h2>

<p class="mb-0">
Continue learning and explore new courses.
</p>

</div>

</div>

<hr>

<div class="row">

<div class="col-md-4 mb-4">

<div class="card shadow">
<div class="card-body text-center">

<i class="fas fa-book fa-3x text-primary mb-3"></i>

<h1><?php echo $total_courses; ?></h1>

<h5>Total Courses</h5>

<a href="courses.php"
   class="btn btn-primary mt-2">
   View Courses
</a>

</div>
</div>

</div>

<div class="col-md-4 mb-4">

<div class="card shadow">
<div class="card-body text-center">

<i class="fas fa-file-lines fa-3x text-success mb-3"></i>

<h1><?php echo $total_lessons; ?></h1>

<h5>Total Lessons</h5>

</div>
</div>

</div>

<div class="col-md-4 mb-4">

<div class="card shadow">
<div class="card-body text-center">

<i class="fas fa-user fa-3x text-warning mb-3"></i>

<h5><?php echo $user['name']; ?></h5>

<p><?php echo $user['email']; ?></p>

<a href="profile.php"
   class="btn btn-warning">
   View Profile
</a>

</div>
</div>

</div>

</div>

</div>

</div>

</body>
</html>