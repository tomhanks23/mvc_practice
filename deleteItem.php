<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mvc_practice/app/core/initialize.php');

// Controller
class Controller extends AjaxController {
    public function __construct() {
        parent::__construct();

        // Add Files Payload
        // Payload::js('/mvc_practice/examples/register/register.js');
        // Payload::css('/mvc_practice/bower_components/ReptileForms/dist/reptileforms.min.css');

        // More code could go here depending on what you want to do with this page

        $sql = "
            SELECT order_id
              FROM inline_item
             WHERE inline_item_id = '{$_POST['inline_item_id']}'
        ";
        // Execute SQL Statement
        $results = db::execute($sql);

        $row = $results->fetch_assoc();

        $order_id = $row['order_id'];

        $sql = "
            DELETE FROM inline_item
                  WHERE inline_item_id = '{$_POST['inline_item_id']}'
        ";

        // Execute SQL Statement
        $results = db::execute($sql);

        $sql = "
            SELECT count(1) count
              FROM inline_item
             WHERE inline_item_id = '{$_POST['inline_item_id']}'
        ";

        // Execute SQL Statement
        $results = db::execute($sql);

        $row = $results->fetch_assoc();

        if ($row["count"] = 0) {
            $sql = "
                DELETE FROM user_order
                      WHERE order_id = $order_id
            ";
            // Execute SQL Statement
            $results = db::execute($sql);
        }

    }

}
$controller = new Controller();

?>