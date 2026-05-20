<?php

include '../config/database.php';
include '../security/auth.php';

requireAuth('superadmin');

$result = $conn->query("
    SELECT * FROM users
    WHERE role='admin'
");

?>

<!DOCTYPE html>
<html>
<head>

    <title>View Admins</title>

    <link rel="stylesheet"
          href="../assets/css/style.css">

</head>
<body>

<div class="sidebar">

    <?php include 'sidebar.php'; ?>

</div>

<div class="main">

    <h1 class="dashboard-title">
        Admin Accounts
    </h1>

    <table>
    <thead>
        <tr>
            <th>Fullname</th>
            <th>Username</th>
            <th>Status</th>
            <th style="text-align: right;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['fullname']); ?></td>
            <td><?php echo htmlspecialchars($row['username']); ?></td>
            <td>
                <span style="color: #34c759; font-size: 0.8rem; font-weight: 600;">
                    <?php echo htmlspecialchars($row['status']); ?>
                </span>
            </td>
            <td style="text-align: right;">
                <a href="archive_admin.php?id=<?php echo $row['id']; ?>" 
                   class="btn-archive" 
                   onclick="return confirm('Archive this admin account?')">
                   Archive
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

</div>

</body>
</html>