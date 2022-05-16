<?php

class Products extends DbConnect
{
    private $workingDatabase = "products";
 
    public function getProducts()
    {
        $conn = $this->getConnection();
        $sql = "SELECT * FROM ".$this->workingDatabase."";
        $stml = $conn->prepare($sql);
        $result = $stml->execute();
        $products = $stml->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($products);
    }

    public function deleteProduct($productInput)
    {
        try {
            foreach ($productInput as $productSku) {
                //delete the product with the specified sku
                $conn = $this->getConnection();
                $sql = "DELETE FROM ".$this->workingDatabase." WHERE `sku` = :productSku";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':productSku', $productSku);
                $stmt->execute();
            }

            $response = ['status' => 200, 'message' => 'Record deleted successfully.'];
        } catch (Exception $e) {
            $response = ['status' => 404, 'message' => "Product delete failed: " . $e->getMessage()];
        }
        
        echo json_encode($response);
    }

    public function addProduct($productData)
    {
        $attribute = new Attributes();
        $attribute->setAttribute($productData);

        $size = $attribute->getAttribute('size');
        $weight = $attribute->getAttribute('weight');
        $height = $attribute->getAttribute('height');
        $width = $attribute->getAttribute('width');
        $length = $attribute->getAttribute('length');
        $dimentions = $attribute->getAttribute('dimentions');
        $sku = $attribute->getAttribute('sku');
        $name = $attribute->getAttribute('name');
        $price = $attribute->getAttribute('price');
        $type = $attribute->getAttribute('type');

        //validate the data before inserting it into the database
        $validation = new validation();
        if ($validation->checkDuplicateSku($sku) || $validation->vaidatePoductName($name) || $validation->validateNumberFields($price, $size, $weight, $height, $width, $length)) {
            return;
        }

        //execute the query with bind-parameters to prevent sql injection and faster execution
        try {
            $conn = $this->getConnection();
            $sql = "INSERT INTO `products`(`name`, `sku`, `price`, `weight`, `size`, `dimentions`, `product_type`) VALUES (:name, :sku, :price, :weight, :size, :dimentions, :productType)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':sku', $sku);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':size', $size);
            $stmt->bindParam(':weight', $weight);
            $stmt->bindParam(':productType', $type);
            $stmt->bindParam(':dimentions', $dimentions);
            $stmt->execute();

            $response = ['status' => 200, 'message' => 'Record added successfully.'];
        } catch (Exception $e) {
            $response = ['status' => 404, 'message' => "Product add failed: " . $e->getMessage()];
        }

        echo json_encode($response);
    }
}