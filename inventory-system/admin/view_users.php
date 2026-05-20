<?php
include '../config/database.php';
include '../security/auth.php';
requireAuth('admin');

$result = $conn->query("SELECT id, fullname, username FROM users WHERE role='user' AND status='active'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Users | IMS</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="main">
        <h1 class="dashboard-title">System Users</h1>
        <table>
            <thead>
                <tr>
                    <th>FULL NAME</th>
                    <th>USERNAME</th>
                    <th style="text-align: right;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td style="text-align: right;">
                        <a href="archive_user_process.php?id=<?php echo $row['id']; ?>" class="btn-archive" onclick="return confirm('Archive user?')">Archive</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>