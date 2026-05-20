<?php
include '../config/database.php';
include '../security/auth.php';
requireAuth('admin');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Accurate Update: Balik sa 'active'
    $stmt = $conn->prepare("UPDATE users SET status='active' WHERE id=? AND role='user'");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('User restored successfully!'); window.location.href='view_users.php';</script>";
    }
    $stmt->close();
}
exit();