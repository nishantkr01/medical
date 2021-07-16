<?php
include("dashbord.php");
require('connection.php');
// session_start();
// if (isset($_GET['p_email'])) {
//     $email = $_GET['p_email'];
//     $email_search = "select * from patient where p_email='$email'";
//     $query = mysqli_query($conn, $email_search);

//     $row = mysqli_fetch_array($query);

//     echo $row['p_email'];
// }


$p_id = $_GET['p_id'];
echo $email;
$fetchQuery = "select * from patient where p_id='$p_id'";
$query1 = mysqli_query($conn, $fetchQuery);

$row = mysqli_fetch_array($query1);



?>
<div class="row justify-content-end">
    <div class="col-10 mt-5 cssdash ">





        <h1>User Profile</h1>
        <span>ID : <?php echo $row['p_id'];?></span>

        <form class="mr-4 mt-3">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Name</label>
                    <input type="email" class="form-control" name="e_name" id="inputEmail4" value="<?php echo $row['p_name'];?>">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">Age</label>
                    <input type="text" class="form-control" name="e_age" 
                    value="<?php echo $row['age'];?>" id="inputPassword4">
                </div>
            </div>

            <div class="form-group">
                <label for="q">Phone</label>
                <input type="text" class="form-control" id="q" 
                value="<?php echo $row['p_number'];?>">
            </div>


            <div class="form-group">
                <label for="email1">Email</label>
                <input type="text" class="form-control" name="e_email" id="email1" 
                value="<?php echo $row['p_email'];?>">
            </div>


            <div class="form-group">
                <label for="password1">Password</label>
                <input type="text" class="form-control" name="e_password" id="password1">
            </div>



            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" 
                value="<?php echo $row['p_address'];?>">
            </div>

            <button type="submit" name="submit" class="btn form-control btn-primary">Sign in</button>
        </form>

    </div>
</div>