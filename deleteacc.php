<?php
    include_once 'conn.php';
    $sql = "DELETE FROM acc WHERE username='" . $_GET["username"] . "'";
    if (mysqli_query($conn, $sql)) {
        echo ("<script LANGUAGE='JavaScript'> window.alert('Account Deleted!'); window.location.href='home-admin.php';</script>");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>

