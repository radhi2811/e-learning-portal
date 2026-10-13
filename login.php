<?php
session_start();
include 'includes/db.php';

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        if($user['role'] == 'admin')
        {
            header("Location: admin/dashboard.php");
        }
        else
        {
            header("Location: student/dashboard.php");
        }
        exit();
    }
    else
    {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}

include 'includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-5">

        <div class="card shadow mt-5">
            <div class="card-body">

                <h2 class="text-center mb-4">Login</h2>

                <form method="POST">

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email"
                               class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password"
                               class="form-control" required>
                    </div>

                    <button type="submit"
                            name="login"
                            class="btn btn-primary w-100">
                        Login
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>