<?php
session_start();
include("../include/header.php");
include("../include/connection.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-2" style="margin-left: -47px;">
                    <?php 
                    include("sidebar.php");
                    ?> 
            </div>
            <div class="col-md-10 mx-3">
                <h4 class="my-3">Admin Dashboard</h4>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 bg-success mx-2 my-2" style="height: 160px;"> 
                            <div class="col-md-12 my-1">
                                <div class="row">
                                    <div class="col-md-6">

                                    <?php 
                                        $query = "SELECT * FROM admin";
                                        $ad  = mysqli_query($conn,$query);
                                        $num = mysqli_num_rows($ad);
                                    ?>
                                        <h5 class="my-3  text-white" style="font-size:30px;"><?php echo $num;?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Admin</h5>
                                    </div>
                                    <div class="com-md-6">
                                        <a href="#"><i class="fas fa-users-cog fa-3x my-5" style="color:white;"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 bg-info mx-2 my-2" style="height: 160px;"> 
                        <div class="col-md-12 my-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="my-3 text-white" style="font-size:30px">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Doctor</h5>
                                    </div>
                                    <div class="com-md-6">
                                        <a href="#"><i class="fas fa-user-md fa-3x my-5" style="color:white;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-warning mx-2 my-2" style="height: 160px;"> 
                        <div class="col-md-12 my-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="my-3 text-white" style="font-size:30px">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Patient</h5>
                                    </div>
                                    <div class="com-md-6">
                                        <a href="#"><i class="fas fa-procedures fa-3x my-5" style="color:white;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-danger mx-2 my-2" style="height: 160px;"> 
                        <div class="col-md-12 my-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="my-3 text-white" style="font-size:30px">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Report</h5>
                                    </div>
                                    <div class="com-md-6">
                                        <a href="#"><i class="fas fa-flag fa-3x my-5" style="color:white;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-info mx-2 my-2" style="height: 160px;"> 
                        <div class="col-md-12 my-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="my-3 text-white" style="font-size:30px">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Job Request</h5>
                                    </div>
                                    <div class="com-md-6">
                                        <a href="#"><i class="fas fa-book-open fa-3x my-5" style="color:white;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-success mx-2 my-2" style="height: 160px;"> 
                        <div class="col-md-12 my-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="my-3 text-white" style="font-size:30px">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Income</h5>
                                    </div>
                                    <div class="com-md-6">
                                        <a href="#"><i class="fas fa-money-check-alt fa-3x my-5" style="color:white;"></i></a>
                                    </div>
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