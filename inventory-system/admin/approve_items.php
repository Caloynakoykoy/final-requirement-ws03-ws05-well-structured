<?php
include '../config/database.php';
include '../security/auth.php';
requireAuth('admin');

// Kunin lahat ng items na ang approval_status ay 'pending'
$result = $conn->query("SELECT * FROM items WHERE approval_status = 'pending'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Approve Items | IMS</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="sidebar">
        <?php include 'sidebar.php'; ?>
    </div>

    <div class="main">
        <h1 class="dashboard-title">Pending Item Approval</h1>

        <table>
            <thead>
                <tr>
                    <th>ITEM NAME</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php if($result && $result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td style="padding: 15px;"><?php echo htmlspecialchars($row['item_name']); ?></td>
                        <td style="padding: 15px;">
                            <a href="approve_action.php?id=<?php echo $row['id']; ?>" class="btn-system btn-primary-system" style="text-decoration: none; padding: 5px 15px;">
                                Approve
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2" style="text-align: center; padding: 40px; color: #717171;">
                            No pending item approvals found.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>