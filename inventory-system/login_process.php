<?php
session_start();
include 'config/database.php';

// Siguraduhin na may data na pinadala mula sa form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 1. Hanapin ang user sa database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND status='active'");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // 2. I-verify ang password
    if ($user && password_verify($password, $user['password'])) {
        
        // Security: Iwas sa Session Fixation
        session_regenerate_id(true);
        
        // I-set ang session variables
        $_SESSION['role'] = $user['role'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // --- REMEMBER ME LOGIC ---
        if (isset($_POST['remember_me'])) {
            // I-save ang username sa cookie sa loob ng 30 araw (86400 seconds * 30)
            setcookie("remember_username", $username, time() + (86400 * 30), "/");
        } else {
            // Kung hindi naka-check, burahin ang cookie kung nage-exist ito
            if (isset($_COOKIE["remember_username"])) {
                setcookie("remember_username", "", time() - 3600, "/");
            }
        }
        // -------------------------

        // 3. Redirect base sa role
        if ($user['role'] == 'superadmin') {
            header("Location: superadmin/dashboard.php");
        } elseif ($user['role'] == 'admin') {
            header("Location: admin/dashboard.php");
        } else {
            header("Location: user/dashboard.php");
        }
        exit();

    } else {
        // Mali ang login details
        header("Location: login.php?error=invalid");
        exit();
    }
} else {
    // Pag-access sa file nang hindi nag-submit ng form
    header("Location: login.php");
    exit();
}
?>