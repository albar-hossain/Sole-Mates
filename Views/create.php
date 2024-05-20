<?php include '../views/header.php'; ?>

<h2>Add New Product</h2>
<form action="index.php?action=create" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" required>
    <label for="image">Attach Image:</label>
    <input type="file" id="image" name="image" accept="image/*" required>
    <input type="submit" value="Add Product">
</form>

<?php include '../views/footer.php'; ?>
