<?php

class validation extends DbConnect
{
    private $workingDatabase = "products";

    public function checkDuplicateSku($productSku)
    {
        $sql = "SELECT COUNT(*) FROM ".$this->workingDatabase." WHERE `sku` = '$productSku'";
        $stml = $this->getConnection()->prepare($sql);
        $result = $stml->execute();
        if ($stml->fetchColumn() > 0) {
            echo "<script>alert('Product with the same SKU already exists.');</script>";
            return true;
        }
    }
}