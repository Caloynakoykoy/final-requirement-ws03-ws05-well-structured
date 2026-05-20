<?php
include '../config/database.php';
include '../security/auth.php';
requireAuth('admin');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // Accurate Update: Set status back to 'active'
    $stmt = $conn->prepare("UPDATE items SET status = 'active' WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Item successfully restored!'); window.location.href='view_items.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
} else {
    header("Location: archived_items.php");
}
exit();
?>