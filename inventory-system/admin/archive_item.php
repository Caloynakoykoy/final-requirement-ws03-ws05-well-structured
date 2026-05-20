<?php

include '../config/database.php';
include '../security/auth.php';

requireAuth('admin');

$id = base64_decode($_GET['id']);

$stmt = $conn->prepare("
    UPDATE items
    SET status='archived'
    WHERE id=?
");

$stmt->bind_param("i", $id);

$stmt->execute();

header("Location: view_items.php");

exit();

?>