<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>E-Learning Portal</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fa;
}

.hero{
    background:linear-gradient(
    135deg,
    #4f46e5,
    #7c3aed,
    #ec4899
    );

    color:white;

    padding:120px 0;
}

.card{
    background:rgba(255,255,255,0.7);

    backdrop-filter:blur(10px);

    border:none;

    border-radius:20px;

    transition:0.3s;

    box-shadow:
    0 8px 20px rgba(0,0,0,0.08);
}

.card:hover{
    transform:translateY(-10px);
}

.btn{
    border-radius:30px;
}

.feature-icon{
    font-size:60px;
}

</style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

        <a class="navbar-brand fw-bold" href="#">
            🎓 E-Learning Portal
        </a>

        <div>
            <a href="login.php"
               class="btn btn-light me-2">
               Login
            </a>

            <a href="register.php"
               class="btn btn-warning">
               Register
            </a>
        </div>

    </div>
</nav>

<!-- Hero Section -->

<section class="hero">

<div class="container text-center">

<h1 class="display-3 fw-bold">
Master New Skills with E-Learning Portal
</h1>

<div class="mt-5">
    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png"
         width="220"
         class="img-fluid">
</div>

<p class="lead mt-3">
Learn anytime, anywhere and build your future through online education.
</p>

<div class="mt-4">

<a href="register.php"
class="btn btn-warning btn-lg me-3">
Get Started
</a>

<a href="login.php"
class="btn btn-outline-light btn-lg">
Login
</a>

</div>

</div>

</section>

<!-- Features -->

<section class="container py-5">

<h2 class="text-center mb-5">
Why Choose Us?
</h2>

<div class="row">

<div class="col-md-4 mb-4">
<div class="card shadow border-0 h-100">
<div class="card-body text-center">

<div class="feature-icon">📚</div>

<h4>Quality Courses</h4>

<p>
Well-structured courses and lessons designed for beginners and learners.
</p>

</div>
</div>
</div>

<div class="col-md-4 mb-4">
<div class="card shadow border-0 h-100">
<div class="card-body text-center">

<div class="feature-icon">💻</div>

<h4>Learn Anywhere</h4>

<p>
Access your learning materials from any device at any time.
</p>

</div>
</div>
</div>

<div class="col-md-4 mb-4">
<div class="card shadow border-0 h-100">
<div class="card-body text-center">

<div class="feature-icon">🚀</div>

<h4>Build Skills</h4>

<p>
Improve your knowledge and prepare yourself for better opportunities.
</p>

</div>
</div>
</div>

</div>

</section>

<!-- Footer -->

<footer class="bg-dark text-white text-center p-4">

<h5>E-Learning Portal</h5>

<p>
Learn • Practice • Grow
</p>

<small>
© 2026 All Rights Reserved
</small>

</footer>
</body>
</html>