<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mvc_practice/app/core/initialize.php');

// Controller
class Controller extends AppController {
    public function __construct() {
        parent::__construct();

        session_start();
        

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
        <ul class="nav nav-tabs" id="admin-tab" role="tablist" >
            <li class="active"><a href="#orders">Orders</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="#add-products">Add Products</a></li>
        </ul>

        <div class="tab-content">
            
            <div class="tab-pane active" id="orders">
                <table>
                    <thead>
                        <tr>
                            <th width="20%">
                                Order Id
                            </th>
                            <th width="20%">
                                Customer
                            </th>
                            <th width="20%">
                                Amount
                            </th>
                            <th width="20%">
                                Payment status
                            </th>
                            <th width="20%">
                                Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="20%">
                                15
                            </td>
                            <td width="20%">
                                Tom
                            </td>
                            <td width="20%">
                                $18
                            </td>
                            <td width="20%">
                                paid
                            </td>
                            <td width="20%">
                                June 25th 2014
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">
                                14
                            </td>
                            <td width="20%">
                                Jon
                            </td>
                            <td width="20%">
                                $25
                            </td>
                            <td width="20%">
                                waiting payment
                            </td>
                            <td width="20%">
                                June 20th 2014
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">
                                13
                            </td>
                            <td width="20%">
                                Fred
                            </td>
                            <td width="20%">
                                $36
                            </td>
                            <td width="20%">
                                paid
                            </td>
                            <td width="20%">
                                June 19th 2014
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="products">
                <table>
                    <thead>
                        <tr>
                            <th width="20%">
                                Item name
                            </th>
                            <th width="20%">
                                SKU
                            </th>
                            <th width="20%">
                                Price
                            </th>
                            <th width="20%">
                                Inventory
                            </th>
                            <th width="20%">
                                description
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="20%">
                                Item1
                            </td>
                            <td width="20%">
                                #a1b1c1d1
                            </td>
                            <td width="20%">
                                $18
                            </td>
                            <td width="20%">
                                20
                            </td>
                            <td width="20%">
                                Shoes for 1 year old baby.
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">
                                Item2
                            </td>
                            <td width="20%">
                                #a1b1c1d2
                            </td>
                            <td width="20%">
                                $6.21
                            </td>
                            <td width="20%">
                                15
                            </td>
                            <td width="20%">
                                Bottles for 2 years old baby.
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">
                                Item3
                            </td>
                            <td width="20%">
                                #a1b1c1d3
                            </td>
                            <td width="20%">
                                $7.99
                            </td>
                            <td width="20%">
                                25
                            </td>
                            <td width="20%">
                                Bottles for 4 years baby.
                            </td>
                        </tr>
                </table>
            </div>
            <div class="tab-pane" id="add-products">
                <ul>
                    <li>
                        <div class="item-lebal">
                            <h4>SKU:</h4>
                        </div>
                        <div class="item-detail">
                            <input type="text">
                        </div>
                        <div class="sibiling-div"></div>
                    </li>
                    <li>
                         <div class="item-lebal">
                            <h4>Name:</h4>
                        </div>
                        <div class="item-detail">
                            <input type="text">
                        </div>
                        <div class="sibiling-div"></div>
                    </li>
                    <li>
                         <div class="item-lebal">
                            <h4>Inventory:</h4>
                        </div>
                        <div class="item-detail">
                            <input type="text">
                        </div>
                        <div class="sibiling-div"></div>
                    </li>
                    <li>
                         <div class="item-lebal">
                            <h4>Price:</h4>
                        </div>
                        <div class="item-detail">
                            <input type="text">
                        </div>
                        <div class="sibiling-div"></div>
                    </li>
                    <li>
                         <div class="item-lebal">
                            <h4>Description:</h4>
                        </div>
                        <div class="item-detail">
                            <textarea rows="4" cols="30"></textarea>
                        </div>
                        <div class="sibiling-div"></div>
                    </li>
                    <li>
                         <div class="item-lebal">
                            <h4>Image:</h4>
                        </div>
                        <div class="item-detail">
                            <input type="file">
                        </div>
                        <div class="sibiling-div"></div>
                    </li>
                    <li>
                        <br>
                        <br>
                        <button>Save Product</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
<?php echo $copyright; ?>