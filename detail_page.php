<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mvc_practice/app/core/initialize.php');

// Controller
class Controller extends AppController {
    public function __construct() {
        parent::__construct();

        session_start();

        if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {

            $_SESSION['cur_product_id'] = $_GET['product_id'];

        }

        $product_id = $_SESSION['cur_product_id'];

        // Write SQL Statement
        $sql = "
          SELECT * 
            FROM product
           WHERE product_id = $product_id
          ";

        // Execute SQL Statement
        $results = db::execute($sql);

        $row = $results->fetch_assoc();

        $this->view->product = $row;

        

    }

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<div class="container">

    <div class="overlay">
        <?php echo $login; ?>
        <?php echo $register; ?>
    </div>

    <div class="row">

        <?php echo $list_menu; ?>

        <div class="col-md-9">

            <div class="thumbnail">
                <img class="product-img" src="<?php echo 'user_upload/products/' . $product['name']; ?>" alt="">
                <div class="caption-full">
                    <form action="inline_item.php">
                        <h4><?php echo 'Name: ' . pathinfo($product['name'])['filename'] ?></h4>
                        <h4><?php echo 'SKU: ' . $product['sku'] ?></h4>
                        <h4><?php echo 'In Stock: ' . $product['inventory'] ?></h4></h4>
                        <h4><?php echo 'Price: $' . $product['price']; ?></h4>
                        <h4>Qty: <input style="width: 50px;" name="qty"></h4>
                        <button type="submit" id="add-to-cart">Add to cart</button>
                    </form>
                    <hr>
                </div>
                <div class="sibiling-div">
                    <h4>Description</h4>
                    <p><?php echo $product['description'] ?></p>
                </div>
            </div>

            <!-- <div class="well">

                <div class="text-right">
                    <a class="btn btn-success">Leave a Review</a>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        Anonymous
                        <span class="pull-right">10 days ago</span>
                        <p>This product was great in terms of quality. I would definitely buy another!</p>
                    </div>
                </div>

                <hr>

            </div> -->

        </div>

    </div>

</div>



<?php echo $copyright; ?>

