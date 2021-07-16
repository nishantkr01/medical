<?php
include_once "header.php";
require('connection.php');
session_start();

if(!isset($_SESSION['p_email']))
{
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['p_email']);
    $password = trim(mysqli_real_escape_string($conn, $_POST['p_password']));

    $email_search = "select * from patient where p_email='$email'";
    $query = mysqli_query($conn, $email_search);

    $email_count = mysqli_num_rows($query);

    if ($email_count) {
        $email_pass = mysqli_fetch_assoc($query);

        $db_pass = $email_pass['p_password'];



    if (password_verify($password, $db_pass)) {
        $_SESSION['p_email'] = $email_pass['p_email'];
        $_SESSION['p_name'] = $email_pass['p_name'];
        $_SESSION['p_id'] = $email_pass['p_id'];
        ?>
            <script>
                alert('Login Successfully');
            </script>  
            <script>
                location.replace("dashbord.php");
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Login Failed');
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert('invalid Email');
        </script>
<?php
    }
}
}else{
    ?>
    <script>
        location.replace("dashbord.php");
    </script>
<?php
}
?>

<style>
    body {
        background-color: wheat;
    }
</style>
<!-- Login form  starts-->
<div class="container form-css">
    <div class="jumbotron">
        <h1 class="text-center">Patient Login Page</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="p_email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="p_password" id="password" placeholder="Password" required>
            </div>
            <div>
                <a href="forgotPassword.php" class="badge badge-danger">Forgot Password</a>
                <a href="registration.php" class="badge badge-warning">Create Account</a>
            </div>
            <br>
            <button type="submit" class="btn btn-primary form-control" name="login">Login</button>
        </form>
    </div>
</div>
<!-- Login form  Ends-->