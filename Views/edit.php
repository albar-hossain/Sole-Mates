<?php include '../views/header.php'; ?>

<h2>Edit Product</h2>
<form action="index.php?action=edit&id=<?php echo $this->product->id; ?>" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $this->product->name; ?>" required>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" step="0.01" value="<?php echo $this->product->price; ?>" required>
    <label for="image">Image URL:</label>
    <input type="text" id="image" name="image" value="<?php echo $this->product->image; ?>" required>
    <input type="submit" value="Update Product">
</form>

<?php include '../views/footer.php'; ?>