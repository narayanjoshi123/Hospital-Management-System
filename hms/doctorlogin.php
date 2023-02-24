<?php
session_start();

include("include/connection.php");

if(isset($_POST['login'])){
    $uname=$_POST['uname'];
    $password=$_POST['pass'];

    $error=array();

    $q = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
    $qq=mysqli_query($connect,$q);

    $row=mysqli_fetch_array($qq);

    if(empty($uname)){
        $error['login']="Enter username";
    }else if(empty($password)){
        $error['login']="Enter password";
    }else if($row['status']=="Pendding"){
        $error['login']="Please wait for admin to confirm";
    }else if($row['status']=="Rejected"){
        $error['login']="Try again later";
    }

    if(count($error)==0){
        $query="SELECT * FROM doctors WHERE username='$uname' AND password='$password'";

        $res=mysqli_query($connect,$query);

        if(mysqli_num_rows($res)){
            echo "<script>alert('done')</script>";
            $_SESSION['doctor']=$uname;
            header("Location:doctor/index.php");
        }else{
            echo "<script>alert('Invalid Account')</script>";
        }
    }
}
if(isset($error['login'])){
    $l=$error['login'];
    $show="<h5 class='text-center alert alert-danger'>$l</h5>";
}else{
    $show="";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Doctor login page</title>
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
                        <img src="img/admin1.jpg" class="col-md-6" style="margin-left: 100px;">
                        <h5 class="text-center">Doctors login</h5>
                        <div>
                            <?php echo $show; ?>
                        </div>


                        <form method="post" class="my-2">


                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="pass" class="form-control"  placeholder="Enter password">
                            </div>
                            <input type="submit" name="login" class="btn btn-success" value="Login">
                            <br>
                            <p>I don't have an account<a href="apply.php"> Apply Now!!!</a></p>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </body>
</html>