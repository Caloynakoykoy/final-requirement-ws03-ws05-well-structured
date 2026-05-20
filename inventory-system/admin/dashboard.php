<?php
include '../config/database.php';
include '../security/auth.php';
requireAuth('admin');

// 1. Accurate Total Items: Bilangin lahat ng entry sa items table
$item_res = $conn->query("SELECT COUNT(*) as total FROM items");
$total_items = $item_res->fetch_assoc()['total'];

// 2. Accurate Pending Approvals: Dapat 'approval_status' ang gamitin para mag-match sa approve_items.php
$pending_res = $conn->query("SELECT COUNT(*) as total FROM items WHERE approval_status = 'pending'");
$pending_items = $pending_res->fetch_assoc()['total'];

// 3. Accurate Active Users: Bilangin ang mga 'user' role na 'active' ang status
$user_res = $conn->query("SELECT COUNT(*) as total FROM users WHERE role = 'user' AND status = 'active'");
$total_users = $user_res->fetch_assoc()['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | IMS</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="sidebar">
        <?php include 'sidebar.php'; ?>
    </div>

    <div class="main">
        <div class="header">
            <h1>Admin Dashboard</h1>
            <p style="color: #717171;">Manage items and users</p>
        </div>
        
        <div class="cards" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 30px;">
            <div class="card">
                <small style="color: #717171; text-transform: uppercase; font-size: 0.7rem; letter-spacing: 1px;">Total Items</small>
                <h2 style="font-size: 2.5rem; margin: 10px 0;"><?php echo $total_items; ?></h2>
            </div>
            
            <div class="card">
                <small style="color: #717171; text-transform: uppercase; font-size: 0.7rem; letter-spacing: 1px;">Pending Approval</small>
                <h2 style="font-size: 2.5rem; margin: 10px 0; color: <?php echo ($pending_items > 0) ? '#fcf8f8' : '#ffffff'; ?>;">
                    <?php echo $pending_items; ?>
                </h2>
            </div>

            <div class="card">
                <small style="color: #717171; text-transform: uppercase; font-size: 0.7rem; letter-spacing: 1px;">Active Users</small>
                <h2 style="font-size: 2.5rem; margin: 10px 0;"><?php echo $total_users; ?></h2>
            </div>
        </div>
    </div>
</body>
</html>