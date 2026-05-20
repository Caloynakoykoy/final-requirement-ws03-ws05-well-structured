<?php
include '../config/database.php';
include '../security/auth.php';
requireAuth('superadmin');

$result = $conn->query("SELECT id, username FROM users WHERE role='admin' AND status='active'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password | IMS</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="main">
        <h1 class="dashboard-title">Reset Admin Password</h1>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th style="text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td style="text-align: right;">
                        <a href="update_password.php?id=<?php echo $row['id']; ?>" class="btn-action">Reset Password</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>