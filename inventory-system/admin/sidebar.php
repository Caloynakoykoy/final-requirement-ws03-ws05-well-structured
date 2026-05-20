<?php $current = basename($_SERVER['PHP_SELF']); ?>
<div class="sidebar">
    <h2>ADMIN PANEL</h2>
    <div class="section-title">MAIN</div>
    <a href="dashboard.php" class="<?= $current == 'dashboard.php' ? 'active' : '' ?>">Dashboard</a>

    <div class="section-title">ITEMS</div>
    <a href="add_item.php" class="<?= $current == 'add_item.php' ? 'active' : '' ?>">Add Item</a>
    <a href="view_items.php" class="<?= $current == 'view_items.php' ? 'active' : '' ?>">View Items</a>
    <a href="archived_items.php" class="<?= $current == 'archived_items.php' ? 'active' : '' ?>">Archived Items</a>
    <a href="approve_items.php" class="<?= $current == 'approve_items.php' ? 'active' : '' ?>">Approve Items</a>

    <div class="section-title">USERS</div>
    <a href="add_user.php" class="<?= $current == 'add_user.php' ? 'active' : '' ?>">Add User</a>
    <a href="view_users.php" class="<?= $current == 'view_users.php' ? 'active' : '' ?>">View Users</a>
    <a href="archived_users.php" class="<?= $current == 'archived_users.php' ? 'active' : '' ?>">Archived Users</a>
    <a href="reset_password.php" class="<?= $current == 'reset_password.php' ? 'active' : '' ?>">Reset Password</a>

    <div class="section-title">SYSTEM</div>
    <a href="../logout.php">Logout</a>
</div>