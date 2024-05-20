<?php
require_once '../Models/database.php';
require_once '../Models/Product.php';

class ProductController {
    private $db;
    private $product;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->product = new Product($this->db);
    }

    public function index() {
        $result = $this->product->readAll();
        include '../views/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->product->name = $_POST['name'];
            $this->product->price = $_POST['price'];
            $this->product->image = $_POST['image'];

            if($this->product->create()) {
                header("Location: index.php");
            }
        }
        include '../views/create.php';
    }

    public function edit($id) {
        $this->product->id = $id;
        $this->product->readOne();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->product->name = $_POST['name'];
            $this->product->price = $_POST['price'];
            $this->product->image = $_POST['image'];

            if($this->product->update()) {
                header("Location: index.php");
            }
        }
        include '../views/edit.php';
    }

    public function delete($id) {
        $this->product->id = $id;
        if($this->product->delete()) {
            header("Location: index.php");
        }
    }
}
?>