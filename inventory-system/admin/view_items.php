<?php
include '../config/database.php';
include '../security/auth.php';

requireAuth('admin');

// Idinagdag natin ang 'price' sa SELECT query (o * para sa lahat ng columns)
$result = $conn->query("
    SELECT * FROM items 
    WHERE status='active'
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Items | Inventory System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="app">
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <?php include 'sidebar.php'; ?>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">
        <header class="header">
            <h1 class="dashboard-title">Inventory Items</h1>
            <p>Manage and monitor your active stock list.</p>
        </header>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th> <!-- BAGONG COLUMN HEADER -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($row['item_name']); ?></strong></td>
                            <td class="text-muted"><?php echo htmlspecialchars($row['description']); ?></td>
                            <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                            <!-- BAGONG COLUMN DATA: Nilagyan ng format na may peso sign at 2 decimal places -->
                            <td>₱<?php echo number_format($row['price'], 2); ?></td> 
                            <td>
                                <div class="action-container">
                                    <a href="edit_item.php?id=<?php echo base64_encode($row['id']); ?>" 
                                       class="btn btn-sm btn-edit">
                                        Edit
                                    </a>
                                    <a href="archive_item.php?id=<?php echo base64_encode($row['id']); ?>" 
                                       class="btn btn-sm btn-archive"
                                       onclick="return confirm('Are you sure you want to archive this item?')">
                                        Archive
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <!-- In-adjust ang colspan sa 5 dahil nagdagdag tayo ng column -->
                            <td colspan="5" style="text-align: center; padding: 40px;">No items found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

</body>
</html>