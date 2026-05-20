<?php
session_start();
include '../config/database.php';

if($_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

// UPDATE PASSWORD
if(isset($_POST['reset'])){

    $user_id = $_POST['user_id'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET password=? WHERE id=? AND role='user' AND status='active'");
    $stmt->bind_param("si", $new_password, $user_id);

    if($stmt->execute()){
        header("Location: reset_password.php?success=1");
        exit();
    }
}

// GET ACTIVE USERS ONLY
$users = $conn->query("SELECT * FROM users WHERE role='user' AND status='active'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="app">

<!-- SIDEBAR -->
<div class="sidebar">

    <<?php include 'sidebar.php'; ?>
    
</div>

<!-- MAIN -->
<div class="main">

    <div class="header">
        <h1>Reset User Password</h1>
        <p>Update password for active users only</p>
    </div>

    <div class="container">

        <?php if(isset($_GET['success'])): ?>
            <p style="color:green;font-weight:bold;">
                Password successfully reset!
            </p>
        <?php endif; ?>

        <form method="POST">

            <label>Select User</label>
            <select name="user_id" required>
                <option value="">-- Select User --</option>

                <?php while($row = $users->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>">
                        <?= $row['fullname'] ?> (<?= $row['username'] ?>)
                    </option>
                <?php endwhile; ?>

            </select>

            <label>New Password</label>
            <input type="password" name="new_password" required>

            <button type="submit" name="reset" class="btn btn-primary">
                Reset Password
            </button>

        </form>

    </div>

</div>

</div>

</body>
</html>