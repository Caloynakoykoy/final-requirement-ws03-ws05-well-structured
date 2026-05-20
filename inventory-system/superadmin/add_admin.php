<?php
include '../security/auth.php';
include '../security/csrf.php';

requireAuth('superadmin');
?>

<!DOCTYPE html>
<html>
<head>

    <title>Add Admin</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>

<div class="sidebar">

    <<<?php include 'sidebar.php'; ?>

</div>

<div class="main">

    <h1 class="dashboard-title">Add Admin Account</h1>

    <form method="POST" action="save_admin.php">

    <input type="hidden"
           name="csrf_token"
           value="<?php echo csrf_token(); ?>">

    <input name="fullname" placeholder="Fullname" Required>
    <br>
    <input name="username" placeholder="Username" Required>
    <br>
    <input name="password" type="password" placeholder="Password" Required>
    <br>
    <button type="submit" class="btn-save" style="
    width: 100%;
    padding: 18px;
    background: rgba(255, 255, 255, 0.1); 
    color: #ffffff; 
    border: none; 
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    cursor: pointer;
    transition: all 0.3s ease;
    border-radius: 8px; 
    margin-top: 20px;
">Save Admin</button>

</form>

</div>

</body>
</html>