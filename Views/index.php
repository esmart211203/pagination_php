<?php
require_once('base.php');
require_once('../Models/product_db.php');
$product_db = new Product_Db();
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 3;
$all_product = $product_db->getAllProducts($page, $limit);
?>

<div class="container">
    <h1 class="text-center">Manage Products</h1><br><br><br><hr>
    <div class="row">
        <?php foreach ($all_product as $key => $value) { ?>
        <div class="col-md-4 mb-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../uploads/images/<?php echo $value->pro_image; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $value->name; ?></h5>
                    <p class="card-text"><?php echo $value->description; ?></p>
                    <a href="#" class="btn btn-primary">Add to cart</a>
                </div>
            </div>
        </div>
        <?php  } ?>
    </div>
    <div class="clear"></div>
    <?php
    //pagination
    $totalProducts = $product_db->getTotalProducts(); // 6
    $total_pages = ceil($totalProducts / $limit); // 2
    echo '<ul class="pagination">';
        if ($page > 1) {
            echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($page - 1) . '">Previous</a></li>';
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            echo '<li class="page-item';
            if ($i == $page) {
                echo ' active';
            }
            echo '"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
        }

        if ($page < $total_pages) {
            echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($page + 1) . '">Next</a></li>';
        }
        echo '</ul>';

