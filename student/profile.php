<?php
session_start();
include '../includes/db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student')
{
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if(isset($_POST['upload_image']))
{
    if(isset($_FILES['profile_image']) &&
       $_FILES['profile_image']['error'] == 0)
    {
        $filename =
        time() . "_" .
        basename($_FILES['profile_image']['name']);

        $target =
        "../uploads/profiles/" . $filename;

        if(move_uploaded_file(
            $_FILES['profile_image']['tmp_name'],
            $target))
        {
            mysqli_query($conn,
            "UPDATE users
             SET profile_image='$filename'
             WHERE user_id='$user_id'");
        }

        header("Location: profile.php");
        exit();
    }
}

$result = mysqli_query($conn,
"SELECT * FROM users
 WHERE user_id='$user_id'");

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>My Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
    background:#f5f7fa;
}

.profile-card{
    max-width:700px;
    margin:auto;
    margin-top:40px;
    border:none;
    border-radius:20px;
    overflow:hidden;
}

.profile-header{
    height:120px;
    background:linear-gradient(
    135deg,
    #667eea,
    #764ba2
    );
}

.profile-avatar{
    width:140px;
    height:140px;
    border-radius:50%;
    overflow:hidden;
    background:white;
    margin:auto;
    margin-top:-70px;
    border:5px solid white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:60px;
    color:#667eea;
}

.profile-avatar img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.info-box{
    background:#f8f9fa;
    border-radius:12px;
    padding:15px;
    margin-bottom:15px;
}

.upload-section{
    background:#f8f9fa;
    border-radius:12px;
    padding:20px;
}

</style>

</head>
<body>

<div class="container">

<div class="card shadow profile-card">

<div class="profile-header"></div>

<div class="card-body">

<div class="text-center">

<div class="profile-avatar">

<?php if(!empty($user['profile_image'])) { ?>

<img src="../uploads/profiles/<?php echo $user['profile_image']; ?>">

<?php } else { ?>

<i class="fas fa-user"></i>

<?php } ?>

</div>

<h2 class="mt-3">
<?php echo htmlspecialchars($user['name']); ?>
</h2>

<p class="text-muted">
Student
</p>

</div>

<hr>

<div class="info-box">

<h5>
<i class="fas fa-user"></i>
 Name
</h5>

<p class="mb-0">
<?php echo htmlspecialchars($user['name']); ?>
</p>

</div>

<div class="info-box">

<h5>
<i class="fas fa-envelope"></i>
 Email
</h5>

<p class="mb-0">
<?php echo htmlspecialchars($user['email']); ?>
</p>

</div>

<div class="info-box">

<h5>
<i class="fas fa-user-tag"></i>
 Role
</h5>

<p class="mb-0">
<?php echo ucfirst($user['role']); ?>
</p>

</div>

<div class="upload-section mt-4">

<h5 class="mb-3">
<i class="fas fa-camera"></i>
 Change Profile Picture
</h5>

<form method="POST"
      enctype="multipart/form-data">

<div class="mb-3">

<input type="file"
       name="profile_image"
       class="form-control"
       required>

</div>

<button type="submit"
        name="upload_image"
        class="btn btn-success">

<i class="fas fa-upload"></i>
 Upload Photo

</button>

</form>

</div>

<div class="text-center mt-4">

<a href="dashboard.php"
class="btn btn-primary">

<i class="fas fa-arrow-left"></i>
 Back to Dashboard

</a>

<a href="edit_profile.php"
   class="btn btn-warning">
   Edit Profile
</a>

<a href="../logout.php"
class="btn btn-danger">

<i class="fas fa-sign-out-alt"></i>
 Logout

</a>

</div>

</div>

</div>

</div>

</body>
</html>