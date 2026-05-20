<?php
session_start();
include '../config/database.php';

if($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'superadmin'){
    header("Location: ../login.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // USER ONLY (fixed role)
    $role = 'user';

    $stmt = $conn->prepare("INSERT INTO users (fullname, username, password, role, status) VALUES (?,?,?,?, 'active')");
    $stmt->bind_param("ssss", $fullname, $username, $password, $role);

    if($stmt->execute()){
        header("Location: add_user.php?success=1");
        exit();
    } else {
        echo "Error adding user";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="app">

    <!-- SIDEBAR (DIRECT HTML SINCE WALA KANG sidebar.php) -->
    <div class="sidebar">

        <?php include 'sidebar.php'; ?>

    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <div class="header">
            <h1>Add User</h1>
            <p>Create new regular user account</p>
        </div>

        <div class="container">

            <?php if(isset($_GET['success'])): ?>
                <p style="color:green;font-weight:bold;">User added successfully!</p>
            <?php endif; ?>

            <form method="POST">

                <label>Full Name</label>
                <input type="text" name="fullname" required>

                <label>Username</label>
                <input type="text" name="username" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <button class="btn btn-primary">Create User</button>

            </form>

        </div>

    </div>

</div>

</body>
</html>