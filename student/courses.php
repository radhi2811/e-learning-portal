<?php
session_start();
include '../includes/db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student')
{
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Courses</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
    background:#f5f7fa;
}

.course-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
    transition:0.3s;
    height:100%;
}

.course-card:hover{
    transform:translateY(-8px);
}

.course-header{
    height:120px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:40px;
}

.card-title{
    min-height:60px;
}

.bg-html{
    background:linear-gradient(135deg,#ff6b6b,#ff8e53);
}

.bg-css{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
}

.bg-js{
    background:linear-gradient(135deg,#f7971e,#ffd200);
}

.bg-default{
    background:linear-gradient(135deg,#667eea,#764ba2);
}

</style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">

        <a class="navbar-brand fw-bold" href="dashboard.php">
            🎓 E-Learning Portal
        </a>

        <div>
            <a href="dashboard.php"
               class="btn btn-light me-2">
               Dashboard
            </a>

            <a href="profile.php"
               class="btn btn-warning">
               Profile
            </a>
        </div>

    </div>
</nav>

<div class="container mt-5">

<div class="text-center mb-5">

    <h1 class="fw-bold">
        Available Courses
    </h1>

    <p class="text-muted">
        Explore courses and start learning today.
    </p>

</div>

<div class="row mb-4">

    <div class="col-md-6 mx-auto">

        <input type="text"
               id="searchCourse"
               class="form-control form-control-lg"
               placeholder="🔍 Search Courses...">

    </div>

</div>

<div class="row">

<?php

$result = mysqli_query($conn,
"SELECT * FROM courses");

while($row = mysqli_fetch_assoc($result))
{
    $class = "bg-default";

    if(stripos($row['course_name'],'html') !== false)
    {
        $class = "bg-html";
    }
    elseif(stripos($row['course_name'],'css') !== false)
    {
        $class = "bg-css";
    }
    elseif(stripos($row['course_name'],'javascript') !== false)
    {
        $class = "bg-js";
    }

    $iconClass = "fas fa-book-open";

    if(stripos($row['course_name'],'html') !== false)
    {
        $iconClass = "fab fa-html5";
    }
    elseif(stripos($row['course_name'],'css') !== false)
    {
        $iconClass = "fab fa-css3-alt";
    }
    elseif(stripos($row['course_name'],'javascript') !== false)
    {
        $iconClass = "fab fa-js";
    }
    elseif(stripos($row['course_name'],'php') !== false)
    {
        $iconClass = "fab fa-php";
    }
    elseif(stripos($row['course_name'],'mysql') !== false)
    {
        $iconClass = "fas fa-database";
    }
?>

<div class="col-md-4 mb-4 course-item">

    <div class="card course-card shadow">

        <div class="course-header <?php echo $class; ?>">

            <i class="<?php echo $iconClass; ?>"></i>

        </div>

        <div class="card-body">

            <span class="badge bg-success mb-2">
                Beginner
            </span>

            <h4 class="card-title">
                <?php echo htmlspecialchars($row['course_name']); ?>
            </h4>

            <p class="text-muted">
                <?php echo htmlspecialchars($row['description']); ?>
            </p>

            <a href="lessons.php?course_id=<?php echo $row['course_id']; ?>"
               class="btn btn-primary w-100">
               View Lessons
            </a>

        </div>

    </div>

</div>

<?php
}
?>

</div>

</div>

<script>

document.getElementById("searchCourse")
.addEventListener("keyup", function(){

    let value = this.value.toLowerCase();

    let cards =
    document.querySelectorAll(".course-item");

    cards.forEach(function(card){

        let text =
        card.innerText.toLowerCase();

        if(text.includes(value))
        {
            card.style.display = "";
        }
        else
        {
            card.style.display = "none";
        }

    });

});

</script>

</body>
</html>