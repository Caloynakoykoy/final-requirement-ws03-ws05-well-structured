<?php
include '../config/database.php';
include '../security/auth.php';
requireAuth('admin');

$result = $conn->query("SELECT id, fullname, username FROM users WHERE role = 'user' AND status = 'archived'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Archived Users | IMS</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="main">
        <h1 class="dashboard-title">Archived Users</h1>
        <p style="color: #717171; margin-top: -20px; margin-bottom: 30px;">Inactive regular user accounts only.</p>

        <table>
            <thead>
                <tr>
                    <th>FULL NAME</th>
                    <th>USERNAME</th>
                    <th style="text-align: right;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php if($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td style="padding: 15px; color: #efefef;"><?php echo htmlspecialchars($row['fullname']); ?></td>
                        <td style="padding: 15px; color: #717171;"><?php echo htmlspecialchars($row['username']); ?></td>
                        <td style="padding: 15px; text-align: right;">
                            <a href="restore_user_process.php?id=<?php echo $row['id']; ?>" class="btn-restore" onclick="return confirm('Restore this user account?')">Restore</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="3" style="text-align:center; padding: 40px; color: #717171;">No archived users found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>