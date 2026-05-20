<?php

include '../config/database.php';
include '../security/csrf.php';

session_start();

// ONLY CHECK IF EXISTS
if (!isset($_POST['csrf_token'])) {
    die("CSRF token missing");
}

verify_csrf_token($_POST['csrf_token']);

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("
    INSERT INTO users(fullname, username, password, role, status)
    VALUES (?, ?, ?, 'admin', 'active')
");

$stmt->bind_param("sss", $fullname, $username, $password);
$stmt->execute();

header("Location: add_admin.php");
exit();

?>