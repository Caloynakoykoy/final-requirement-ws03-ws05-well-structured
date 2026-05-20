<?php
include '../config/database.php';
include '../security/auth.php';

// Siguraduhin na Superadmin lang ang pwedeng mag-archive
requireAuth('superadmin');

// 1. Kunin ang ID mula sa URL (Plain ID, inalis na ang base64_decode)
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id']; 

    // 2. I-prepare ang SQL para sa "Soft Delete" o pag-archive
    $stmt = $conn->prepare("UPDATE users SET status='archived' WHERE id=? AND role='admin'");
    $stmt->bind_param("i", $id);

    // 3. I-execute at i-check kung pumasok talaga sa DB
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            // SUCCESS: Talagang may nabago sa database
            echo "<script>
                    alert('Admin successfully moved to archives.');
                    window.location.href='view_admins.php';
                  </script>";
        } else {
            // FAIL: Walang nahanap na record o archived na dati
            echo "<script>
                    alert('Error: Admin not found or already archived.');
                    window.location.href='view_admins.php';
                  </script>";
        }
    } else {
        echo "Database Error: " . $conn->error;
    }
    $stmt->close();
} else {
    header("Location: view_admins.php");
}
exit();
?>