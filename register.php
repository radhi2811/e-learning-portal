<?php
include 'includes/db.php';

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(name,email,password)
            VALUES('$name','$email','$password')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Registration Successful');</script>";
    }
    else
    {
        echo "<script>alert('Registration Failed');</script>";
    }
}

include 'includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card shadow mt-5">
            <div class="card-body">

                <h2 class="text-center mb-4">
                    Student Registration
                </h2>

                <form method="POST">

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               required>
                    </div>

                    <button type="submit"
                            name="register"
                            class="btn btn-primary w-100">
                        Register
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>