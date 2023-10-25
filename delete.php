<?php
    include_once 'conn.php';
    $sql = "DELETE FROM booking WHERE id='" . $_GET["id"] . "'";
    if (mysqli_query($conn, $sql)) {
        echo ("<script LANGUAGE='JavaScript'> window.alert('Ride Info Deleted!'); window.location.href='home-rider-male.php';</script>");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>

