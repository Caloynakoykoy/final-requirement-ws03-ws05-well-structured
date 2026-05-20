<?php
session_start();
include '../config/database.php';

// I-verify kung admin ang naka-login
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id = $_POST['id'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Siguraduhin na ang column name sa table mo ay 'price'
    // Kung ang error ay "Unknown column 'price'", palitan ang 'price' sa baba ng tamang column name (ex: unit_price)
    $stmt = $conn->prepare("UPDATE items SET item_name=?, quantity=?, price=? WHERE id=?");
    $stmt->bind_param("sidi", $item_name, $quantity, $price, $id);

    if($stmt->execute()){
        // FIX: Iniba ang view_item.php sa view_items.php para hindi mag-404 Not Found
        header("Location: view_items.php?success=updated");
        exit();
    } else {
        echo "Error updating item: " . $conn->error;
    }

} else {
    // FIX: Iniba ang view_item.php sa view_items.php
    header("Location: view_items.php");
    exit();
}
?>