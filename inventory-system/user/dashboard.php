<?php
/**
 * DAHIL MAY session_start() NA SA auth.php,
 * HINDI NA NATIN ITO KAILANGAN DITO. 
 * Pagka-include ng auth.php, automatic na magiging active ang session.
 */

include '../config/database.php';
include '../security/auth.php'; // Dito na manggagaling ang session_start() mo.

// Gagamitin ang function mula sa iyong auth.php
requireAuth('user');

/** * DATABASE COUNTING
 * Binibilang ang mga items na Approved at Active para lumitaw ang "2"
 */
$count_res = $conn->query("SELECT COUNT(*) as total FROM items WHERE approval_status='approved' AND status='active'");
$row = $count_res->fetch_assoc();
$available_items = $row['total'] ?? 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard | IMS</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="sidebar">
        <?php include 'sidebar.php'; ?>
    </div>

    <div class="main">
        <div class="header">
            <h1>User Dashboard</h1>
            <p style="color: #717171;">View and request items</p>
        </div>

        <div class="cards" style="margin-top: 30px;">
            <div class="card">
                <small style="color: #717171; text-transform: uppercase; font-size: 0.7rem; letter-spacing: 1px;">Available Items</small>
                <h2 style="font-size: 2.5rem; margin: 10px 0; color: #ffffff;"><?php echo $available_items; ?></h2>
            </div>
        </div>
    </div>
</body>
</html>