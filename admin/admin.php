<?php
session_start();
 include('../include/connection.php');
 include('../include/header.php'); 

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                                <h5 class="text-center">All Admin</h5>
                                <?php
                                    $ad = $_SESSION['admin'];
                                    $query = "SELECT * FROM admin WHERE username !='$ad'";
                                    $res = mysqli_query($conn,$query);

                                    $output = "
                                    <table class='table table-bordered'>
                                    <th style='width:10%;'>ID</th>
                                    <th>Username</th>
                                    <th style='width:10%;'>Action</th>

                                   
                                    ";

                                    if(mysqli_num_rows($res) < 1){
                                         $output .="<h5 class='text-center'>No New Admin</h5>";
                                    }
                                    while($row=mysqli_fetch_array($res)){
                                        $id = $row['id'];
                                        $username=$row['username'];

                                        $output .="
                                        <tr>
                                            <td>$id</td>
                                            <td>$username</td>
                                            <td><a href='../include/adminlogin.php?id=$id' id='$id' class='btn btn-danger' >Remove</a></td>
                                        ";
                                    }
                                    $output .="
                                    </tr>
                                </table>
                                    ";
                                    echo $output;
                                ?>
                                
                                        
                                    
                            </div>
                            <div class="col-md-6">
                            <h5 class="text-center">Add Admin</h5>
                            <form action="../include/adminlogin.php" method="post" enctype="multipart/form-data">
                            <?php if(isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?=$_GET['error']?>
                        </div>
                        <?php } ?>
                                <div class="mb-3">
                                    <label  class="form-label">Username</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="username">
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Password</label>
                                    <input type="text" class="form-control"  name="password">
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Upload</label>
                                    <input type="file" class="form-control"  name="img">
                                </div>
                                <button type="submit" class="btn btn-primary" name="add" value="Add">Submit</button>
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