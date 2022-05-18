<?php

include "connectClass.php";
include "productClass.php";

$products = new Products();
$allProducts = $products->getProducts();

//delete the products
if (isset($_POST['delete'])) {
    $selectedItem = $_POST['item'];
    $products->deleteProduct($selectedItem);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All products</title>
    <!-- boostrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <header>
        <nav class="nav px-3 m-auto d-flex justify-content-between align-items-center border-bottom">
            <a href="index.php">
                <h3 class="nav-title">Product List</h3>
            </a>
            <div class="nav-list d-flex align-items-center">
                <a href="add-product.php">
                    <button class="nav-list-add btn me-3">ADD</button>
                </a>
                <button id="delete-product-btn" type="submit" onclick="return checkProductSelected()" name="delete"
                    value="Delete" class="btn btn-danger" form="check">MASS DELETE</button>
            </div>
        </nav>
    </header>
    <main>
        <form method="POST" id="check"
            class="products-container px-3 m-auto mt-3 mb-5 row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3">

            <?php
            foreach ($allProducts as $row) { ?>
            <div class="col">
                <div class="card p-3 h-100">
                    <input type="checkbox" class="delete-checkbox form-check-input" value="<?= $row['sku'] ?>"
                        id="<?= $row['name'] ?>" name="item[]" />
                    <div class="card-body text-center" for="<?= $row['name'] ?>">
                        <p><?= $row['sku'] ?>
                        </p>
                        <p><?= $row['name'] ?>
                        </p>
                        <p><?= $row['price'] ?>$
                        </p>

                        <?php
                            if ($row['product_type'] === "DVD") {
                                echo "<p>Size: ".$row['size']."MB</p>";
                            } elseif ($row['product_type'] === "Furniture") {
                                echo "<p>Dimentions: ".$row['dimentions']."</p>";
                            } elseif ($row['product_type'] === "Book") {
                                echo "<p>Weight: ".$row['weight']."Kg</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php    } ?>

        </form>
    </main>
    <footer class="me-auto ms-auto w-100 text-center mt-auto border-top py-4 px-3">Scandiweb Test assignment
    </footer>

    <script src="script.js"></script>
</body>

</html>