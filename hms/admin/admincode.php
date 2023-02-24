<?php
include("../include/header.php");
include("../include/connection.php");

if(isset($_POST['admin_delete'])){
      $admin_id=$_POST['admin_delete'];
      $query="DELETE FROM admin WHERE  id='$admin_id'";
      $query_run=mysqli_query($connect,$query);
      header('Location:admin.php');
}

if(isset($_POST['add_user'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query="INSERT into admin(username,password) VALUES('$username','$password')";
    $query_run=mysqli_query($connect,$query);
}
header('Location:admin.php');
?>