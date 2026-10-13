<!DOCTYPE html>
<html lang="en">
<head>
  <style>
.hero {
    background: linear-gradient(135deg, #0d6efd, #6ea8fe);
    color: white;
    padding: 100px 0;
    border-radius: 15px;
}

.hero h1{
    font-size: 3rem;
    font-weight: bold;
}

.feature-card{
    transition: 0.3s;
}

.feature-card:hover{
    transform: translateY(-5px);
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">E-Learning Portal</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">