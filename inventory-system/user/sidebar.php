<?php
$current = basename($_SERVER['PHP_SELF']);
?>
<h2>REGULAR USER PANEL</h2>

<div class="section-title">MAIN</div>
<a href="dashboard.php" class="<?= $current == 'dashboard.php' ? 'active' : '' ?>">Dashboard</a>

<div class="section-title">USER CONTROL</div>
<a href="view_items.php" class="<?= $current == 'view_items.php' ? 'active' : '' ?>">View Items</a>
<a href="search_item.php" class="<?= $current == 'search_item.php' ? 'active' : '' ?>">Search Items</a>
<a href="add_item.php" class="<?= $current == 'add_item.php' ? 'active' : '' ?>">Add Item</a>

<div class="section-title">SYSTEM</div>
<a href="../logout.php">Logout</a>