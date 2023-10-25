<?php
include_once 'conn.php';
if(isset($_POST['submit']))
{
    $departure=$_POST['departure'];
    $destination=$_POST['destination'];
    $price=$_POST['price'];
    $username=$_POST['username'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $message=$_POST['message'];

    $query="INSERT into booking (departure,destination,price,username,gender,phone,message) values('$departure','$destination','$price','$username','$gender','$phone','$message')";
    
    $result=mysqli_query($conn,$query);
    if($result)
    {
        echo "<script>alert('Sucessfully Booked a Ride!')</script>";
        echo "<script>window.location.href='home-customer.php'</script>";
    }
    else
    {
        echo "<script>alert('Unsucessfull!')</script>";
    }
}
?>