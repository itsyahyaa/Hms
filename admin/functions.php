<?php
session_start();
include ('../include/connection.php');

if(isset($_POST['add'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $image = $_FILES['img']['name'];

    
    // $error = array();
  

    if(empty($username)){
        // $error['admin'] = "Enter Username";
        header("Location:../admin/admin.php?error=Username is Required");
        exit();
    }  
    else if(empty($password)){
        // $error['admin'] = "Enter Username";
        header("Location:../admin/admin.php?error=Password is Required");
        exit();
    }  
    else if(empty($image)){
        // $error['admin'] = "Enter Username";
        header("Location:../admin/admin.php?error=Admin image is Required");
        exit();
    } 
    else{
        $q = "INSERT INTO admin(username,passward,images)VALUES('$username','$password','$image')";
        $res = mysqli_query($conn,$q);
        if($res){
            move_uploaded_file($_FILES['img']['tmp_name'],"../admin/img/$image");
            header("Location:../admin/admin.php");
        }
        else{

        }
    } 
}

if(isset($_GET['id'])){
$id = $_GET['id'];
$query = "DELETE FROM admin WHERE id='$id'";
mysqli_query($conn,$query);
header("Location:../admin/admin.php");
}


if(isset($_POST['update'])){
    $ad = $_SESSION['admin'];
    $image = $_FILES['img']['name'];
    if(empty($image)){
        header("Location:../admin/profile.php?error=Profile is Required");
        exit();
    }else{
        $q = "UPDATE admin SET images='$image' WHERE username='$ad'";
        $res = mysqli_query($conn,$q);

        if($res){
            move_uploaded_file($_FILES['img']['tmp_name'],"../admin/img/$image");
            header("Location:../admin/profile.php");
        }
    }
}

if(isset($_POST['update_username'])){
    $ad = $_SESSION['admin'];
    $username = $_POST['username'];
    if(empty($username)){
        header("Location:../admin/profile.php?error=Username is Required");
        exit();
    }else{
        $q = "UPDATE admin SET username='$username' WHERE username='$ad'";
        $res = mysqli_query($conn,$q);
        if($res){
            $_SESSION['admin'] = $username;
            header("Location:../admin/profile.php");
        }
    }
}

if(isset($_POST['update_password'])){
    $ad = $_SESSION['admin'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $con_pass = $_POST['con_pass'];

    $y = "SELECT * FROM admin WHERE username = '$ad'";
    $old = mysqli_query($conn,$y);
    $row = mysqli_fetch_array($old);
    $pass = $row['passward'];

    if(empty($old_pass)){
        header("Location:../admin/profile.php?error=Old Password is Required");
        exit();
    }else if(empty($new_pass)){
        header("Location:../admin/profile.php?error=New Password is Required");
        exit();
    }
    else if(empty($con_pass)){
        header("Location:../admin/profile.php?error=Confirm Password is Required");
        exit();
    }
    else if($old_pass != $pass){
        header("Location:../admin/profile.php?error=Old Password  is Incorrect");
        exit();
    }
    else if($new_pass != $con_pass){
        header("Location:../admin/profile.php?error=New Password doesnot Match");
        exit();
    }else{
        $q = "UPDATE admin SET passward='$new_pass' WHERE username='$ad'";
        $res = mysqli_query($conn,$q);
        if($res){
            header("Location:../admin/profile.php");
        }
    }
    }
