<?php

include '../config/database.php';
include '../security/auth.php';

requireAuth('admin');

$id = base64_decode($_GET['id']);

$stmt = $conn->prepare("
    UPDATE items
    SET approval_status='approved'
    WHERE id=?
");

$stmt->bind_param("i", $id);

$stmt->execute();

header("Location: approve_items.php");

exit();

?>