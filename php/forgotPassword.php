<?php
include_once "header.php";
require('connection.php');

if (isset($_POST['retrive'])) {

    $f_email =  trim(mysqli_real_escape_string($conn, $_POST['f_email']));
    $f_name = trim(mysqli_real_escape_string($conn, $_POST['f_name']));
    $f_address = trim(mysqli_real_escape_string($conn, $_POST['f_address']));

    $retrive_query = mysqli_query($conn, "SELECT * FROM patient WHERE p_email='$f_email'AND p_name='$f_name' AND p_address='$f_address'");


    $row = mysqli_num_rows($retrive_query);

    if ($row == "") {
?>
        <script>
            alert("Please Enter Proper details")
        </script>
    <?php

    } else {
    ?>
        <script>
            alert("Make Sure No One Is Watchine You!!!")
        </script>
<?php   


        $row = mysqli_fetch_assoc($retrive_query);
        $r_password = $row['p_password'];
        
    }
}

?>
<!-- Login form  starts-->
<div class="container form-css">
    <div class="jumbotron">
        <h1 class="text-center">Forgot Password</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="f_email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="page">Name</label>
                <input type="text" class="form-control" name="f_name" id="page" aria-describedby="emailHelp" placeholder="Enter Age" required>
            </div>
            <div class="form-group">
                <label for="page">Address</label>
                <input type="text" class="form-control" name="f_address" id="page" aria-describedby="emailHelp" placeholder="Enter Age" required>
            </div>

            <div>
                <a href="login.php" class="badge badge-danger">Login</a>
                <a href="registration.php" class="badge badge-warning">Create Account</a>
            </div>
            <br>
            <button type="submit" class="btn btn-primary form-control" name="retrive">Retrive Password</button>
        </form>
    </div>
</div>
<!-- Login form  Ends-->