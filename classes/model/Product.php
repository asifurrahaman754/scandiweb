<?php
namespace classes\model;

class Product extends \classes\DbConnect
{
    private $workingDatabase = "products";
 
    protected function getProductsSql()
    {
        $conn = $this->getConnection();
        $sql = "SELECT * FROM ".$this->workingDatabase."";
        $stml = $conn->prepare($sql);
        $result = $stml->execute();
        $products = $stml->fetchAll(\PDO::FETCH_ASSOC);
        return $products;
    }

    protected function deleteProductSql($productInput)
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

            header('Location: index.php');
            exit();
        } catch (Exception $e) {
            echo '<script>alert("Product delete failed. '.$e->getMessage().'");</script>';
            exit();
        }
    }

    protected function checkDuplicateSkuSql($productSku)
    {
        $sql = "SELECT COUNT(*) FROM ".$this->workingDatabase." WHERE `sku` = '$productSku'";
        $stml = $this->getConnection()->prepare($sql);
        $result = $stml->execute();
        if ($stml->fetchColumn() > 0) {
            echo "<script>alert('Product with the same SKU already exists.');</script>";
            return true;
        }
    }

    protected function addProductSql($size, $weight, $dimentions, $sku, $name, $price, $type)
    {
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

            header('Location: /');
        } catch (Exception $e) {
            echo '<script>alert("Product add failed. '.$e->getMessage().'");</script>';
        }
    }
}