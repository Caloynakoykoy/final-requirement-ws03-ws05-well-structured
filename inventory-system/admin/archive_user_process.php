<?php
include '../config/database.php';
include '../security/auth.php';
requireAuth('admin');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("UPDATE users SET status='archived' WHERE id=? AND role='user'");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>alert('User moved to archives'); window.location.href='view_users.php';</script>";
    }
    $stmt->close();
}
exit();