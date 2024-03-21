<?php
class ProductController {
    private $productModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }    

    public function add(){
        include_once 'app/views/products/create.php';
    }

    public function save(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';

            // Xử lý tải lên hình ảnh đại diện
            if (isset($_FILES["thumbnail"])) {
                $uploadResult = $this->uploadImage($_FILES["thumbnail"]);
                if ($uploadResult) {
                    // Lưu đường dẫn của hình ảnh đại diện vào CSDL
                    $result = $this->productModel->createProduct($name, $description, $price, $uploadResult);

                    if (is_array($result)) {
                        // Có lỗi, hiển thị lại form với thông báo lỗi
                        $errors = $result;
                        include 'app/views/products/create.php'; // Đường dẫn đến file form sản phẩm
                    } else {
                        // Không có lỗi, chuyển hướng ve trang chu hoac trang danh sach
                        header('Location: /chieu5');
                    }

                } else {
                    // Lỗi tải lên
                    echo "Lỗi tải file!";
                }
            }
        }
    }

    public function uploadImage($file) {
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
        // Kiểm tra xem file có phải là hình ảnh thực sự hay không
        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    
        // Kiểm tra kích thước file
        if ($file["size"] > 500000) { // Ví dụ: giới hạn 500KB
            $uploadOk = 0;
        }
    
        // Kiểm tra định dạng file
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }
    
        // Kiểm tra nếu $uploadOk bằng 0
        if ($uploadOk == 0) {
            return false;
        } else {
            if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                return $targetFile;
            } else {
                return false;
            }
        }
    }
    public function detail($id){
        $product = $this->productModel->getProductById($id);

        if ($product) {
            include_once 'app/views/products/detail.php';
        } else {
            include_once 'app/views/share/not-found.php';
        }
    }
    public function edit($id){
        $product = $this->productModel->getProductById($id);

        if ($product) {
            include_once 'app/views/products/edit.php';
        } else {
            include_once 'app/views/share/not-found.php';
        }
    }
    public function update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            // Update the product in the database
            $result = $this->productModel->updateProduct($id, $name, $description, $price);

            // Check if the update was successful
            if ($result) {
                // Redirect to the detail page of the updated product
                header('Location: /chieu5/');
                exit;
            } else {
                // Handle update failure (e.g., display an error message)
                echo "Failed to update product.";
            }
        }
    }
    public function delete($id) {
        // Call the deleteProduct method from ProductModel
        $result = $this->productModel->deleteProduct($id);

        if ($result) {
            // Redirect to the home page or product listing page after successful deletion
            header('Location: /chieu5');
            exit;
        } else {
            // Handle delete failure (e.g., display an error message)
            echo "Failed to delete product.";
        }
    }


    
}