<?php
session_start();
include '../includes/db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

$total_courses = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM courses")
);

$total_lessons = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM lessons")
);

$total_students = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM users WHERE role='student'")
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

      <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <style>
        body{
            background:#f4f6f9;
        }

        .card{
            border:none;
            border-radius:15px;
            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-5px);
        }

        .stat-number{
            font-size:32px;
            font-weight:bold;
        }

       body{
    background:#f5f7fa;
}

.nav-link{
    border-radius:8px;
}

.nav-link:hover{
    background:#0d6efd;
}
 
.nav-link.active{
    background:#0d6efd;
}

.card{
    border-radius:15px;
    transition:0.3s;
    box-shadow:0 4px 15px rgba(0,0,0,0.1);
}

.card:hover{
    transform:translateY(-5px);
}
    </style>
</head>
<body>
<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white p-3"
         style="width:250px; min-height:100vh;">

        <h3 class="mb-4">
            <i class="fas fa-graduation-cap"></i>
            Admin
        </h3>

        <ul class="nav flex-column">

            <li class="nav-item mb-2">
                <a href="dashboard.php"
                   class="nav-link text-white active">
                   <i class="fas fa-home"></i>
                   Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="courses.php"
                   class="nav-link text-white">
                   <i class="fas fa-book"></i>
                   Courses
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="lessons.php"
                   class="nav-link text-white">
                   <i class="fas fa-file-lines"></i>
                   Lessons
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="students.php"
                   class="nav-link text-white">
                   <i class="fas fa-users"></i>
                   Students
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

    <!-- Main Content -->
    <div class="container-fluid p-4">
        <hr>
     <div class="card border-0 shadow mb-4">

<div class="card-body">

<h2>
👋 Welcome,
<?php echo ucfirst($_SESSION['name']); ?>
</h2>

<p class="mb-0">
Manage courses, lessons and students from one place.
</p>

</div>

</div>

        <!-- Cards Here -->
   <div class="row">

    <div class="col-md-4 mb-4">
        <div class="card shadow border-0">
            <div class="card-body text-center">

                <i class="fas fa-book fa-3x text-primary mb-3"></i>

                <h1><?php echo $total_courses; ?></h1>

                <h5>Total Courses</h5>

                <a href="courses.php" class="btn btn-primary mt-2">
                    Manage Courses
                </a>

            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow border-0">
            <div class="card-body text-center">

                <i class="fas fa-file-lines fa-3x text-success mb-3"></i>

                <h1><?php echo $total_lessons; ?></h1>

                <h5>Total Lessons</h5>

                <a href="lessons.php" class="btn btn-success mt-2">
                    Manage Lessons
                </a>

            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow border-0">
            <div class="card-body text-center">

                <i class="fas fa-users fa-3x text-warning mb-3"></i>

                <h1><?php echo $total_students; ?></h1>

                <h5>Total Students</h5>

                <a href="students.php" class="btn btn-warning mt-2">
                    View Students
                </a>

            </div>
        </div>
    </div>

</div>

    </div>

</div>

</body>
</html>