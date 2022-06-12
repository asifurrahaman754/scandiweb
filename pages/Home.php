<?php

//delete the selected products
if (isset($_POST['delete'])) {
    $selectedItem = $_POST['item'];
    $productCtrl = new \classes\controller\ProductCtrl();
    $productCtrl->deleteProduct($selectedItem);
}

include "includes/components/header.inc.php";
?>

<header>
    <nav class="nav px-3 m-auto d-flex justify-content-between align-items-center border-bottom">
        <h3 class="nav-title">Product List</h3>

        <div class="nav-list d-flex align-items-center">
            <a href="/add-product">
                <button class="nav-list-add btn me-3">ADD</button>
            </a>
            <button id="delete-product-btn" type="submit" onclick="return checkProductSelected()" name="delete"
                value="Delete" class="btn btn-danger" form="check">MASS DELETE</button>
        </div>
    </nav>
</header>

<main>
    <?php
        $productView = new \classes\view\ProductView();
        $productView->showAllProducts();
    ?>
</main>

<?php include "includes/components/footer.inc.php";