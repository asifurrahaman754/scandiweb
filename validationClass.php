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
            //if the database already has a same sku, return an error message
            $response = ['status' => 400, 'message' => 'This SKU already exists', 'field' => 'sku'];
            echo json_encode($response);
            return true;
        }
    }

    public function vaidatePoductName($name)
    {
        if (!preg_match("/^[a-zA-Z0-9' ]*$/", $name)) {
            $response = ['status' => 400, 'message' => 'Please, provide the data of indicated type', 'field' => 'name'];
            echo json_encode($response);
            return true;
        }
    }

    public function validateNumberFields($price, $size, $weight, $height, $width, $length)
    {
        $validateFields = array('price' => $price, 'size' => $size, 'weight' => $weight, 'height' => $height, 'width' => $width, 'length' => $length);
        foreach ($validateFields as $key => $field) {
            if ($field !== "" && $field <= 0) {
                $response = ['status' => 400, 'message' => 'Please, provide the data of indicated type', 'field' => $key];
                echo json_encode($response);
                return true;
            }
        }
    }
}