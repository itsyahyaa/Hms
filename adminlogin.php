<?php
include ('include/header.php');
include ('include/connection.php');

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    
    // $error = array();
  

    if(empty($username) || empty($password)){
        // $error['admin'] = "Enter Username";
        header("Location:index.php?error=emptyfield&username".$username."&password".$password);
        exit();
    }  
    // else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
    //         // $error['admin'] = "Enter Password";
    //         header("Location:index.php?error=invalidusernamemail&username".$username);
    //         exit();
        
    // }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    //     // $error['admin'] = "Enter Password";
    //     header("Location:index.php?error=invalidmail&username".$username);
    //     exit();
    // }
    // else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
    //     // $error['admin'] = "Enter Password";
    //     header("Location:index.php?error=invalidusename&username".$username);
    //     exit();
    // }
    // else if($password !== $passwordrepeat){
    //     // $error['admin'] = "Enter Password";
    //     header("Location:index.php?error=passwordCheck&mail".$email);
    //     exit();
    // }
    // // if (count($error)==0){
    else {
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

        $result = mysqli_query($conn,$query); 
    
        if(mysqli_num_rows($result) == 1){
            echo "<script>alert('Successfully login as Admin')</script>";
            $_SESSION['admin'] = $username;
            header("Location:index.php?error=Success");
        }else{
            header("Location:index.php?error=InvalidPassword&mail".$email);
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