<?php
// Define the Product class.
class Product {
    // Declare private properties for database connection and table name.
    private $conn;
    private $table_name = "products";

    // Declare public properties for the product's attributes.
    public $id;
    public $name;
    public $price;
    public $image;

    // Constructor method to initialize the database connection.
    public function __construct($db) {
        $this->conn = $db;
    }

    // Method to read all products from the database.
    public function readAll() {
        // Define the query to select all records from the product table.
        $query = "SELECT * FROM " . $this->table_name;
        // Prepare the SQL statement.
        $stmt = $this->conn->prepare($query);
        // Execute the statement.
        $stmt->execute();
        // Return the statement object, which contains the result set.
        return $stmt;
    }

    // Method to create a new product in the database.
    public function create() {
        // Define the query to insert a new record into the product table.
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, price=:price, image=:image";
        // Prepare the SQL statement.
        $stmt = $this->conn->prepare($query);

        // Sanitize the input properties.
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = floatval(htmlspecialchars(strip_tags($this->price)));
        $this->image = htmlspecialchars(strip_tags($this->image));

        // Bind the sanitized values to the SQL statement parameters.
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":image", $this->image);

        // Execute the statement and return true if successful, false otherwise.
        if($stmt->execute()) {
            return true;
        }

        // Print the error message if execution fails.
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    // Method to read a single product from the database by its ID.
    public function readOne() {
        // Define the query to select a single record based on the product ID.
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        // Prepare the SQL statement.
        $stmt = $this->conn->prepare($query);

        // Sanitize and bind the product ID.
        $this->id = intval(htmlspecialchars(strip_tags($this->id)));
        $stmt->bindParam(1, $this->id, PDO::PARAM_INT);
        // Execute the statement.
        $stmt->execute();

        // Fetch the result as an associative array.
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // If a row is found, assign the values to the object's properties.
        if ($row) {
            $this->name = $row['name'];
            $this->price = $row['price'];
            $this->image = $row['image'];
        } else {
            // If no record is found, reset the properties.
            $this->name = null;
            $this->price = null;
            $this->image = null;
        }
    }

    // Method to update an existing product in the database.
    public function update() {
        // Define the query to update the product record based on its ID.
        $query = "UPDATE " . $this->table_name . " SET name = :name, price = :price, image = :image WHERE id = :id";
        // Prepare the SQL statement.
        $stmt = $this->conn->prepare($query);

        // Sanitize the input properties.
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = floatval(htmlspecialchars(strip_tags($this->price)));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->id = intval(htmlspecialchars(strip_tags($this->id)));

        // Bind the sanitized values to the SQL statement parameters.
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        // Execute the statement and return true if successful, false otherwise.
        if($stmt->execute()) {
            return true;
        }

        // Print the error message if execution fails.
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    // Method to delete a product from the database by its ID.
    public function delete() {
        // Define the query to delete the product record based on its ID.
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        // Prepare the SQL statement.
        $stmt = $this->conn->prepare($query);

        // Sanitize and bind the product ID.
        $this->id = intval(htmlspecialchars(strip_tags($this->id)));
        $stmt->bindParam(1, $this->id, PDO::PARAM_INT);

        // Execute the statement and return true if successful, false otherwise.
        if($stmt->execute()) {
            return true;
        }

        // Print the error message if execution fails.
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
?>
