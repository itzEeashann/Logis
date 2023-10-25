<?php
	include('conn.php'); 
	if (isset($_POST['submit'])){
		$username = $_POST['username'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $password = $_POST['password'];

		$sql = "UPDATE acc SET username='$_POST[username]', gender='$_POST[gender]', email='$_POST[email]', role='$_POST[role]', password='$_POST[password]' WHERE username='$_POST[username]'";
        if (mysqli_query($conn,$sql)) {
            echo ("<script LANGUAGE='JavaScript'> window.alert('Account Updated'); window.location.href='home-admin.php';</script>");
        } else {
            echo "Error: " . $sql . "
    " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>