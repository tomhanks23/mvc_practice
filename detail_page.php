<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mvc_practice/app/core/initialize.php');

// Controller
class Controller extends AppController {
    public function __construct() {
        parent::__construct();

        session_start();

        $_SESSION['action_forward'] = 'detail_page.php';

        // for register
        if ( $_POST['action'] == 'register' ) {
            $sql = "
                    INSERT INTO user(
                        user_name,
                        email,
                        password
                        ) VALUES (
                        '{$_POST['userName']}',
                        '{$_POST['email']}',
                        '{$_POST['password']}'
                        )
            ";

            $results = db::execute($sql);

            $_SESSION['user_id'] = $results->insert_id;
            $_SESSION['user_name'] = $_POST['userName'];
        }

        // for log in
        if ( $_POST['action'] == 'login' ) {
            $sql = "
                    SELECT *
                      FROM user
                     WHERE email = '{$_POST['email']}'
                       AND password = '{$_POST['password']}'
            ";

            $results = db::execute($sql);

            $row = $results->fetch_assoc();

            if ($row) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
            }
        }

        // for log out 
        if ( $_POST['action'] == 'logout' ) {
            session_destroy();
            header('Location: http://localhost/mvc_practice/index.php');
        }


        // for showing projuct
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
        <?php echo $logout; ?>
    </div>

    <div class="row">

        <?php echo $list_menu; ?>

        <div class="col-md-9">

            <div class="thumbnail">
                <img class="product-img" src="<?php echo 'user_upload/products/' . $product['name']; ?>" alt="">
                <div class="caption-full">
                    <form action="inline_item.php" method="POST">
                        <h4><?php echo 'Name: ' . pathinfo($product['name'])['filename'] ?></h4>
                        <h4><?php echo 'SKU: ' . $product['sku'] ?></h4>
                        <h4><?php echo 'In Stock: ' . $product['inventory'] ?></h4></h4>
                        <h4><?php echo 'Price: $' . $product['price']; ?></h4>
                        <h4>Qty: <input style="width: 50px;" type="text" name="qty"></h4>
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

