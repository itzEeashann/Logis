<?php 
session_start();
 
$testconfig = mysqli_connect('localhost', 'root', '', 'legends');
 
$username = $_POST['username'];
$password = $_POST['password'];
 
 
$login = mysqli_query($testconfig,"SELECT * FROM acc WHERE username='$username' AND password='$password'");
$checkk = mysqli_num_rows($login);

if ($checkk > 0) {
    $data = mysqli_fetch_assoc($login);
 
    if ($data['role'] == "rider") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "rider";
        
        if ($data['gender'] == "male") {
            header("location: home-rider-male.php"); // Redirect to a page for male riders
        } elseif ($data['gender'] == "female") {
            header("location: home-rider-female.php"); // Redirect to a page for female riders
        } else {
            header("location: home-rider-generic.php"); // Redirect to a generic page if gender is neither male nor female
        }
    } elseif ($data['role'] == "customer") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "customer";
        header("location: home-customer.php");
    } elseif ($data['role'] == "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "admin";
        header("location: home-admin.php");
    } else {
        echo ("<script LANGUAGE='JavaScript'> window.alert('Wrong Credential'); window.location.href='login.php';</script>");
    }
} else {
    echo ("<script LANGUAGE='JavaScript'> window.alert('Wrong Credential'); window.location.href='login.php';</script>");
}
?>
