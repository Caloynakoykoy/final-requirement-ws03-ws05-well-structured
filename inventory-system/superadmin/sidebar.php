<?php
$current = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar">

    <h2>SUPER ADMIN PANEL</h2>

    <div class="section-title">MAIN</div>
    <a href="dashboard.php" class="<?= $current == 'dashboard.php' ? 'active' : '' ?>">Dashboard</a>

    <div class="section-title">ADMIN CONTROL</div>
    <a href="add_admin.php" class="<?= $current == 'add_admin.php' ? 'active' : '' ?>">Add Admin</a>
    <a href="archive_admin.php" class="<?= $current == 'archive_admin.php' ? 'active' : '' ?>">Archived Admin</a>
    <a href="reset_password.php" class="<?= $current == 'reset_password.php' ? 'active' : '' ?>">Reset Admin Password</a>

    <div class="section-title">SYSTEM</div>
    <a href="../logout.php">Logout</a>

</div>