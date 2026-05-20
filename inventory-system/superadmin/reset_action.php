<?php
include '../db_connection.php'; // Siguraduhing tama ang path sa db connection mo
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $new_password = password_hash("123456", PASSWORD_DEFAULT); // Default password after reset

    $sql = "UPDATE admins SET password = '$new_password' WHERE id = '$id'";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Password reset to 123456 successfully!'); window.location.href='reset_password.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    header("Location: reset_password.php");
}
?>