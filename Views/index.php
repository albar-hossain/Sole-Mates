<?php include '../views/header.php'; ?>

<h2>Product List</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
    <?php if (isset($result) && $result->rowCount() > 0): ?>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['price']); ?></td>
                <td><img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>"></td>
                <td>
                    <a href="index.php?action=edit&id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="index.php?action=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">No products found.</td>
        </tr>
    <?php endif; ?>
</table>

<?php include '../views/footer.php'; 


?>


<?php
require_once '../Controllers/ProductController.php';

$controller = new ProductController();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $controller->edit($id);
        break;
    case 'delete':
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $controller->delete($id);
        break;
    default:
        $controller->index();
        break;
}
?>