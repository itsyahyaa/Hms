<?php
include ('include/header.php');
include ('include/connection.php');

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $error = array();
  

    if(empty($username)){
        $error['admin'] = "Enter Username";
        
    }else if(empty($password)){
        $error['admin'] = "Enter Password";
    }
    if (count($error)==0){
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

        $result = mysqli_query($conn,$query); 
    
        if(mysqli_num_rows($result) == 1){
            echo "<script>alert('Successfully login as Admin')</script>";
            $_SESSION['admin'] = $username;
            //header("Location:");
        }else{
            echo "<script>alert('Invalid Username Or Password')</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>HMS Home Page</title>
    </head>
<body>
    <div style="margin-top:100px"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron">
                    <form action="" method="POST" class="my-2">
                        <div class="alert alert-danger">
                            <?php 
                            if(isset($error['admin'])){
                                $show = $error['admin'];
                                
                            }else{
                                $show = "";
                                
                            }
                            echo $show;
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-success" value="login">
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>