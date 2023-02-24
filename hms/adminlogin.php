<?php
session_start();
include("include/connection.php");

if(isset($_POST['login'])){

    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    if(empty($username)){
        $error['admin'] = "Enter username";
    }elseif(empty($password)){
        $error['admin'] = "Enter password";
    }


    if(count($error)==0){
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

        $result = mysqli_query($connect,$query);

        if(mysqli_num_rows($result) == 1){
            echo "<script>alert('you have login as an admin')</script>";

            $_SESSION['admin']= $username;

           header("Location:admin/index.php");
           exit();

        }else{
            echo "<script>alert('Invalid username and password')</script>";
        }

        
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
     <title>Admin home page</title>
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
                        <form method="post" class="my-2">

                        <div>
                            <?php

                            if(isset($error['admin'])){
                                $sh = $error['admin'];
                                $show="<h6 class='alert alert-danger'>$sh</h6>";
                            }else{
                                $show="";
                            }
                            echo $show;
                            ?>
                        </div>


                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="pass" class="form-control"  placeholder="Enter password">
                            </div>
                            <input type="submit" name="login" class="btn btn-success" value="Login">
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </body>
</html>