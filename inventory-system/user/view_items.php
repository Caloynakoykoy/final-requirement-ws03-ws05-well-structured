<?php

include '../config/database.php';
include '../security/auth.php';

requireAuth('user');

$result = $conn->query("
    SELECT * FROM items
    WHERE approval_status='approved'
    AND status='active'
");

?>

<!DOCTYPE html>
<html>
<head>

    <title>View Items</title>

    <link rel="stylesheet"
          href="../assets/css/style.css">

</head>
<body>

<div class="sidebar">

    <?php include 'sidebar.php'; ?>

</div>

<div class="main">

    <h1 class="dashboard-title">
        Approved Inventory Items
    </h1>

    <table border="1" cellpadding="10">

        <tr>
            <th>Item Name</th>
            <th>Description</th>
            <th>Quantity</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>

        <tr>

            <td>
                <?php echo htmlspecialchars($row['item_name']); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row['description']); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row['quantity']); ?>
            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>