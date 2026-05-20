<?php
include '../config/database.php';
include '../security/csrf.php';

verify_csrf_token($_POST['csrf_token']);

$stmt=$conn->prepare("INSERT INTO items(item_name,description,quantity,approval_status,status)VALUES(?,?,?,'approved','active')");
$stmt->bind_param("ssi",$_POST['item_name'],$_POST['description'],$_POST['quantity']);
$stmt->execute();
header("Location:view_items.php");
?>