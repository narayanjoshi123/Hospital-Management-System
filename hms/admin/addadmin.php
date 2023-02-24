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
                   <div class="row mt-4">
                       <div class="col-md-12">
                           <div class="card">
                               <div class="card-header">
                                   <h4 class="text-center">Admin panel</h4>
                                   <div class="card-header">
                                       <h5>Add Admin</h5>
                                       <a href="admin.php" class="btn btn-danger float-end">BACK</a>   
                                   </div>
                                   <div class="card-body">
                                       <form action="admincode.php" method="POST">
                                           <div class="row">
                                               <div class="col-md-6 mb-3">
                                                   <label>Username</label>
                                                   <input type="text" name="username"  class="form-control">
                                               </div>
                                               <div class="col-md-6 mb-3">
                                                   <label>password</label>
                                                   <input type="password" name="password"  class="form-control">
                                               </div>
                                               <div class="col-md-12 mb-3">
                                                   
                                                   <button type="submit" name="add_user" class="btn btn-primary">Add admin</button>
                                               </div>
                                           </div>
                                        
                                       </form>
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