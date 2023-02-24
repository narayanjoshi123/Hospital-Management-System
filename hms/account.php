<?php
include("include/connection.php");

if(isset($_POST['create'])){

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $country=$_POST['country'];
    $password=$_POST['pass'];
    $con_pass=$_POST['con_pass'];

    $error=array();

    if(empty($fname)){
        $error['ac']="Enter firstname";
    }else if(empty($lname)){
        $error['ac']="Enter lastname";
    }else if(empty($uname)){
        $error['ac']="Enter username";
    }else if(empty($email)){
        $error['ac']="Enter email";
    }else if(empty($phone)){
        $error['ac']="Enter phone no.";
    }else if($gender==""){
        $error['ac']="Select gender";
    }else if(empty($country)){
        $error['ac']="Enter country";
    }else if(empty($password)){
        $error['ac']="Enter password";
    }else if($con_pass!=$password){
        $error['ac']="Both password do not match";
    }


    if(count($error)==0){
        $query="INSERT INTO patient(firstname, lastname, username, email, phone, gender, country, password, date_reg, profile) VALUES('$fname','$lname','$uname','$email','$phone','$gender','$country','$password',NOW(),'doctor.jpg')";
    
        $res=mysqli_query($connect,$query);

        if($res){
          echo "<script>alert('You have successfully Applied')</script>";
          header("Location:patientlogin.php");
        }else{
            echo "<script>alert('Failed')</script>";
          header("Location:patientlogin.php");

        }
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Create Account</title>
    </head>
    <body class="bg-info" style="background-image: url(img/hosp5.jpg);background-repeat: no-repeat; background-size:cover;">
    <?php
        include("include/header.php")
        ?>
        <div style="margin-top: 60px;"></div>
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 jumbotron" style="background-color: #000; color:#fff; opacity:80%;">
                        <img src="img/admin1.jpg" class="col-md-6" style="margin-left: 100px;">
                        <h5 class="text-center text-info my-2">Create Account</h5>
                        <form method="post" class="my-2">

                       


                            <div class="form-group">
                                <label>Firstname</label>
                                <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
                            </div>
                            <div class="form-group">
                                <label>Lastname</label>
                                <input type="text" name="lname" class="form-control"  placeholder="Enter Lastname">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label>Phone No</label>
                                <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group">
                                <label>Select Gender</label>
                                <select name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" name="country" class="form-control" autocomplete="off" placeholder="Enter country name">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter password">
                            </div>

                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter confirm password">
                            </div>
                            
                            <input type="submit" name="create" class="btn btn-info my-3" value="Create Account">
                            <p>I already have an account<a href="patientlogin.php"> Click Here</a></p>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>

    </body>
</html>