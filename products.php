<?php
include "includes/db.php";
/* Page Header and navigation */
include "includes/header.php";
include "includes/navigation.php";
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Products Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Products
                <small>Available for purchase</small>
            </h1>

            <?php
            if (isset($_GET['added']) && $_GET['added'] == '1') {
                echo "<div class='alert alert-success'>Product added to cart.</div>";
            }
            $query = "SELECT * FROM products WHERE status='active'";
            $fetch_data = mysqli_query($connection, $query);

            if (mysqli_num_rows($fetch_data) == 0) {
                echo "<h3 class='text-center'>No products found.</h3>";
            } else {
                while ($Row = mysqli_fetch_assoc($fetch_data)) {
                    $product_id = $Row['product_id'];
                    $name = $Row['name'];
                    $description = strlen($Row['description']) > 270 ? substr($Row['description'], 0, 270) . "..." : $Row['description'];
                    $price = $Row['price'];
                    $stock_quantity = $Row['stock_quantity'];
                    ?>
                    <!-- Product -->
                    <h2>
                        <a href="product.php?id=<?php echo $product_id ?>"><?php echo $name ?></a>
                    </h2>
                    <p class="lead">₱<?php echo $price ?></p>
                    <hr>
                    <p><?php echo $description ?></p>
                    <p><span class="glyphicon glyphicon-tag"></span> In stock: <?php echo $stock_quantity; ?></p>
                    <a class="btn btn-primary" href="product.php?id=<?php echo $product_id ?>">View Details <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <form action="includes/add_to_cart.php" method="get" style="display: inline;">
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="redirect" value="products.php">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button>
                    </form>
                    <hr>
            <?php
                }
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
