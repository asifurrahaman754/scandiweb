<?php
require "../includes/autoload.inc.php";

//send the product info to the controller
if (isset($_POST["submit"])) {
    $dataArray = array(
        "sku" => $_POST["sku"],
        "name" => $_POST["name"],
        "price" => $_POST["price"],
        "productType" => $_POST["productType"],
        "size" => $_POST["size"],
        "weight" => $_POST["weight"],
        "height" => $_POST["height"],
        "width" => $_POST["width"],
        "length" => $_POST["length"]
    );

    $ProductCtrl = new classes\controller\ProductCtrl();
    $ProductCtrl->addNewProduct($dataArray);
}

?>

<?php include "../includes/components/header.inc.php"; ?>
<header>
    <nav class="nav px-3 m-auto d-flex justify-content-between align-items-center border-bottom">
        <a href="index.php">
            <h3 class="nav-title">Add Product</h3>
        </a>
        <div class="nav-list d-flex align-items-center">
            <button type="submit" form="product_form" name="submit" class="btn btn-primary mt-3 me-2">Save</button>
            <a href="../index.php" class="btn btn-danger mt-3">Cancel</a>
        </div>
    </nav>
</header>

<main>
    <div class="card w-100 mt-3 mb-5 m-auto" style="max-width: 25rem">
        <div class="card-header text-center">Add a new product</div>
        <form method="POST" id="product_form" name="product_form" class="card-body" onsubmit="return validateForm()"
            action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
                <label for="sku" class="form-label">SKU</label>
                <input type="text" maxlength="15" class="form-control" id="sku" placeholder="sku" name="sku">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" placeholder="price" name="price">
            </div>
            <div class="mb-3">
                <label for="productType" class="form-label">Type Switcher</label>
                <select onchange="setProductType()" class="form-select" id="productType" name="productType">
                    <option value="">select your product type</option>
                    <option value="DVD">DVD</option>
                    <option value="Book">Book</option>
                    <option value="Furniture">Furniture</option>
                </select>
            </div>
            <div class="mb-3 DVD type">
                <label for="size" class="form-label">Size (MB)</label>
                <input type="number" class="form-control attribute" id="size" placeholder="size" name="size">
                <strong>Please, provide size mb</strong>
            </div>
            <div class="mb-3 Book type">
                <label for="weight" class="form-label">Weight (KG)</label>
                <input step="any" type="number" class="form-control attribute" id="weight" placeholder="weight"
                    name="weight">
                <strong>Please, provide weight in kg</strong>
            </div>
            <div class="mb-3 Furniture type">
                <div class="mb-3">
                    <label for="height" class="form-label">Height (CM)</label>
                    <input step="any" type="number" class="form-control attribute" id="height" placeholder="height"
                        name="height">
                </div>
                <div class="mb-3">
                    <label for="width" class="form-label">Width (CM)</label>
                    <input step="any" type="number" class="form-control attribute" id="width" placeholder="width"
                        name="width">
                </div>
                <div>
                    <label for="length" class="form-label">Length (CM)</label>
                    <input step="any" type="number" class="form-control attribute" id="length" placeholder="length"
                        name="length">
                </div>
                <strong>Please, provide dimensions in cm</strong>
            </div>
        </form>
    </div>
    </div>
</main>

<?php include "../includes/components/footer.inc.php";