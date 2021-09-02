<?php
session_start();
include ('connection.php');

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    
    // $error = array();
  

    if(empty($username)){
        // $error['admin'] = "Enter Username";
        header("Location:../adminlogin.php?error=Username is Required");
        exit();
    }  
    else if(empty($password)){
        // $error['admin'] = "Enter Username";
        header("Location:../adminlogin.php?error=Password is Required");
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
        $query = "SELECT * FROM admin WHERE username='$username' AND passward='$password'";

        $result = mysqli_query($conn,$query); 
    
        if(mysqli_num_rows($result) == 1){
            // echo "<script>alert('Successfully login as Admin')</script>";
            $_SESSION['admin'] = $username;
            // header("Location:../admin/index.php?error=Success");
            header("Location:../admin/index.php");
        }else{
            header("Location:../adminlogin.php?error=Invalid Username or Password");
        }
     }
}



