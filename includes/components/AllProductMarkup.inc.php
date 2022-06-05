<?php
//delete the selected products
if (isset($_POST['delete'])) {
    $selectedItem = $_POST['item'];
    $productCtrl = new \classes\controller\ProductCtrl();
    $productCtrl->deleteProduct($selectedItem);
}
?>

<form method="POST" id="check"
    class="products-container px-3 m-auto mt-3 mb-5 row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3">

    <?php foreach ($getAllProducts as $product) { ?>
    <div class="col">
        <div class="card p-3 h-100">
            <input type="checkbox" class="delete-checkbox form-check-input" value="<?= $product['sku'] ?>"
                id="<?= $product['name'] ?>" name="item[]" />
            <div class="card-body text-center" for="<?= $product['name'] ?>">
                <p><?= $product['sku'] ?>
                </p>
                <p><?= $product['name'] ?>
                </p>
                <p><?= $product['price'] ?>$
                </p>

                <?php
                    if ($product['product_type'] === "DVD") {
                        echo "<p>Size: ".$product['size']."MB</p>";
                    } elseif ($product['product_type'] === "Furniture") {
                        echo "<p>Dimentions: ".$product['dimentions']."</p>";
                    } elseif ($product['product_type'] === "Book") {
                        echo "<p>Weight: ".$product['weight']."Kg</p>";
                    }
                ?>
            </div>
        </div>
    </div>
    <?php    } ?>

</form>