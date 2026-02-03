<?php
include "includes/db.php";
/* Page Header and navigation */
include "includes/header.php";
include "includes/navigation.php";
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Product Detail Column -->
        <div class="col-md-8">

            <?php
            if (isset($_GET['added']) && $_GET['added'] == '1') {
                echo "<div class='alert alert-success'>Product added to cart.</div>";
            }
            ?>
            <p><a href="products.php" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Back to Products</a></p>
            <?php
            if (isset($_GET['id'])) {
                $product_id = $_GET['id'];
                $query = "SELECT * FROM products WHERE product_id=$product_id AND status='active'";
                $fetch_data = mysqli_query($connection, $query);

                if (mysqli_num_rows($fetch_data) == 0) {
                echo "<h3 class='text-center'>Product not found.</h3>";
            } else {
                    $Row = mysqli_fetch_assoc($fetch_data);
                    $name = $Row['name'];
                    $description = $Row['description'];
                    $price = $Row['price'];
                    $stock_quantity = $Row['stock_quantity'];
                    ?>
                    <h1 class="page-header">
                        <?php echo $name ?>
                        <small>₱<?php echo $price ?></small>
                    </h1>
                    <hr>
                    <p><?php echo $description; ?></p>
                    <p><span class="glyphicon glyphicon-tag"></span> In stock: <?php echo $stock_quantity; ?></p>
                    <form action="includes/add_to_cart.php" method="get" class="form-inline" style="display: inline-block; margin-top: 10px;">
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <input type="hidden" name="redirect" value="product.php?id=<?php echo $product_id; ?>">
                        <div class="form-group">
                            <label for="quantity" class="sr-only">Quantity</label>
                            <input
                                type="number"
                                name="quantity"
                                id="quantity"
                                value="1"
                                min="1"
                                max="<?php echo $stock_quantity; ?>"
                                class="form-control"
                                style="width: 80px; display: inline-block;">
                        </div>
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
                        </button>
                    </form>
                    <hr>
            <?php
                }
            } else {
                echo "<h3 class='text-center'>Product not found.</h3>";
            }
            ?>

        </div>

        <?php
        include "includes/sidebar.php"
        ?>
    </div>
    <!-- /.row -->

    <hr>
    <?php
    /* Page Footer */
    include "includes/footer.php"
    ?>
