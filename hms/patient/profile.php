<?php 
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Patient Profile</title>
    </head>
    <body>
    <?php 
        include("../include/header.php");
        include("../include/connection.php");
    ?>
    <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include("sidenav.php");
                    $patient=$_SESSION['patient'];
                    $query="SELECT * FROM patient WHERE username='$patient'";
                    $res=mysqli_query($connect,$query);
                    $row=mysqli_fetch_array($res);
                    ?>
                    </div>
                    <div class="col-md-10">
                    <div class="col-md-12">
                     <div class="row">
                     <div class="col-md-6">
                         <?php 
                         if(isset($_POST['upload'])){

                            $img=$_FILES['img']['name'];
                            if(empty($img)){

                            }else{
                                $query="UPDATE patient SET profile='$img' WHERE username='$patient'";

                                $res=mysqli_query($connect,$query);
                                if($res){
                                    move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
                                }
                            }
                        }
                         ?>
                    
                         <h5>
                             My Profile
                         </h5>
                         <form method="POST" enctype="multipart/form-data">
                                        <?php 
                                        echo "<img src='img/".$row['profile']."' style='height: 250px;' class='col-md-12 my-3'>"
                                        ?>
                                        <input type="file" name="img" class="form-control my-1">
                                        <input type="submit" name="upload" class="btn btn-success" value="Update Profile">
                                        
                         </form>
                         <div class="my-3">
                                        <table class="table table-bordered">
                                            <tr><th colspan="2" class="text-center">Details</th></tr>
                                            <tr>
                                                <td>Firstname</td>
                                                <td><?php echo $row['firstname'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Lastname</td>
                                                <td><?php echo $row['lastname'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Username</td>
                                                <td><?php echo $row['username'];?></td>
                                            </tr>
                                            <tr>
                                                <td>E-mail</td>
                                                <td><?php echo $row['email'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone No.</td>
                                                <td><?php echo $row['phone'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td><?php echo $row['gender'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Country</td>
                                                <td><?php echo $row['country'];?></td>
                                            </tr>
                                        
                                        </table>
                                    </div>
                     </div>
                     <div class="col-md-6">
                     <h5 class="text-center my-2">Change Username</h5>
                     <?php
                                    if(isset($_POST['update']))
                                    {
                                        $uname=$_POST['uname'];
                                        if(empty($uname)){

                                        }else{
                                            $query="UPDATE patient SET username='$uname' WHERE username='$patient'";
                                            $res=mysqli_query($connect,$query);
                                            if($res){
                                                $_SESSION['patient']=$uname;
                                            }

                                        }                                       

                                    }
                                    ?>

                                    <form method="POST">
                                        <label>Change Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter username"><br>
                                        <input type="submit" name="update" class="btn btn-success" value="Update Username">
                                    </form>
                                    <br>
                                    <h5 class="text-center my-2">Change Password</h5>
                                    <?php
                                    
                                    if(isset($_POST['change']))
                                    {
                                        $old=$_POST['old_pass'];
                                        $new=$_POST['new_pass'];
                                        $con=$_POST['con_pass'];
                                          
                                        $q="SELECT * FROM patient WHERE username='$patient'";
                                        $re=mysqli_query($connect,$q);
                                        $row=mysqli_fetch_array($re);

                                        if($old != $row['password']){
                                            echo "<script>alert('Check the password')</script>";

                                        }else if(empty($new)){
                                            echo "<script>alert('Enter new password')</script>";

                                        }else if(empty($old)){
                                            echo "<script>alert('Enter old password')</script>";

                                        }else if($con!=$new){
                                            echo "<script>alert('Both Password Dont't Match')</script>";

                                        }else{
                                            $query="UPDATE patient SET password='$new' WHERE username ='$patient '";
                                            mysqli_query($connect,$query);
                                        }

                                    }
                                    ?>

                                    <form method="POST">
                                        <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter old password"><br>
                                        
                                        </div>
                                        <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter new password"><br>
                                        
                                        </div>
                                        <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter confirm password"><br>
                                        
                                        </div>
                                        <input type="submit" name="change" class="btn btn-info" value="Change Password">
                                    </form>
                     </div>
                     </div>
                    </div>
                    </div>
                </div>
            </div>
    </div>

    </body>
</html>