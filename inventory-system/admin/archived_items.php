<?php
include '../config/database.php';
include '../security/auth.php';
requireAuth('admin');

// Accurate Query: Archived items lang ang kukunin
$result = $conn->query("SELECT id, item_name FROM items WHERE status = 'archived'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Archived Items | IMS</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="main">
        <h1 class="dashboard-title">Archived Items</h1>
        <p style="color: #717171; margin-top: -20px; margin-bottom: 30px;">List of deactivated inventory items.</p>
        
        <table>
            <thead>
                <tr>
                    <th>ITEM NAME</th>
                    <th style="text-align: right;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php if($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td style="padding: 15px; color: #efefef;"><?php echo htmlspecialchars($row['item_name']); ?></td>
                        <td style="padding: 15px; text-align: right;">
                            <a href="restore_item.php?id=<?php echo $row['id']; ?>" class="btn-restore" onclick="return confirm('Restore this item to inventory?')">Restore</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="2" style="text-align:center; padding: 40px; color: #717171;">No archived items found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>