<?php

include '../security/auth.php';
include '../security/csrf.php';

requireAuth('user');

?>

<!DOCTYPE html>
<html>
<head>

    <title>Add Item Request</title>

    <link rel="stylesheet"
          href="../assets/css/style.css">

</head>
<body>

<div class="sidebar">

    <?php include 'sidebar.php'; ?>

</div>

<div class="main">

    <h1 class="dashboard-title">
        Submit Item Request
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

        <button type="submit">
            Submit Item
        </button>

    </form>

</div>

</body>
</html>