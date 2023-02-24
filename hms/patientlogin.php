<?php
session_start();

include("include/connection.php");

if(isset($_POST['login'])){
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];

    if(empty($uname)){
        echo "<script>alert('Enter Username')</script>";   
    }else if(empty($pass)){
        echo "<script>alert('Enter Password')</script>";  
    }else{
        $query="SELECT * FROM patient WHERE username='$uname' AND password='$pass'";
        $res=mysqli_query($connect,$query);

        if(mysqli_num_rows($res)==1){
             header("Location:patient/index.php");
             $_SESSION['patient']=$uname;
        }else{
            echo "<script>alert('Invalid Account')</script>"; 
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Patient Login</title>
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
                    <div class="col-md-6 " style="background-color: #000; color:#fff; opacity:80%;">
                        <img src="img/admin1.jpg" class="col-md-6" style="margin-left: 100px;">
                        <h5>Patient Login</h5>
                        <form method="post" class="my-2">

                       


                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="pass" class="form-control"  placeholder="Enter password">
                            </div>
                            <input type="submit" name="login" class="btn btn-info my-3" value="Login">
                            <p>I don't have an account<a href="account.php"> Apply Now!!!</a></p>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>

    </body>
</html>