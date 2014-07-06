<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mvc_practice/app/core/initialize.php');

// Controller
class Controller extends AppController {
    public function __construct() {
        parent::__construct();

        // Create welcome variable in view
        // $this->view->welcome = 'Welcome to MVC';

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
