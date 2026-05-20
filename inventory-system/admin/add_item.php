<?php

include '../security/auth.php';
include '../security/csrf.php';

requireAuth('admin');

?>

<!DOCTYPE html>
<html>
<head>

    <title>Add Item</title>

    <link rel="stylesheet"
          href="../assets/css/style.css">

</head>
<body>

<div class="sidebar">

    <<?php include 'sidebar.php'; ?>

</div>

<div class="main">

    <h1 class="dashboard-title">
        Add Item
    </h1>

    <form action="save_item.php" method="POST">

        <input type="hidden"
               name="csrf_token"
               value="<?php echo csrf_token(); ?>">

        <input type="text"
               name="item_name"
               placeholder="Item Name"
               required>

        <br><br>

        <textarea name="description"
                  placeholder="Description"
                  required></textarea>

        <br><br>

        <input type="number"
               name="quantity"
               placeholder="Quantity"
               required>

        <br><br>
<div class="button-container">
    <button type="submit" class="btn btn-primary">
        Save Item
    </button>
</div>

    </form>

</div>

</body>
</html>