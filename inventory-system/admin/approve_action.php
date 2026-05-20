<?php
include '../config/database.php';
include '../security/auth.php';
requireAuth('admin');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // I-update ang approval_status at gawing active ang item status
    $stmt = $conn->prepare("UPDATE items SET approval_status = 'approved', status = 'active' WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // I-redirect pabalik sa listahan pagkatapos ma-approve
        header("Location: approve_items.php?msg=approved");
        exit();
    } else {
        die("Error updating record: " . $conn->error);
    }
} else {
    header("Location: approve_items.php");
    exit();
}
?>