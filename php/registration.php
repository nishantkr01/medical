<?php
session_start();

include_once "connection.php";
if (isset($_POST['submit'])) {
    $p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
    $p_address = mysqli_real_escape_string($conn, $_POST['p_address']);
    // $p_symptoms = mysqli_real_escape_string($conn, $_POST['p_symptoms']);
    $p_num = mysqli_real_escape_string($conn, $_POST['p_num']);
    $p_age = mysqli_real_escape_string($conn, $_POST['p_age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $p_email = mysqli_real_escape_string($conn, $_POST['p_email']);
    $p_password = trim($_POST['p_password']);
    
    $pass = password_hash($p_password, PASSWORD_BCRYPT);
    // $status = mysqli_real_escape_string($conn, $_POST['status']);

    // echo $p_name . "<br>";
    // echo $p_address . "<br>";
    // echo $p_symptoms . "<br>";
    // echo $p_num . "<br>";
    // echo $p_age . "<br>";
    // echo $gender . "<br>";
    // echo $p_email . "<br>";
    // echo $pass . "<br>";

    $emailquery = "select * from patient where p_email='$p_email'";
    $query = mysqli_query($conn, $emailquery);

    $email_count = mysqli_num_rows($query);

    if ($email_count > 0) {
        ?>
            <script>alert("Email Id Already Registered !!!")</script>
        <?php
    } else {
        $insertPatient = "insert into patient(p_name,p_address, p_number, age, gender, p_email, p_password) values('$p_name','$p_address','$p_num','$p_age','$gender','$p_email','$pass')";
        // print_r($insertPatient);
        // exit;

        $iquery = mysqli_query($conn, $insertPatient);
        if ($iquery) {
        ?>
            <script>
                alert("Registerd Successfully");

                window.location.href = "login.php";
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Registration Failed");
            </script>
<?php
        }
    }
} else {
    
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Registation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom css -->
    <link rel="stylesheet" href="../main.css">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;&display=swap" rel="stylesheet"> -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-dark">



    <!-- Start navbar starts -->
    <nav class="navbar navbar-expand-lg nav-back fixed-top" id="nav">
        <div class="container">
            <a href="index.php" class="navbar-brand">Nettantra Medical</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#myNavbar" aria-control="myNavbar" arial-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-syringe fa-2x"></i>
            </button>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Medical Camps</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="registration.php" class="nav-link">SignUp</a>
                    </li>
            </div>
        </div>
    </nav>
    <!-- Ends navbar starts -->

    <!-- registration form  starts-->
    <div class="container form-css">
        <div class="jumbotron">
            <h1 class="text-center">Patient Regitration Page</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div class="form-group">
                    <label for="pname">Patient Name</label>
                    <input type="text" class="form-control" name="p_name" id="pname" aria-describedby="emailHelp" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label for="paddress">Patient Address</label>
                    <input type="text" class="form-control" name="p_address" id="paddress" aria-describedby="emailHelp" placeholder="Enter Address" required>
                </div>
                <!-- <div class="form-group">
                    <label for="symptoms">Symptoms</label>
                    <input type="text" class="form-control" name="p_symptoms" id="symptoms" aria-describedby="emailHelp" placeholder="Enter Name" required>
                </div> -->
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" name="p_num" id="pname" aria-describedby="emailHelp" placeholder="Enter Phone Number" required>
                </div>

                <div class="form-group">
                    <label for="page">age</label>
                    <input type="text" class="form-control" name="p_age" id="page" aria-describedby="emailHelp" placeholder="Enter Age" required>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="M">
                    <label class="form-check-label" for="exampleRadios1">
                        Male
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="F">
                    <label class="form-check-label" for="exampleRadios2">
                        Female
                    </label>
                </div><br>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="p_email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="p_password" id="password" placeholder="Password" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary form-control" name="submit">Submit</button>
                <small id="emailHelp" class="form-text text-muted">Already Have an account?<a href="login.php">login now</a></small>
            </form>

        </div>
    </div>
    <!-- registration form  Ends-->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>