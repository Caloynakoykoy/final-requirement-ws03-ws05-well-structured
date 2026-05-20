<?php
session_start();
include '../config/database.php';

// Mas maganda kung gagamitin mo ang requireAuth function mo, 
// pero heto ang logic base sa current code mo:
if($_SESSION['role'] != 'superadmin'){
    header("Location: ../login.php");
    exit();
}

// 1. Accurate counting para sa Admins (Active lamang)
$admin_res = $conn->query("SELECT COUNT(*) as total FROM users WHERE role='admin' AND status='active'");
$total_admins = $admin_res->fetch_assoc()['total'];

// 2. Accurate counting para sa System Users (Active lamang)
$user_res = $conn->query("SELECT COUNT(*) as total FROM users WHERE role='user' AND status='active'");
$total_users = $user_res->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Super Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        /* Dagdag na style para tumugma sa dark theme mo */
        body { background-color: #0a0a0a; color: white; font-family: 'Inter', sans-serif; }
        .cards { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-top: 30px; }
        .card { background: rgba(255,255,255,0.02); border: 1px solid #1a1a1a; padding: 25px; border-radius: 12px; }
        .card h3 { font-size: 0.7rem; color: #717171; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; }
        .card p { font-size: 2rem; font-weight: 700; margin: 0; color: white; }
    </style>
</head>

<body>

<div class="app" style="display: flex;">

<div class="sidebar" style="width: 250px;">
    <?php include 'sidebar.php'; ?>
</div>

<div class="main" style="flex: 1; padding: 40px;">

    <div class="header">
        <h1 style="font-size: 1.5rem; margin-bottom: 5px;">Super Admin Dashboard</h1>
        <p style="color: #717171; font-size: 0.9rem; margin-bottom: 30px;">System-level control panel</p>
    </div>

    <div class="cards">
        <div class="card">
            <h3>Total Admins</h3>
            <p><?php echo $total_admins; ?></p>
        </div>

        <div class="card">
            <h3>System Users</h3>
            <p><?php echo $total_users; ?></p>
        </div>
    </div>

</div>

</div>

</body>
</html>