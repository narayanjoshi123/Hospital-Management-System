<?php
include("include/connection.php");

if(isset($_POST['apply'])){

    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $username=$_POST['uname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $country=$_POST['country'];
    $password=$_POST['pass'];
    $confirm_password=$_POST['con_pass'];

    $error=array();

    if(empty($firstname)){
        $error['apply']="Enter firstname";
    }else if(empty($lastname)){
        $error['apply']="Enter lastname";
    }else if(empty($username)){
        $error['apply']="Enter username";
    }else if(empty($email)){
        $error['apply']="Enter email";
    }else if(empty($phone)){
        $error['apply']="Enter phone no.";
    }else if(empty($gender)){
        $error['apply']="Select gender";
    }else if(empty($country)){
        $error['apply']="Enter country";
    }else if(empty($password)){
        $error['apply']="Enter password";
    }else if($confirm_password!=$password){
        $error['apply']="Both password do not match";
    }

    if(count($error)==0){
        $query="INSERT INTO doctors(firstname, lastname, username, email, phone, gender, country, password, salary, data_reg, status, profile) VALUES('$firstname','$lastname','$username','$email','$phone','$gender','$country','$password','0',NOW(),'Pendding','doctor.jpg')";
    
        $result=mysqli_query($connect,$query);

        if($result){
          echo "<script>alert('You have successfully Applied')</script>";
          header("Location:doctorlogin.php");
        }else{
            echo "<script>alert('Failed')</script>";
          header("Location:doctorlogin.php");

        }
    }
}

if(isset($error['apply'])){
    $s=$error['apply'];
    $show="<h5 class='text-center alert alert-danger'>$s</h5>";
}else{
    $show="";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Apply now!!</title>
    </head>
    <body class="bg-info" style="background-image: url(img/hosp5.jpg);background-repeat: no-repeat; background-size:cover;">
        <?php
        include("include/header.php");
        ?>
         <div style="margin-top: 60px;"></div>
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 " style="background-color: #000; color:#fff; opacity:80%;">
                        
                        <h5 class="text-center">Apply Now!!!</h5>
                        <div>
                            <?php
                            echo $show;
                            ?>
                        </div>

                        <form method="post" class="my-2">


                            <div class="form-group">
                                <label>Firstname</label>
                                <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
                            </div>
                            <div class="form-group">
                                <label>lastname</label>
                                <input type="text" name="lname" class="form-control" autocomplete="off" placeholder="Enter lastname" value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter email address" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                            </div>
                           
                        
                           
                           
                            <div class="form-group">
                                <label>Phone number</label>
                                <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter phone no." value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
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
                            
                            <input type="submit" name="apply" class="btn btn-success" value="Apply Now">
                            <p>I already have an account<a href="doctorlogin.php"> Click here</a></p>
                            
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </body>
</html>