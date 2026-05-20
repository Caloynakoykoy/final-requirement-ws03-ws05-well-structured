<?php
session_start();
include '../config/database.php';

// I-verify kung admin ang naka-login
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

// 1. Kunin ang ID at i-decode (dahil naka-base64 sa view_items.php)
$id_param = $_GET['id'] ?? null;
$id = $id_param ? base64_decode($id_param) : null;

// 2. Kung walang ID, balik sa listahan
if(!$id){
    header("Location: view_items.php");
    exit();
}

// 3. Kunin ang data ng item base sa ID
$stmt = $conn->prepare("SELECT * FROM items WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$item = $result->fetch_assoc();

// 4. Kung walang nahanap na item sa DB
if(!$item){
    header("Location: view_items.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item | Inventory System</title>
    <!-- Siguraduhin na tama ang path ng style.css mo -->
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
            <h1 class="dashboard-title">Edit Item</h1>
            <p>Update inventory details para sa: <strong><?= htmlspecialchars($item['item_name'] ?? 'Unknown Item') ?></strong></p>
        </header>

        <!-- FORM CONTAINER -->
        <div class="table-container" style="padding: 30px; max-width: 600px;">
            <form method="POST" action="update_item.php">
                
                <!-- Hidden ID para malaman ng update_item.php kung ano ang i-uupdate -->
                <input type="hidden" name="id" value="<?= $item['id'] ?>">

                <div class="input-group">
                    <label>Item Name</label>
                    <input type="text" name="item_name" value="<?= htmlspecialchars($item['item_name'] ?? '') ?>" required>
                </div>

                <div class="input-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" value="<?= htmlspecialchars($item['quantity'] ?? 0) ?>" required>
                </div>

                <div class="input-group">
                    <label>Price</label>
                    <!-- FIX: Nilagyan ng ?? 0 para kung sakaling empty ang price sa DB, hindi mag-e-error ang PHP -->
                    <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($item['price'] ?? 0) ?>" required>
                </div>

                <div class="button-container">
                    <button type="submit" class="btn btn-primary">
                        Update Item
                    </button>
                    <a href="view_items.php" class="btn btn-secondary" style="margin-top: 10px; display: block; text-decoration: none;">
                        Cancel / Back
                    </a>
                </div>
            </form>
        </div>
    </main>
</div>

</body>
</html>