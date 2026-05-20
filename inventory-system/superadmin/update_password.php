<?php
include '../config/database.php';
include '../security/auth.php';

requireAuth('superadmin');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id']; 

    // 1. I-hash ang bagong default password
    // Kahit makita ito ng hacker sa DB, hindi nila mababasa dahil Hashed ito.
    $newPassword = password_hash("admin123", PASSWORD_DEFAULT);

    // 2. SQL Update
    $stmt = $conn->prepare("UPDATE users SET password=? WHERE id=? AND role='admin'");
    $stmt->bind_param("si", $newPassword, $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Password reset successful! New password: admin123');
                window.location.href='reset_password.php';
              </script>";
    } else {
        echo "Error updating password: " . $conn->error;
    }
    $stmt->close();
} else {
    header("Location: reset_password.php");
}
exit();
?>