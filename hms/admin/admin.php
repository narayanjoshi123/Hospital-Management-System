<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
    </head>
    <body>
    <?php
        include("../include/header.php");
       
        ?>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                        <?php
                         include("../admin/sidenav.php");
                         include("../include/connection.php");
                         
                        ?>
                    </div>
                   <div class="col-md-10">
                       <div class="col-md-12">
                           <div class="row">
                               <div class="col-md-6">
                                   <h4 class="text-center">Admin panel</h4>
                                   <div class="card-header">
                                       <h4>Registered users</h4>
                                       <a href="addadmin.php" class="btn btn-primary float-end">Add admin</a>
                                   </div>
                                   <div class="card-body">
                                       <table class="table table-bordered">
                                           <thead>
                                               <tr>
                                                   <th>ID</th>
                                                   <th>Username</th>
                                                   <th>Password</th>
                                                   
                                                   <th>Delete</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                               <?php
                                               $query="SELECT * from admin";
                                               $query_run=mysqli_query($connect,$query);

                                               if(mysqli_num_rows($query_run) > 0){
                                                 foreach($query_run as $row){
                                                     ?>
                                                     <tr>
                                                   <td><?= $row['id']; ?></td>
                                                   <td><?= $row['username']; ?></td>
                                                   <td><?= $row['password']; ?></td>                                           
                                                   <td>
                                                       <form action="admincode.php" method="POST">
                                                       <button type="submit" name="admin_delete" value="<?= $row['id']; ?>" class="btn btn-success">Delete</button>
                                                       </form>
                                                    </td>
                                               </tr>

                                                     <?php
                                                 }
                                               }else{
                                                   ?>
                                                   <tr>
                                                       <td colspan="4">No record found</td>
                                                   </tr>
                                                   <?php
                                               }
                                               ?>
                                               
                                           </tbody>
                                       </table>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
            </div>
        </div>
            </div>
        </div>
    </body>
</html>