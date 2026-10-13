<?php
session_start();
include '../includes/db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student')
{
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn,
"SELECT * FROM users WHERE user_id='$user_id'");

$user = mysqli_fetch_assoc($result);

$message = "";

if(isset($_POST['update_profile']))
{
    $name = mysqli_real_escape_string(
        $conn,
        $_POST['name']
    );

    $email = mysqli_real_escape_string(
        $conn,
        $_POST['email']
    );

    mysqli_query($conn,
    "UPDATE users
     SET name='$name',
         email='$email'
     WHERE user_id='$user_id'");

    $_SESSION['name'] = $name;

    $message =
    "<div class='alert alert-success'>
    Profile updated successfully.
    </div>";

    $result = mysqli_query($conn,
    "SELECT * FROM users
     WHERE user_id='$user_id'");

    $user = mysqli_fetch_assoc($result);
}
?>

<?php

if(isset($_POST['change_password']))
{
    $old_password =
    $_POST['old_password'];

    $new_password =
    $_POST['new_password'];

    $confirm_password =
    $_POST['confirm_password'];

    if($old_password != $user['password'])
    {
        $message =
        "<div class='alert alert-danger'>
        Old password is incorrect.
        </div>";
    }
    elseif($new_password != $confirm_password)
    {
        $message =
        "<div class='alert alert-danger'>
        Passwords do not match.
        </div>";
    }
    else
    {
        mysqli_query($conn,
        "UPDATE users
         SET password='$new_password'
         WHERE user_id='$user_id'");

        $message =
        "<div class='alert alert-success'>
        Password changed successfully.
        </div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>

<title>Edit Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<style>

body{
    background:#f5f7fa;
}

.card{
    border:none;
    border-radius:20px;
}

</style>

</head>
<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-body">

<h2>Edit Profile</h2>

<?php echo $message; ?>

<hr>
<form method="POST">

<div class="mb-3">

<label>Name</label>

<input type="text"
       name="name"
       class="form-control"
       value="<?php echo $user['name']; ?>"
       required>

</div>

<div class="mb-3">

<label>Email</label>

<input type="email"
       name="email"
       class="form-control"
       value="<?php echo $user['email']; ?>"
       required>

</div>

<button type="submit"
        name="update_profile"
        class="btn btn-primary">

Update Profile

</button>

</form>
<hr>

<h4>Change Password</h4>

<form method="POST">

<div class="mb-3">

<label>Old Password</label>

<input type="password"
       name="old_password"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>New Password</label>

<input type="password"
       name="new_password"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Confirm Password</label>

<input type="password"
       name="confirm_password"
       class="form-control"
       required>

</div>

<button type="submit"
        name="change_password"
        class="btn btn-success">

Change Password

</button>

</form>
<hr>

<a href="profile.php"
class="btn btn-secondary">
Back
</a>

<a href="dashboard.php"
class="btn btn-primary">
Dashboard
</a>

</div>
</div>
</div>

</body>
</html>