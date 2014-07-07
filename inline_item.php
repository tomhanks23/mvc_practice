<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mvc_practice/app/core/initialize.php');

// Controller
class Controller extends AppController {
    public function __construct() {
        parent::__construct();

        session_start();

        $user_id = $_SESSION['user_id'];

        // for log out 
        if ( $_POST['action'] == 'logout' ) {
            session_destroy();
            header('Location: http://localhost/mvc_practice/index.php');
        }

        // find order_id which is not payed
        $sql = "
          SELECT order_id
            FROM user_order
           WHERE user_id = $user_id
             AND order_status = 1
          ";

        // Execute SQL Statement
        $results = db::execute($sql);

        // there are items have not been paid
        if ( $results->current_field > 0 ) {
            $order_id = $results->current_field;

        } else {
            // this is a new order
            $sql = "
                INSERT INTO user_order(
                            user_id,
                            date_added,
                            order_status
                            )
                     VALUES (
                            '{$user_id}',
                            now(),
                            1
                            )
            ";
            // Execute SQL Statement
            $results = db::execute($sql);

            $order_id = $results->insert_id;
        }

        $sql = "
            INSERT INTO inline_item(
                        order_id,
                        product_id,
                        quantity
                        )
                 VALUES (
                        '{$order_id}',
                        '{$_SESSION['cur_product_id']}',
                        '{$_POST['qty']}'
                        )
        ";

        // Execute SQL Statement
        $results = db::execute($sql);

        // show items
        $sql = "
            SELECT p.name,
                   p.price,
                   i.quantity
              FROM user_order o, inline_item i, product p
             WHERE o.order_id = i.order_id
               AND i.product_id = p.product_id
               AND o.user_id = '{$_SESSION['user_id']}'
               AND o.order_status = 1
        ";

        // Execute SQL Statement
        $results = db::execute($sql);
    }

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<div class="container">
    <div class="row">
        <div id="return-shopping">
            <h2><a href="index.html">Continue shopping</a></h2>
        </div>
        <div class="sibiling-div"></div>

        <h2>Your shopping cart - 1 item.</h2>
        <div id="inline-item">
            <div id="inline-item-list">
                <hr>
                <ul>
                    <li>
                        <table>
                            <tbody>
                                <tr>
                                    <td><img class="inline-item-img" src="user_upload/products/item4.jpg" ></td>
                                    <td>Ted Bear</td>
                                    <td>$12.5</td>
                                    <td>&times;</td>
                                    <td><input type="text" value="1"></td>
                                    <td>$12.5</td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                </ul>
            </div>
            <hr>
            <div id="inline-item-sub-total">
                <div id="empty-cart">
                    <a href="#">Empty</a>
                </div>
                <div id="sub-total-count">
                    Subtotal: $12.5
                </div>
                <div class="sibiling-div"></div>
            </div>
        </div>
        <div id="total-cost">
            <ul>
                <li>
                    Subtotal:    $12000.50
                </li>
                <li>
                    Shipping cost:   $10000.00
                </li>
                <li>Total:    $12000.50</li>
                <li>
                    <button>
                        Go to checkout
                    </button>

                </li>
            </ul>
        </div>
        <div class="sibiling-div"></div>

    </div>
</div>
<?php echo $copyright; ?>