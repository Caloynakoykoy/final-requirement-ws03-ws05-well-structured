<?php
/**
 * REMOVED session_start()
 * Dahil kasama na ito sa auth.php, hindi na natin ito kailangan dito.
 * Ito ang magtatanggal sa "session already active" notice.
 */

include '../config/database.php';
include '../security/auth.php'; // Dito manggagaling ang session logic mo.

// Gagamitin ang function mula sa iyong auth.php
requireAuth('user');

$search = "";
if (isset($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);
    $keyword = "%$search%";
    
    // Accurate Filter: Approved at Active lang dapat ang nakikita ng User
    $stmt = $conn->prepare("SELECT * FROM items WHERE item_name LIKE ? AND approval_status='approved' AND status='active'");
    $stmt->bind_param("s", $keyword);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Default view: Approved at Active items lang
    $result = $conn->query("SELECT * FROM items WHERE approval_status='approved' AND status='active'");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory Search | IMS</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="sidebar">
        <?php include 'sidebar.php'; ?>
    </div>

    <div class="main">
        <h1 class="dashboard-title">Inventory Search</h1>
        
        <form method="GET" style="margin-bottom: 25px; display: flex; gap: 10px;">
            <input type="text" name="search" placeholder="Search item..." value="<?php echo $search; ?>" 
                   style="flex: 1; padding: 12px; background: #1a1a1a; border: 1px solid #333; color: white; border-radius: 6px;">
            <button type="submit" class="btn-restore" style="border: none; cursor: pointer; padding: 10px 25px;">SEARCH</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ITEM NAME</th>
                    <th>STATUS</th>
                    <th>APPROVAL</th>
                    <th>QTY</th>
                </tr>
            </thead>
            <tbody>
                <?php if($result && $result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td style="padding: 15px;"><?php echo htmlspecialchars($row['item_name']); ?></td>
                        <td style="padding: 15px; color: #34c759; font-weight: 600;">active</td>
                        <td style="padding: 15px; color: #34c759; font-weight: 600;">approved</td>
                        <td style="padding: 15px;"><?php echo htmlspecialchars($row['quantity']); ?></td>
                    </tr>
                    <?php } ?>
                <?php else: ?>
                    <tr><td colspan="4" style="text-align: center; padding: 40px; color: #717171;">No approved items found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>