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

        if ($_SESSION['state_flag'] == '1') {

            // find order_id which is not payed
            $sql = "
              SELECT count(*) count
                FROM user_order
               WHERE user_id = $user_id
                 AND order_status = 1
              ";

            // Execute SQL Statement
            $results = db::execute($sql);
            $row = $results->fetch_assoc();

            // print_r($results);
            // echo '<br>';
            // print_r($row);
            // echo '<br>';
            // print_r($row["count"]);
            // exit();

            if ($row["count"] > 0) {
                
                $sql = "
                  SELECT order_id
                    FROM user_order
                   WHERE user_id = $user_id
                     AND order_status = 1
                  ";

                // Execute SQL Statement
                $results = db::execute($sql);
                $row = $results->fetch_assoc();

                $order_id = $row['order_id'];

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

            // check it has same product in this order before
            $sql = "
                SELECT count(1) count
                  FROM inline_item
                 WHERE order_id = '{$order_id}'
                   AND product_id = '{$_SESSION['cur_product_id']}'
            ";
            // Execute SQL Statement
            $results = db::execute($sql);
            $row = $results->fetch_assoc();

            if ($row["count"] > 0) {
                
                $sql = "
                    UPDATE inline_item 
                       SET quantity = quantity + {$_POST['qty']}
                     WHERE order_id = '{$order_id}'
                       AND product_id = '{$_SESSION['cur_product_id']}'
                ";

            } else {

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

            }

            // Execute SQL Statement
            $results = db::execute($sql);
        }

        // show items
        $sql = "
            SELECT p.name,
                   p.price,
                   i.quantity,
                   i.inline_item_id
              FROM user_order o, inline_item i, product p
             WHERE o.order_id = i.order_id
               AND i.product_id = p.product_id
               AND o.user_id = '{$_SESSION['user_id']}'
               AND o.order_status = 1
        ";

        // Execute SQL Statement
        $results = db::execute($sql);

        $this->view->inline_items = $results;
    }

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<div class="container">
    <div class="overlay">
        <?php echo $logout; ?>
    </div>
    <div class="row">
        <div class="return-shopping">
            <h4><a href="index.php">Continue shopping</a></h4>
        </div>
        <?php if ($inline_items->num_rows > 1) { ?>
            <div><h4><?php echo "Your shopping cart - " . $inline_items->num_rows . " items."; ?></h4></div>
        <?php } else { ?>
            <div><h4><?php echo "Your shopping cart - 1 item."; ?></h4></div>
        <?php } ?>
        <div class="sibiling-div"></div>

        
        <div id="inline-item">
            <div id="inline-item-list">
                <hr>
                <ul>
                    <?php $subtotal = 0 ?>
                    <?php while ($item = $inline_items->fetch_assoc()) { ?>
                    <li>
                        <table>
                            <tbody>
                                <tr>
                                    <td><img class="inline-item-img" src="<?php echo 'user_upload/products/' . $item['name']; ?>" ></td>
                                    <td><?php echo pathinfo($product['name'])['filename'] ?></td>
                                    <td><?php echo '$' . $item['price']; ?></td>
                                    <td>&times;</td>
                                    <td><input type="text" class="qty" value="<?php echo $item['quantity'] ?>" style="width:30px"></td>
                                    <td><?php echo '$' . $item['price'] * $item['quantity'] ?></td>
                                    <td class="detele"><button>Del</button></td>
                                    <td width="0px"><input type="hidden" class="hidden" value="<?php echo $item['inline_item_id'] ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <?php 
                        $subtotal += $item['price'] * $item['quantity'];
                        } 
                    ?>
                </ul>
            </div>



            <hr>
            <div id="inline-item-sub-total">
                <div id="empty-cart">
                    <!-- <a href="#">Empty</a> -->
                </div>
                <div id="sub-total-count">
                    <?php 
                        echo "Subtotal: $" . $subtotal;
                     ?>
                </div>
                <div class="sibiling-div"></div>
            </div>
        </div>
        <div id="total-cost">
            <ul>
                <li>
                    <table>
                        <tr>
                            <td width="180px">Subtotal:</td>
                            <td>$<?php echo $subtotal;?></td>
                        </tr>
                    </table>
                </li>
                <li>
                    <table>
                        <tr>
                            <td width="180px">Shipping cost:</td>
                            <td>$<?php echo round($subtotal*0.05, 2);?></td>
                        </tr>
                    </table>
                       
                </li>
                <li>
                    <table>
                        <tr>
                            <td width="180px">Total:</td>
                            <td>$<?php echo $subtotal + round($subtotal*0.05, 2);?></td>
                        </tr>
                    </table>

                </li>
                <li>
                    <button disabled="true">
                        Go to checkout
                    </button>

                </li>
            </ul>
        </div>
        <div class="sibiling-div"></div>

    </div>
</div>
<?php echo $copyright; ?>