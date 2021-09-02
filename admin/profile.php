<?php
    session_start();
    include('../include/header.php');
    include('../include/connection.php');
    $ad = $_SESSION['admin'];
    $query = "SELECT * FROM admin WHERE username = '$ad'";
    $res = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($res)){
        $username = $row['username'];
        $profile = $row['images'];
    }

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -47px;" 
                    >
                <?php 
                    include("sidebar.php");
                ?> 
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php echo $username ?> Profile</h4>
                                <form action="functions.php" method="post" enctype="multipart/form-data">
                                <?php
                                echo "<img src='img/$profile' class='col-md-12' style='height:250px;'>"
                                ?>
                                <br><br>
                                    <?php if(isset($_GET['error'])) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?=$_GET['error']?>
                                    </div>
                                    <?php } ?>
                                <div class="form-group">
                                    <label for="">Update Profile</label>
                                    <input type="file" class="form-control"  name="img">
                                </div>
                                
                                <input type="submit" name="update" value="Update" class=" btn btn-primary">
                            
                            </form>
                            </div>
                            <div class="col-md-6">
                            <h4>Change Username</h4>
                                <form action="functions.php" method="post" enctype="multipart/form-data">
                                <?php if(isset($_GET['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?=$_GET['error']?>
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label for="">Update Username</label>
                                    <input type="text" class="form-control"  name="username">
                                </div>
                                
                                <input type="submit" name="update_username" value="Update" class=" btn btn-success">
                            
                            </form>
                            <br>
                            <h4>Change Username</h4>
                                <form action="functions.php" method="post" enctype="multipart/form-data">
                                <?php if(isset($_GET['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?=$_GET['error']?>
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label for="">Old Password</label>
                                    <input type="password" class="form-control"  name="old_pass">
                                </div>
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="password" class="form-control"  name="new_pass">
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" class="form-control"  name="con_pass">
                                </div>
                                
                                <input type="submit" name="update_password" value="Update" class=" btn btn-info">
                            
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